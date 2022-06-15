document.addEventListener('click', e => {
    const isDropBtn = e.target.matches("[data-dropdown-button]")
    if(!isDropBtn && e.target.closest("[data-dropdown]") !=null) return

    let currentDropdown
    if(isDropBtn) {
        currentDropdown = e.target.closest("[data-dropdown]")
        currentDropdown.classList.toggle('active')
    }
})