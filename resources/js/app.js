import './bootstrap';
import './dark'

const navToggle = document.querySelector('.toggle-nav')
const nav = document.querySelector('.nav-links')

navToggle.addEventListener('click', () => {
    if(nav.classList.toggle('hidden')){
        navToggle.innerHTML = '<i class="bi bi-list text-xl">'
    }else{
        navToggle.innerHTML = '<i class="bi bi-x-lg text-xl">'
    }
})