var carrousel = document.querySelector("#titlecarilowongan")
window.addEventListener("resize", (event) => {
    if (window.matchMedia("(max-width:768px)")) {
        carrousel.style.display = "none"
    } else {
        carrousel.style.display = "block"
    }
})