gsap.to('main', {
    opacity:1,
    duration:0.5
})

if (window.matchMedia("(max-width: 480px)").matches) {
// MOBILE : MENU HAMBURGER
const hamburgers = document.querySelector('.hamburger-container')
const hamburger1 = document.getElementById('hamburger1')
const hamburger2 = document.getElementById('hamburger2')
const hamburger3 = document.getElementById('hamburger3')
const menu = document.querySelector('.hamburger-menu')
const menuItem = document.querySelectorAll('.nav-contenu')
const navbar = document.querySelectorAll('.navbar')

console.table(menuItem)

let closeFlag = false

console.log(menuItem)
menuItem.forEach(function(item){
console.log(item)
item.addEventListener('click', function(){
    console.log('menu fermé')
        
        gsap.to(hamburger1, {
            rotateZ:0,
            y:0
        })
        gsap.to(hamburger2,{
            opacity:1,
            x:0
        })
        gsap.to(hamburger3,{
            rotateZ:0,
            y:0
        })
        closeFlag = false
  })
})
hamburgers.addEventListener('click', function(){

    console.log('click')
    if (!closeFlag){ 
        console.log('menu ouvert')
    gsap.to(hamburger1, {
        rotateZ:45,
        y:8
    })
    gsap.to(hamburger2,{
        opacity:0,
        x:-50
    })
    gsap.to(hamburger3,{
        rotateZ:-45,
        y:-6
    })
    gsap.to(menuItem, {
        display : 'flex',
        opacity: 1
    })
    gsap.to(navbar, {
        height:'100vh'
    })
    
    
    closeFlag = true
}
else if(closeFlag){
    console.log('menu fermé')
    
    gsap.to(hamburger1, {
        rotateZ:0,
        y:0
    })
    gsap.to(hamburger2,{
        opacity:1,
        x:0
    })
    gsap.to(hamburger3,{
        rotateZ:0,
        y:0
    })
   
    closeFlag = false
}
})
}
