$(document).ready(function () {
  sidebarActive()
});

function sidebarActive() {
  let url_now = window.location
  $('ul.sidebar-menu a').filter(function() {
	   return this.href == url_now;
  }).parent().addClass('active');
  $('ul.treeview-menu a').filter(function() {
	   return this.href == url_now;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
  if (url_now.pathname == "/") {
    $('aside.left-side.sidebar-offcanvas').addClass("collapse-left")
    $('aside.right-side').addClass("strech")
  }

}
