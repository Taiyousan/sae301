const hamburgers = document.querySelector('.hamburger-container')
    const hamburger1 = document.getElementById('hamburger1')
    const hamburger2 = document.getElementById('hamburger2')
    const hamburger3 = document.getElementById('hamburger3')
    const menu = document.querySelector('.hamburger-menu')
    const menuItem = document.querySelectorAll('.hamburger-item')
    let closeFlag = false

    
menuItem.forEach(function(item){
   
    item.addEventListener('click', function(){
        // console.log('true')
            
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
            gsap.to('.mobile-menu', {
                opacity:0,
                height:0,
                paddingTop:0,
                paddingBottom:0
            })
            gsap.to(menuItem,{
                opacity:0,
                display:'none'
            })
            closeFlag = false
      })
})
    hamburgers.addEventListener('click', function(){

        // console.log('click')
        if (!closeFlag){ 
            // console.log('flagfalse')
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
            y:-8
        })
        // QUAND ON CLIQUE SUR LE MENU
        gsap.to('.mobile-menu', {
            display:'flex',
            opacity:1,
            height:500,
            paddingTop:30,
            paddingBottom:30,
            borderBottom: '3px solid white'
        })
        gsap.to('.mobile-list',{
            opacity:1,
            display:'flex'
        })
        
        closeFlag = true
    }
    else if(closeFlag){
        // console.log('popo')
        
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
        // QUAND ON CLIQUE SUR LA CROIX
        gsap.to('.mobile-menu', {
            
            height:'60',
            paddingTop:0,
            paddingBottom:0,
            borderBottom: 'none'
        })
        gsap.to('.mobile-list',{
            opacity:0,
            display:'none'
        })
        closeFlag = false
    }
    })
