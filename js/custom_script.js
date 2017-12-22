jQuery(document).ready(function( $ ) {
    //Rotating testiomonials --new
    var testimonialItem = $(".slider .slide");
    var lengthOfItem = testimonialItem.length;
    var counter = 0;
    var imageCounter = 1;

    testimonialItem.hide();
    setTimeout(function(){
        startIteration(counter);
    }, 1000);

    function startIteration(counter) {
        if (counter == lengthOfItem || counter == lengthOfItem-1) {
            counter = 0;
        }
        else {
            counter++;
        }
        testimonialItem.eq(counter-1).fadeOut(500);
        testimonialItem.eq(counter).fadeIn(1500);
        setTimeout(function(){ startIteration(counter);}, 5000);
    }
    //Change image in registration page on button click
    function changeImage() {
        var imageContainer = $(".distraction");
        $(".distraction > .image-panel:nth-child("+imageCounter+")").hide(500);
        imageCounter++;
        $(".distraction > .image-panel:nth-child("+imageCounter+")").show("ease");
    }

    //Returns screen width
    $(".subscribe-button").click(function() {
        var anchorarray = $(this).attr("href").split("#");
        var anchor = anchorarray[anchorarray.length-1];
        $('html, body').animate({
            scrollTop: $("#"+anchor).offset().top,
            easing: 'easeOutBounce'
        }, 1000);
        $('input[name=email]').focus();
        return false;
    });
    function screenWidth() {
        return $(window).width();
    }
    function isEmail(emailVar) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (emailVar != "" && emailVar.length > 0 && regex.test(emailVar)) {
            return true;
        }
        else {
            return false;
        }
    }


    $(".news-item").click(function() {
        window.location = $(this).find("a").attr("href");
        return false;
    });

    //Sliding menu code start
    $('#nav-icon').click(function(){
        $(this).toggleClass('open');
        $("#site-navigation").toggleClass("toggled");
    });
    $( ".menu-item-has-children" ).append( "<input type='button' class='dropdown-toggle'/>" );

    $(".dropdown-toggle").click(function() {
        $(this).toggleClass('open');
        $(this).siblings('.sub-menu').toggleClass('dropdown-open');
        return false;
    });
    //Registration page flow
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
    ////Select value on click
    $(".current-erp").on("click", function(e){
        $(".erp-system").toggle();
    })
    //Employee number selector
    $(".select-value").click(function() {
        $(".select-value").removeClass("selected-value");
        $(this).addClass("selected-value");
    });
    //Hide all registration panels
    $(".image-panel").toggle();
    $(".registration-panel").toggle();
    //Show first registration panel
    $("#first-panel").show();
    $("#first-image").show();
    //Clicking Next reveals next registration form
    $(".required-alert").toggle();
    $("#firstNext").click(function() {
        var nameInput = $("#nameInput").val();
        var emailInput = $("#emailInput").val();
        var contactInput = $("#contactInput").val();
        if (isEmail(emailInput) && nameInput != "" && contactInput != "") {
            changeImage();
            var parent = $(this).parents(".registration-panel");
            parent.next().show();
            parent.hide();
        } else {
            $(".required-alert").show();
            $(".required-alert").removeClass("shake");
            $(".required-alert").addClass("shake");
        }
    })
    $("#secondNext").click(function() {
        changeImage();
        var parent = $(this).parents(".registration-panel");
        parent.next().show();
        parent.hide();
    })
});
