$(document).ready(function(){
    // headeer home
    $("#carousel1").owlCarousel({
        loop:true,
        nav:true,
        navText:['<svg xmlns="http://www.w3.org/2000/svg" width="28.143" height="49.371" viewBox="0 0 28.143 49.371"> <path id="Caminho_8275" data-name="Caminho 8275" d="M98.151,27.129,119.38,48.358a3.457,3.457,0,0,0,4.89-4.889L105.485,24.685,124.269,5.9a3.457,3.457,0,0,0-4.89-4.889L98.151,22.241a3.457,3.457,0,0,0,0,4.888Z" transform="translate(-97.139 0)" fill="#fff"/></svg>','<svg xmlns="http://www.w3.org/2000/svg" width="28.143" height="49.371" viewBox="0 0 28.143 49.371"><path id="Caminho_8275" data-name="Caminho 8275" d="M124.269,27.129,103.04,48.357a3.457,3.457,0,0,1-4.89-4.889l18.784-18.784L98.151,5.9a3.457,3.457,0,0,1,4.89-4.889L124.27,22.241a3.457,3.457,0,0,1,0,4.888Z" transform="translate(-97.139 0)" fill="#fff"/></svg>'],
        margin:15,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            }
        }
    });
    // imoveis slide
    var imoveisSlide = $("#imoveisSlide");
    imoveisSlide.owlCarousel({
        loop:true,
        nav:true,
        navText:['<svg xmlns="http://www.w3.org/2000/svg" width="28.143" height="49.371" viewBox="0 0 28.143 49.371"> <path id="Caminho_8275" data-name="Caminho 8275" d="M98.151,27.129,119.38,48.358a3.457,3.457,0,0,0,4.89-4.889L105.485,24.685,124.269,5.9a3.457,3.457,0,0,0-4.89-4.889L98.151,22.241a3.457,3.457,0,0,0,0,4.888Z" transform="translate(-97.139 0)" fill="#fff"/></svg>','<svg xmlns="http://www.w3.org/2000/svg" width="28.143" height="49.371" viewBox="0 0 28.143 49.371"><path id="Caminho_8275" data-name="Caminho 8275" d="M124.269,27.129,103.04,48.357a3.457,3.457,0,0,1-4.89-4.889l18.784-18.784L98.151,5.9a3.457,3.457,0,0,1,4.89-4.889L124.27,22.241a3.457,3.457,0,0,1,0,4.888Z" transform="translate(-97.139 0)" fill="#fff"/></svg>'],
        margin:2,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            992:{
                items:3,
                nav:true,
            }
        }
    });
    imoveisSlide.on('changed.owl.carousel', function(evt) {
        var atualPage = evt.page.index + 1;
        var totalPages = evt.page.count;
        // ("00" + 1).slice(-2) // completa com zeros a esquerda "01"
        $('#imovelSlideAtual').text(("00" + atualPage).slice(-2));
        $('#imovelSlideTotal').text(("00" + totalPages).slice(-2));
    });
//
});
