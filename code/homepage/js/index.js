function rolldown() {
    console.log(pageYOffset)
    if (pageYOffset > 1) {
        AOS.init({
            easing: 'ease-out-back',
            duration: 1500
        });
        setTimeout(function () {
            document.getElementById("upper").style.height = "50px";
        }, 1500);
    }
}
