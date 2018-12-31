<?php
class SpkAhp {

  private function koneksi()
  {
    return New PDO("mysql:host=localhost;dbname=spk_ahp", 'root', 'root');
  }

  // Start  Kriteria Min Max
  public function getIntervalKriteria($kriteria, $filter) {
    $table = "tbl_rumah";
    if ($kriteria == "jkpk") {
      $table = "tbl_zona_alamat";
    }

    $sql = "SELECT MIN(".$kriteria.") AS min_value, MAX(".$kriteria.")-MIN(".$kriteria.") AS range_value FROM " . $table;
    // if (!empty($filter) && $table == "tbl_rumah") {
    //   $sql .= " JOIN tbl_zona_alamat ON ".$table.".id_zona_alamat=tbl_zona_alamat.id WHERE tbl_rumah.id_zona_alamat=".$filter;
    // } elseif(!empty($filter) && $table == "tbl_zona_alamat") {
    //   $sql .= " JOIN tbl_rumah ON ".$table.".id=tbl_rumah.id_zona_alamat WHERE tbl_rumah.id_zona_alamat=".$filter;
    // }
    $get = $this->koneksi()->prepare($sql);
    $get->execute();
    while ($data = $get->fetch(PDO::FETCH_ORI_NEXT)) {
         $interval["interval_lama"] = $data['min_value'];
         $interval["range_interval_lama"] = $data['range_value'];
    }
    return $interval;
  }

  public function normalisasiMinMaxKriteria($filter) {

    $interval = $this->getIntervalKriteria("harga", $filter);
    $harga_interval_lama = $interval["interval_lama"];
    $harga_range_interval_lama = $interval["range_interval_lama"];

    $interval = $this->getIntervalKriteria("jkpk", $filter);
    $jkpk_interval_lama = $interval["interval_lama"];
    $jkpk_range_interval_lama = $interval["range_interval_lama"];

    $interval = $this->getIntervalKriteria("luas_tanah", $filter);
    $luas_tanah_interval_lama = $interval["interval_lama"];
    $luas_tanah_range_interval_lama = $interval["range_interval_lama"];

    $interval = $this->getIntervalKriteria("luas_bangunan", $filter);
    $luas_bangunan_interval_lama = $interval["interval_lama"];
    $luas_bangunan_range_interval_lama = $interval["range_interval_lama"];


    $interval = $this->getIntervalKriteria("jml_kamar_tidur", $filter);
    $jml_kamar_tidur_interval_lama = $interval["interval_lama"];
    $jml_kamar_tidur_range_interval_lama = $interval["range_interval_lama"];

    $sql = "SELECT tbl_rumah.id AS id, tbl_zona_alamat.jkpk AS jkpk, harga, luas_tanah, luas_bangunan,
            jml_kamar_tidur FROM tbl_rumah, tbl_zona_alamat WHERE tbl_rumah.id_zona_alamat=tbl_zona_alamat.id";
    if (!empty($filter)) {
      $sql .= " AND tbl_rumah.id_zona_alamat=".$filter;
    }
    $get = $this->koneksi()->prepare($sql);
    $get->execute();
    while ($data = $get->fetch(PDO::FETCH_ORI_NEXT)) {
      $harga = $this->generateNormalisasiString($data['harga'], $harga_interval_lama, $harga_range_interval_lama);
      $jkpk = $this->generateNormalisasiString($data['jkpk'], $jkpk_interval_lama, $jkpk_range_interval_lama);
      $luas_tanah = $this->generateNormalisasiString($data['luas_tanah'], $luas_tanah_interval_lama, $luas_tanah_range_interval_lama);
      $luas_bangunan = $this->generateNormalisasiString($data['luas_bangunan'], $luas_bangunan_interval_lama, $luas_bangunan_range_interval_lama);
      $jml_kamar_tidur = $this->generateNormalisasiString($data['jml_kamar_tidur'], $jml_kamar_tidur_interval_lama, $jml_kamar_tidur_range_interval_lama);

      // return $harga . " " . $jkpk . " " .$luas_tanah . " " . $luas_bangunan . " " . $jml_kamar_tidur;
      $sql = "INSERT INTO tbl_normalisasi_rumah (id_rumah, harga, jkpk, luas_tanah, luas_bangunan, jml_kamar_tidur)
              VALUES (:id_rumah, :harga, :jkpk, :luas_tanah, :luas_bangunan, :jml_kamar_tidur)";
      $save = $this->koneksi()->prepare($sql);
      $save->bindParam(':id_rumah', $data['id']);
      $save->bindParam(':harga', $harga);
      $save->bindParam(':jkpk', $jkpk);
      $save->bindParam(':luas_tanah', $luas_tanah);
      $save->bindParam(':luas_bangunan', $luas_bangunan);
      $save->bindParam(':jml_kamar_tidur', $jml_kamar_tidur);
      $save->execute();
    }
  }

