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
