/*
* Diese Datei beinhaltet die Header-Animation.
* Diese wird mittels JQuery durchgeführt.
*
* Autor: Maciej Dzialoszynski
* Letzte Änderung: 06.11.18
*/

$(document).on("scroll", function () {
    if ($(document).scrollTop() > 80) {
        $(".index__logo").addClass("index__shrink");
    } else {
        $(".index__logo").removeClass("index__shrink");
    }
})