  public function generateNormalisasiString($kriteria_value, $interaval_lama, $range_interval_lama) {
    $normalisasi = ((($kriteria_value-$interaval_lama)/$range_interval_lama)*9)+1;
    if ($normalisasi >= 1 && $normalisasi <= 4) {
      $normalisasi = "Rendah";
    } elseif ($normalisasi > 4 && $normalisasi <= 7) {
        $normalisasi = "Sedang";
    } elseif ($normalisasi > 7 && $normalisasi <= 10) {
      $normalisasi = "Tinggi";
    }
    return $normalisasi;
  }
  //End Kriteria Min Max

  // Start Matriks Kriteria
  public function generateMatriksNormalisasi($filter) {
    $sql = "SELECT harga_jkpk, harga_luas_tanah, harga_luas_bangunan, harga_jkt, jkpk_luas_tanah,
            jkpk_luas_bangunan, jkpk_jkt, luas_tanah_luas_bangunan, luas_tanah_jkt, luas_bangunan_jkt
            FROM tbl_matriks_prioritas";

    $get = $this->koneksi()->prepare($sql);
    $get->execute();
    while ($data = $get->fetch(PDO::FETCH_ORI_NEXT)) {
      $matriks = $this->matriksNormalisasiToArray($data);
    }
    // return $matriks;

    $total_kriteria = $this->getTotalKriteriaMatriks($matriks);
    // return $total_kriteria;

    foreach ($matriks as $key1 => $array) {
      foreach ($array as $key2 => $value) {
          $matriks_normalisasi [$key1][$key2] = $value / $total_kriteria[$key2];
      }
    }
    // return $matriks_normalisasi;

    $prioritas_matriks_normalisasi = $this->getPrioritasKriteriaMatriks($matriks_normalisasi);
    // return $prioritas_matriks_normalisasi;

    $check_matriks_normalisasi = $this->checkMatrikNormalisasi($matriks, $prioritas_matriks_normalisasi);
    if (!$check_matriks_normalisasi) {
      return "SALAHHH";
    }
    //cukup mengembalikan nilai prioritas setiap kriteria
    return $prioritas_matriks_normalisasi;
  }

  public function matriksNormalisasiToArray($data) {
    $matriks ["harga"]["harga"] = 1;
    $matriks ["harga"]["jkpk"] = $data["harga_jkpk"];
    $matriks ["harga"]["luas_tanah"] = $data["harga_luas_tanah"];
    $matriks ["harga"]["luas_bangunan"] = $data["harga_luas_bangunan"];
    $matriks ["harga"]["jkt"] = $data["harga_jkt"];
    $matriks ["jkpk"]["luas_tanah"] = $data["jkpk_luas_tanah"];
    $matriks ["jkpk"]["luas_bangunan"] = $data["jkpk_luas_bangunan"];
    $matriks ["jkpk"]["jkt"] = $data["jkpk_jkt"];
    $matriks ["luas_tanah"]["luas_bangunan"] = $data["luas_tanah_luas_bangunan"];
    $matriks ["luas_tanah"]["jkt"] = $data["luas_tanah_jkt"];
    $matriks ["luas_bangunan"]["jkt"] = $data["luas_bangunan_jkt"];

    $matriks ["jkpk"]["harga"] = 1 / $data["harga_jkpk"];
    $matriks ["jkpk"]["jkpk"] = 1;
    $matriks ["luas_tanah"]["harga"] = 1 / $data["harga_luas_tanah"];
    $matriks ["luas_tanah"]["jkpk"] = 1 / $data["jkpk_luas_tanah"];
    $matriks ["luas_tanah"]["luas_tanah"] = 1;
    $matriks ["luas_bangunan"]["harga"] = 1 / $data["harga_luas_bangunan"];
    $matriks ["luas_bangunan"]["jkpk"] = 1 / $data["jkpk_luas_bangunan"];
    $matriks ["luas_bangunan"]["luas_tanah"] = 1 / $data["luas_tanah_luas_bangunan"];
    $matriks ["luas_bangunan"]["luas_bangunan"] = 1;
    $matriks ["jkt"]["harga"] = 1 / $data["harga_jkt"];
    $matriks ["jkt"]["jkpk"] = 1 / $data["jkpk_jkt"];
    $matriks ["jkt"]["luas_tanah"] = 1 / $data["luas_tanah_jkt"];
    $matriks ["jkt"]["luas_bangunan"] = 1 / $data["luas_bangunan_jkt"];
    $matriks ["jkt"]["jkt"] = 1;
    return $matriks;
  }

