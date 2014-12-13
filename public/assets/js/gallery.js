$(function() {  
    manageGallery();
});

function manageGallery(){
    function mixitup() {
        $("#gallery").mixItUp({
            animation: {
                duration: 400,
                effects: "fade translateZ(-360px) stagger(34ms)",
                easing: "ease",
                queueLimit: 3,
                animateChangeLayout: true,
                animateResizeTargets: true
            }
        });
    }


    $('.magnific').magnificPopup({
        type:'image',
        gallery: {
            enabled: true
        },
        removalDelay: 300,
        mainClass: 'mfp-fade'
    });

    mixitup();
}
