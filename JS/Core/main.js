// H1>H3 e vice-versa - Resize da Página - Ajustes de Texto
$(window).resize(function() {
    if($(window).width() <= 490 )
    {
        $('.inicio').find('h1').replaceWith(function() {
            return '<h3>' + $(this).html() + '</h3>';
        });
    }
    else
    {
        $('.inicio').find('h3').replaceWith(function() {
            return '<h1>' + $(this).html() + '</h1>';
        });
    }
});

// Scroll Menu - Smoother Animation

$(window).scroll(() => {
    let scroll = $(window).scrollTop();
    let wwidth = $(window).width();
    if (scroll >= 200 && wwidth > 767)
    {
        //$('.navbar').css("background-image","linear-gradient(to bottom right,transparent,black)");
        $('.navbar').css("background-color","black");
        $('.navbar-nav').css("padding","10");
    }
    else
    {
        $('.navbar').css("background-image","none");
        $('.navbar-nav').css("padding","20");
    }
});


// Image GIF - Equipas

$('img.card-gif').hover(
    function() {
        let sfile = $(this).attr("src");
        let name = sfile.split(".");
        $(this).attr("src", name[name.length-2] + ".gif");
    },
    function() {
        let sfile = $(this).attr("src");
        let name = sfile.split(".");
        $(this).attr("src", name[name.length-2] + ".jpg");
    }
);