  public function getTotalKriteriaMatriks($matriks){
    foreach ($matriks as $key1 => $array) {
      foreach ($array as $key2 => $value) {
        if ($key2 == "harga") {
          $harga [] = $value;
        } elseif ($key2 == "jkpk") {
          $jkpk [] = $value;
        } elseif ($key2 == "luas_tanah") {
          $luas_tanah [] = $value;
        } elseif ($key2 == "luas_bangunan") {
          $luas_bangunan [] = $value;
        } elseif ($key2 == "jkt") {
          $jkt [] = $value;
        }
      }
    }
    $total ["harga"] = array_sum($harga);
    $total ["jkpk"] = array_sum($jkpk);
    $total ["luas_tanah"] = array_sum($luas_tanah);
    $total ["luas_bangunan"] = array_sum($luas_bangunan);
    $total ["jkt"] = array_sum($jkt);
    return $total;
  }

  public function getPrioritasKriteriaMatriks($matriks_normalisasi) {
      foreach ($matriks_normalisasi as $key => $array) {
        $prioritas [$key] = array_sum($array) / count($array);
      }
      return $prioritas;
  }

  public function checkMatrikNormalisasi($matriks, $prioritas_matriks_normalisasi) {
    foreach ($matriks as $key1 => $array) {
      foreach ($array as $key2 => $value) {
        $check_matriks_normalisasi [$key1][$key2] = $prioritas_matriks_normalisasi[$key2] * $value;
      }
    }

    foreach ($check_matriks_normalisasi as $key => $array) {
      $hasil_rasio_konsisensi[$key] = array_sum($array) + $prioritas_matriks_normalisasi[$key];
    }

    $lamba_max = array_sum($hasil_rasio_konsisensi) / 5;
    $ci = ($lamba_max-5)/5;
    $cr = $ci / 1.12;
    if ($cr <= 0.1) {
      return true;
    }
    return false;
  }
  // End Matriks Kriteria

  // Start Normalisasi Sub Kriteria (Perbandiangan Berpasangan)
  public function generateMatriksHasil($filter) {
    $prioritas_matriks_normalisasi = $this->generateMatriksNormalisasi($filter);
    foreach ($prioritas_matriks_normalisasi as $key => $value) {
      $prioritas [$key]["Prioritas"]= $value;
      $prioritas_matriks_kriteria_normalisasi = $this->getAndCheckMatriksSubKriteria($key);

      foreach ($prioritas_matriks_kriteria_normalisasi as $key2 => $value2) {
        $prioritas[$key][ucwords($key2)] = $value2;
      }
    }
    // return $prioritas;

    $sql = "SELECT tbl_rumah.id AS id, tbl_rumah.nama, tbl_normalisasi_rumah.harga, tbl_normalisasi_rumah.jkpk,
            tbl_normalisasi_rumah.luas_tanah, tbl_normalisasi_rumah.luas_bangunan, tbl_normalisasi_rumah.jml_kamar_tidur
            FROM tbl_normalisasi_rumah, tbl_rumah WHERE tbl_normalisasi_rumah.id_rumah=tbl_rumah.id";
    $get = $this->koneksi()->prepare($sql);
    $get->execute();
    while ($data = $get->fetch(PDO::FETCH_ORI_NEXT)) {
      // $matriks_hasil [$data['id']] ["harga"] = $prioritas["harga"][$data['harga']] * $prioritas["harga"]["Prioritas"];
      $matriks_hasil ["harga"] = $prioritas["harga"][$data['harga']] * $prioritas["harga"]["Prioritas"];
      $matriks_hasil ["jkpk"] = $prioritas["jkpk"][$data['jkpk']] * $prioritas["jkpk"]["Prioritas"];
      $matriks_hasil ["luas_tanah"] = $prioritas["luas_tanah"][$data['luas_tanah']] * $prioritas["luas_tanah"]["Prioritas"];
      $matriks_hasil ["luas_bangunan"] = $prioritas["luas_bangunan"][$data['luas_bangunan']] * $prioritas["luas_bangunan"]["Prioritas"];
      $matriks_hasil ["jkt"] = $prioritas["jkt"][$data['jml_kamar_tidur']] * $prioritas["jkt"]["Prioritas"];

      //save to database
      $sql = "INSERT INTO tbl_matriks_hasil (id_rumah, harga, jkpk, luas_tanah, luas_bangunan, jml_kamar_tidur, total)
              VALUES (:id_rumah, :harga, :jkpk, :luas_tanah, :luas_bangunan, :jml_kamar_tidur, :total)";
      $save = $this->koneksi()->prepare($sql);
      $save->bindParam(':id_rumah', $data['id']);
      $save->bindParam(':harga', $matriks_hasil['harga']);
      $save->bindParam(':jkpk', $matriks_hasil['jkpk']);
      $save->bindParam(':luas_tanah', $matriks_hasil['luas_tanah']);
      $save->bindParam(':luas_bangunan', $matriks_hasil['luas_bangunan']);
      $save->bindParam(':jml_kamar_tidur', $matriks_hasil['jkt']);
      $save->bindParam(':total', array_sum($matriks_hasil));
      $save->execute();
    }
    return $prioritas;
  }


