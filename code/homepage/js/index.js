function rolldown() {
    if (pageYOffset > 1) {
        AOS.init({
            easing: 'ease-out-back',
            duration: 1000
        });
        setTimeout(function () {
            document.getElementById("upper").style.height = "75px";
        }, 1000);
    }
}
