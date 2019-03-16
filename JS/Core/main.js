// H1>H3 e vice-versa - Resize da Página - Ajustes de Texto
$(window).resize(function() {
    if($(window).width() <= 490 )
    {
        $('.inicio-text').find('h1').replaceWith(function() {
            return '<h3>' + $(this).html() + '</h3>';
        });
    }
    else
    {
        $('.inicio-text').find('h3').replaceWith(function() {
            return '<h1>' + $(this).html() + '</h1>';
        });
    }
});

// Scroll Menu - Smoother Animation

$(window).scroll(() => {
    let scroll = $(window).scrollTop();
   
    if (scroll >= 200)
    {
        $('.navbar').css("background-image","linear-gradient(to bottom right,transparent,black)");
        $('.navbar-nav').css("padding","10");
    }
    else
    {
        $('.navbar').css("background-image","none");
        $('.navbar-nav').css("padding","20");
    }

});

// Image Gif - Equipas

$('img.card-gif').hover(
    function() {
        $(this).attr("src","IMG/cris2.gif");
    },
    function() {
        $(this).attr("src","IMG/cris-static.jpg");
    }
);

