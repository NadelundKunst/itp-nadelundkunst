function rolldown() {
    if (pageYOffset > 1) {
        AOS.init({
            easing: 'ease-out-back',
            duration: 1000
        });
        setTimeout(function () {
            document.getElementById("upper").style.height = "80px";
        }, 1000);
    }
}
