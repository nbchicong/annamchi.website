$(function () {
  slideShow();
  function scrool_auto() {
    var vitri_top = document.getElementById("columns").offsetTop + 10;
    self.scrollTo(0, vitri_top);
  }
});