  public function getAndCheckMatriksSubKriteria($kriteria) {
    if ($kriteria == "harga") {
      $kriteria = "tbl_prioritas_kriteria_harga";
    } elseif ($kriteria == "jkpk") {
      $kriteria = "tbl_prioritas_kriteria_jkpk";
    } elseif ($kriteria == "luas_tanah") {
      $kriteria = "tbl_prioritas_kriteria_luas_tanah";
    } elseif ($kriteria == "luas_bangunan") {
      $kriteria = "tbl_prioritas_kriteria_luas_bangunan";
    } elseif ($kriteria == "jkt") {
      $kriteria = "tbl_prioritas_kriteria_jkt";
    }

    $sql = "SELECT tinggi_sedang, tinggi_rendah, sedang_rendah FROM " . $kriteria;
    $get = $this->koneksi()->prepare($sql);
    $get->execute();
    while ($data = $get->fetch(PDO::FETCH_ORI_NEXT)) {
      $matriks_kriteria ["tinggi"]["tinggi"] = 1;
      $matriks_kriteria ["tinggi"]["sedang"] = $data['tinggi_sedang'];
      $matriks_kriteria ["tinggi"]["rendah"] = $data['tinggi_rendah'];
      $matriks_kriteria ["sedang"]["rendah"] = $data['sedang_rendah'];

      $matriks_kriteria ["sedang"]["tinggi"] = 1 / $data['tinggi_sedang'];
      $matriks_kriteria ["sedang"]["sedang"] = 1;
      $matriks_kriteria ["rendah"]["tinggi"] = 1 / $data['tinggi_rendah'];
      $matriks_kriteria ["rendah"]["sedang"] = 1 / $data['sedang_rendah'];
      $matriks_kriteria ["rendah"]["rendah"] = 1;
    }
    // return $matriks_kriteria;


    $total_kriteria = $this->getTotalSubKriteriaMatriks($matriks_kriteria);
    // return $total_kriteria;

    foreach ($matriks_kriteria as $key1 => $array) {
      foreach ($array as $key2 => $value) {
        $matriks_kriteria_normalisasi [$key1][$key2] = $value / $total_kriteria[$key2];
      }
    }
    // return $matriks_kriteria_normalisasi;

    foreach ($matriks_kriteria_normalisasi as $key => $array) {
      $prioritas_matriks_kriteria_normalisasi [$key] = array_sum($array) / count($array);
    }
    // return $prioritas_matriks_kriteria_normalisasi;

    foreach ($matriks_kriteria as $key1 => $array) {
      foreach ($array as $key2 => $value) {
        $check_matriks_kriteria_normalisasi [$key1][$key2] = $prioritas_matriks_kriteria_normalisasi[$key2] * $value;
      }
    }
    // return $check_matriks_kriteria_normalisasi;

    foreach ($check_matriks_kriteria_normalisasi as $key => $array) {
      $hasil_rasio [$key] = array_sum($array) + $prioritas_matriks_kriteria_normalisasi[$key];
    }
    // return $hasil_rasio;

    $lamda_max = array_sum($hasil_rasio) / 3;
    $ci = ($lamda_max-3)/3;
    $cr = $ci / 0.58;
    if (!($cr <= 0.1)) {
      return "SALAHHHHHH";
    }

    $max = Max($prioritas_matriks_kriteria_normalisasi);
    foreach ($prioritas_matriks_kriteria_normalisasi as $key => $value) {
      $prioritas_sub [$key] = $value / $max;
    }

    return $prioritas_sub;
  }

  public function getTotalSubKriteriaMatriks($matriks_kriteria) {
    foreach ($matriks_kriteria as $key1 => $array) {
      foreach ($array as $key2 => $value) {
        if ($key2 == "tinggi") {
          $tinggi [] = $value;
        } elseif ($key2 == "sedang") {
          $sedang [] = $value;
        } elseif ($key2 == "rendah") {
          $rendah [] = $value;
        }
      }
    }
    $total ["tinggi"] = array_sum($tinggi);
    $total ["sedang"] = array_sum($sedang);
    $total ["rendah"] = array_sum($rendah);
    return $total;
  }

  public function truncateDatabase() {
    $del = $this->koneksi()->prepare("TRUNCATE TABLE tbl_normalisasi_rumah");
    $del->execute();

    $del = $this->koneksi()->prepare("TRUNCATE TABLE tbl_matriks_hasil");
    $del->execute();
  }


}


?>
