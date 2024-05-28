function hidePreloader() {
    document.getElementById("preloader").style.top = "-2000px";
    // document.getElementById("preloader").style.opacity = "0";
    // document.getElementById("preloader").style.zIndex = "-999";
    // setTimeout(() => {
    //     document.getElementById("preloader").style.display = "none";
    // },1000);
    // document.getElementById("preloader").classList.add("animate__animated ");
    // document.getElementById("preloader").classList.add("animate__fadeOutUp");
}

window.addEventListener("load", function () {
    hidePreloader();
});
