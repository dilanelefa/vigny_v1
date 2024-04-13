const darkToggle = document.querySelector('.dark-toggle')


function switchTheme(theme) {
    // window.location.href = '/set-theme?theme=' + theme;
    fetch('/set-theme?theme=' + theme).then((res) => {
        
    })
}

darkToggle.addEventListener('click', () => {
    const dark = document.querySelector('html').classList.contains('dark')
    if(dark) switchTheme('light');
    else switchTheme('dark')

    document.querySelector('html').classList.toggle('dark')
    if(dark){
        darkToggle.querySelector('i').classList.replace('bi-sun', 'bi-moon')
    }else{
        darkToggle.querySelector('i').classList.replace('bi-moon', 'bi-sun')
    }
})
