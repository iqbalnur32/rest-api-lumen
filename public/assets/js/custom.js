$(document).ready(function() {
	
	// Scroll Smoth
	$("a").on('click', function(event) {
		
		if(this.hash !== "") {
			event.preventDefault();

			var hash = this.hash;

			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 800, function() {
				window.location.hash = hash;
			});
		}
	});
	// End Scroll Smoth

	/* Navbar Top Fixed  */
	$(window).scroll(function(){
        var top=$(window).scrollTop();

        if(top > 55)
        {
            $(".navbar").addClass('navbar-top');
        } 
        else if($(".navbar").hasClass('navbar-top')){
             $(".navbar").removeClass('navbar-top');
        }

    });

        // close navbar-collapse when a  clicked
        $(".navbar-nav a").on('click', function () {
            $(".navbar-collapse").removeClass("show");
        });

    /* End Navbar Top Fixed */

    /* Scroll Top */
    var win = $(window),
    navbar = $('.navbar'),
    scrollUp = $(".scroll-top");

    win.on('scroll', function () {
    	if ($(this).scrollTop() >= 600) {
    		scrollUp.show(300);
    	} else {
    		scrollUp.hide(300);
    	}
    });

        // Back To 0 Scroll Top body
        scrollUp.on('click', function () {
        	$("html, body").animate({ scrollTop: 0}, 1000);
        });
        /* End Scroll Top */

});