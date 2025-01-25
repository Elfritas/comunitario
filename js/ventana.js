const windowBack = document.getElementById('window-back'),
 windowContainer = document.getElementById('window-container'),
 openButton = document.getElementById('open-button'),
 closeButton = document.getElementById('close-button')

 openButton .addEventListener('click', ()=>windowBack.style.display='flex')

 const closeWindow = () => {
    windowContainer.classList.add('close')
    setTimeout(() =>{
        windowContainer.classList.remove('close')
        windowBack.style.display = 'none'
    }, 1000)
 }

 closeButton.addEventListener('click', () => closeWindow())

 window.addEventListener('click', e => e.target == windowBack && closeWindow())