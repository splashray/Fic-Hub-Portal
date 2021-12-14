
const body = document.querySelector('body')
const toggle = document.querySelector('.toggle')
const navigation = document.querySelector('.navigation')
const darkTggl = document.getElementById('darkToggle')
const elements = body.querySelectorAll('.navList li a')
const overlayTxt = body.querySelectorAll('.services .service')
const img = darkTggl.querySelector('img')
const logo = document.getElementById('screenLogo')

let chck = 1

const dark = () => {
    body.style.backgroundColor = 'black'
    body.style.color = 'white'
    for (let element of elements) { 
        element.style.color = "white"
    }
    for (let txt of overlayTxt) { 
        txt.style.boxShadow = '0 5px 10px white'
    }
    img.src = '../images/sun.png'
    logo.src = '../images/logo.jpg'
    chck = 0
    localStorage.setItem("switch", "dark");
}

const light = () => {
    body.style.backgroundColor = 'white'
    body.style.color = 'black'
    for (let element of elements) { 
        element.style.color = "black"
    }
    for (let txt of overlayTxt) {
        txt.style.boxShadow = '0 10px 30px #00000059'
    }
    img.src = '../images/moon.png'
    logo.src = '../images/logo.jpg'
    chck = 1
    localStorage.setItem("switch", "light");
}

if (localStorage.getItem("switch") == 'dark') {
    dark()
}else if ((localStorage.getItem("switch") == 'light') || (localStorage.getItem("switch") == null)) {
    light()
}


darkTggl.addEventListener('click', () => {
    if (chck == 1) {
        dark()
    } else {
        light()
    }
})

toggle.addEventListener('click', () => {
    toggle.classList.toggle('active')
    navigation.classList.toggle('active')
})