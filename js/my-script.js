jQuery(document).ready(function($){
    $('.my-color-field').wpColorPicker();
});


function openLink(evt, animName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" ncmbp-active", "");
  }
  document.getElementById(animName).style.display = "block";
  evt.currentTarget.className += " ncmbp-active";
}
