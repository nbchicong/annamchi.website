function slideShow(){
    //Set the opacity of all images to 0
    $('#slider-product a').css({
        opacity: 0.0
    });
    //Get the first image and display it (set it to full opacity)
    $('#slider-product a:first').css({
        opacity: 1.0
    });
    //Set the caption background to semi-transparent
    $('#slider-product .caption').css({
        opacity: 0.7
    });
    //Resize the width of the caption according to the image width
    $('#slider-product .caption').css({
        width: $('#slider-product a').find('img').css('width')
    });
    //Get the caption of the first image from REL attribute and display it
    $('#slider-product .content').html($('#slider-product a:first').find('img').attr('rel')).animate({
        opacity: 0.7
    }, 400);
    //Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
    setInterval('gallery()', 4000);
}
function gallery(){
    //if no IMGs have the show class, grab the first image
    var current = ($('#slider-product a.show') ? $('#slider-product a.show') : $('#slider-product a:first'));
    //Get next image, if it reached the end of the slideshow, rotate it back to the first image
    var next = ((current.next().length) ? ((current.next().hasClass('caption')) ? $('#slider-product a:first') : current.next()) : $('#slider-product a:first'));
    //Get next image caption
    var caption = next.find('img').attr('rel');
    //Set the fade in effect for the next image, show class has higher z-index
    next.css({
        opacity: 0.0
    }).addClass('show').animate({
        opacity: 1.0
    }, 1000);
    //Hide the current image
    current.animate({
        opacity: 0.0
    }, 1000).removeClass('show');
    //Set the opacity to 0 and height to 1px
    $('#slider-product .caption').animate({
        opacity: 0.0
    }, {
        queue: false,
        duration: 0
    }).animate({
        height: '1px'
    }, {
        queue: true,
        duration: 300
    });
    //Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
    $('#slider-product .caption').animate({
        opacity: 0.7
    }, 100).animate({
        height: '100px'
    }, 500);
    //Display the content
    $('#slider-product .content').html(caption);
}