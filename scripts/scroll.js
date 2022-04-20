window.onscroll = function() { scrollFunction() };

function scrollFunction() {

    if (document.body.scrollTop > 90 || document.documentElement.scrollTop > 90) {
        document.querySelector(".nav-bar").classList.add("nav-bar-fixed");
        document.querySelector(".nav-placeholder").style.display = "block";
    } else {
        document.querySelector(".nav-bar").classList.remove("nav-bar-fixed");
        document.querySelector(".nav-placeholder").style.display = "none";
    }
}