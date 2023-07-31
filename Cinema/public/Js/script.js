icons.addEventListener("click", () => {
    nav.classList.add("active")
    button_id.classList.add("active")
    mobile.classList.add("active")

    
    iconsClose.style.setProperty('display', 'block', 'important')
    icons.style.setProperty('display', 'none', 'important')
})

iconsClose.addEventListener("click", ()=> {
    nav.classList.remove("active")
    button_id.classList.remove("active")
    mobile.classList.remove("active")

    iconsClose.style.setProperty('display', 'none', 'important')
    icons.style.setProperty('display', 'block', 'important')
})

