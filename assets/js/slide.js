$(() => {

    // utiliser la classe css 'slide' pour créer un slider

    const img = $('.slide>figure') ;
    let i = 0 ;
    const n = img.length ;

    $('.slide').css("height",[...$('.slide>figure>img')].reduce((h,img) => {
        return h > img.height ? h : img.height
    },0))

    $(img).hide() ;
    $(img[i]).show() ;

    setInterval( () => {
        $(img[i]).fadeOut(400) ;
        i = (i+1)%n ;
        setTimeout( () => $(img[i]).fadeIn(400) , 400 ) ;
    },4000)

})