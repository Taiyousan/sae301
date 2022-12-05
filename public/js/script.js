//animation du main au chargement : apparition 
gsap.to('main', {
    opacity:1,
    duration:0.5,
})

//animation du main au chargement : du bas vers le haut
gsap.from('main', {
    y:200
})



//animation de la barre de recherche de /manif. Au click, sur le bouton recherche, la barre s'anime
document.querySelector('.home-searchbar-button').addEventListener('click', function(){
    gsap.to('#toggle', {
        duration: 0.3,
        boxShadow: '5px 5px 4px 5px rgba(0,0,0,0.55)',
        repeat: 1,
        yoyo:true,
        x:-10,
        y:-10
    })
})

//apparition du bouton de retour à la liste des spectacles
gsap.to('.retour-animate', {
    y:0,
    opacity:1
})

