jQuery(document).ready(function( $ ) {
    window.sr = ScrollReveal();

    var testimonialItem = $(".slider .slide");
    var lengthOfItem = testimonialItem.length;
    var counter = 0;
    var contentClass = $("#page-wrapper").attr("class");
    var themeURI = $("#theme-uri").attr("class");
    var cardWrapper = $(".scroll-me");
    var card = $(".animate-me").toArray();
    var idleInterval = setInterval(timerIncrement, 1000); // 1 second
    var idleTime = 0;
    var sliderTime = 0;
    var limiterVar = false;
    var runEffect = false;
    var $animation_elements = $('#solution-3');
    var $window = $(window);
    var revealContainer = $('.fade-container');

    sr.reveal('.fade-me', { container: revealContainer ,viewFactor: 0.5, duration: 500, scale: 0.8, mobile: true});

    //Overlay fadeIn/fadeOut function
    function timerIncrement() {
        idleTime = idleTime+1;
        if (idleTime > 5 && runEffect) { // 5 seconds
            $(".overlay").fadeIn(500);
        }
        else if (idleTime > 120 && runEffect) { // 2 minutes
            window.location.reload();
        }
    }
    //Header button functions
    $(".search-toggle").click(function() {
        $(this).toggleClass('close-toggle');
        $('.social-block').toggleClass('shrink');
        $('#searchform').toggleClass('enlarge');
        return false;
    });
    $("#nav-icon").click(function() {
        $(this).toggleClass('open');
        $('.toggle-menu').toggleClass('open-menu');
        $('#sliderList').fadeToggle(500);
    })
    $( "#sliderList #slider-menu .dropdown-toggle" ).append( "<div class='arrow-container'><span class='arrow-icon'></span></div>" );
    $(".dropdown-toggle").click(function() {
        $(".arrow-container").not($(this).find(".arrow-container")).removeClass("turn");
        $(this).find(".arrow-container").toggleClass("turn");
    })

    //Input focus
    $(".registration-input").focus(function() {
        $(".sliding-span").removeAttr("style");
        if ($(this).val()) {
        }
        else {
            $(".registration-input").siblings(".sliding-span").removeAttr("style");
        }
        var movement = $(this).siblings(".sliding-span").outerWidth(true)*(-1);
        var strVar = movement.toString()+"px";
        $(this).siblings(".sliding-span").css("transform", "translateX("+strVar+")");
        $(this).siblings(".sliding-span").css("color", "#FAA619");
    });
    $(".registration-input").on("input", function() {
        if($(this).val()) {
            $(this).css("background", "white");
        }
        else {
            $(this).removeAttr("style");
        }
    });
    //Employee number selector
    $(".select-value").click(function() {
        $(".select-value").removeClass("selected-value");
        $(this).addClass("selected-value");
    });

    //Registration page form function
    $(".bttn-next").click(function() {
        var parent = $(this).parents(".registration-panel");
        parent.next().show();
        parent.hide();
    })
    //Adds a new transition class to element
    function transformClass(el) {
        el.className += " transformCard";
    }
    //Rotating testimonials function
    function startIteration(counter) {
        if (counter == lengthOfItem || counter == lengthOfItem-1) {
            counter = 0;
        }
        else {
            counter++;
        }
        testimonialItem.eq(counter-1).fadeOut(1500);
        testimonialItem.eq(counter).fadeIn(1500);
        setTimeout(function(){ startIteration(counter);}, 7000);
    }







    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if ($("scroll-me") && limiterVar == false) {
            limiterVar = true;
            for (i = 0; i < card.length; i++) {
                (function(i) {
                    setTimeout(function(){transformClass(card[i]);}, i*300);    //Tick through array every 3 milliseconds
                })(i);
            }
        }
        if(scroll > 210) {
            $(".custom-logo-link").css("width","125px");
            $(".custom-logo-link img").css("bottom","0px");
        } else {
            $(".custom-logo-link").css("width","0px");
            $(".custom-logo-link img").css("bottom","150px");
        }
    });

    //Hide menu if on content
    if (contentClass == "wrapper-content") {
        $("#wrapper-navbar").hide();
    }
    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
    $(this).on("click", function(e) {
        $(".overlay").fadeOut(500);
    });

    //Registration page flow
    $(".current-erp").on("click", function(e){
        $(".erp-system").toggle();
    })
    $(".registration-panel").toggle();
    $("#first-panel").show();

    //Rotating testiomonials
    testimonialItem.hide();
    setTimeout(function(){
        startIteration(counter);
    }, 1000);

    $(".partner").on("click", function(e) {
        e.preventDefault();
        var varIndex = $(this).index();
        console.log($(this).index());
        $(".partners-container .container .row").removeClass("active-row");
        $(this).parent().next().addClass("active-row");
        $(this).parent().next().find(".col-md-12").removeClass("show-info");
        $(this).parent().next().find(".col-md-12:eq("+varIndex+")").addClass("show-info");
    });
});