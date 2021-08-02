const burger = document.querySelector('#burger') ;
const navul = document.querySelector('.menu') ;
const toTop = document.querySelector('#toTop') ;

    
burger.addEventListener('click', () => {
    burger.classList.toggle('active');
    navul.classList.toggle('active') ;
})

window.addEventListener('scroll',
    () => $(window)[0].scrollY > 60 ? $(toTop).addClass("active") : $(toTop).removeClass("active") 
)

toTop.addEventListener('click', () => 
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
    })
)

