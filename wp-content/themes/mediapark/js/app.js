$(document).ready(function(){

    // SliderJS
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 'auto',
        slidesOffsetAfter: 40,
        slidesOffsetBefore: 40,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {  
            576: {
                slidesPerView: 'auto',
                slidesOffsetAfter: 140,
                slidesOffsetBefore: 140,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 'auto',
                slidesOffsetAfter: 150,
                slidesOffsetBefore: 150,
                spaceBetween: 40,
            },
            992: {
                slidesPerView: 'auto',
                slidesOffsetAfter: 180,
                slidesOffsetBefore: 180,
                spaceBetween: 60,
            },
            1200: {
                slidesPerView: 'auto',
                slidesOffsetAfter: 200,
                slidesOffsetBefore: 200,
                spaceBetween: 80,
            },
            1400: {
                slidesPerView: 'auto',
                slidesOffsetAfter: 220,
                slidesOffsetBefore: 220,
                spaceBetween: 100,
            },
            1920: {
                slidesPerView: 'auto',
                slidesOffsetAfter: 220,
                slidesOffsetBefore: 220,
                spaceBetween: 100,
            },
        },
    });
    // End SliderJS


    // Toggle hamburger Menu
    $('#hamburger-button').click(function(){
        $('#hamburger-toggle').toggle();
    });
      
    // Toggle dropdown button
    $('body').on('click', '.dropdown-button-group .dropdown', function(){
        if($(this).hasClass('active')){
          $(this).removeClass('active');
        }
        else{
          $('.dropdown-button-group .dropdown').removeClass('active');
          $(this).addClass('active');
        }
    });


    $('body').on('click', '#area_m2 li, #number_of_rooms li, #window_orientation li, #completion li', function(){
        var filter = $(this).parent().attr('id')
        var filter_value = $(this).attr('value');
        var nonce = $(this).parent().attr("data-nonce");

        $.ajax({
            type : "post",
            dataType : "json",
            url : ajax.ajaxurl,
            data : {
                action:         "request_filter",
                nonce:          nonce,
                filter :        filter,
                filter_value :  filter_value
            },
            success: function(response) {

                if(response.status == 400)
                {
                    alert('Error - Please contact admin!');
                }
                if(response.status == 200)
                {
                    $('#property-table tbody').html(response.data);
                }
            }
        });
    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    $('#submit-contactform').on('click', function(event){
        event.stopPropagation();
        event.preventDefault();

        var isSubmittable = true;

        var name_input = $('#name-input').val();
        var email_input = $('#email-input').val();
        var subject_input = $('#subject-input').val();
        var message_input = $('#message-input').val();

        if( name_input == '' ){
            $(".for-name-input").css('visibility', 'visible');
            isSubmittable = false;
        }
        else{
            $(".for-name-input").css('visibility', 'hidden');
        }

        if( !(isEmail(email_input)) ){
            $(".for-email-input").css('visibility', 'visible');
            isSubmittable = false;
        }
        else{
            $(".for-email-input").css('visibility', 'hidden');
        }

        if( subject_input == '' ){
            $(".for-subject-input").css('visibility', 'visible');
            isSubmittable = false;
        }
        else{
            $(".for-subject-input").css('visibility', 'hidden');
        }

        if( message_input == '' ){
            $(".for-message-input").css('visibility', 'visible');
            isSubmittable = false;
        }
        else{
            $(".for-message-input").css('visibility', 'hidden');
        }

        if (!$("input#agreement-checkbox").is(":checked")) {
            $(".for-agreement-checkbox").css('visibility', 'visible');
            isSubmittable = false;
        }
        else{
            $(".for-agreement-checkbox").css('visibility', 'hidden');
        }

        if(isSubmittable){
            $('#contact-form').submit();
        }

    });

    $('.home-nav').on('click', function(){
        $('#hamburger-toggle').hide();
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#gallery-container").offset().top
        }, 500);
    });

    $('.introduction-nav').on('click', function(){
        $('#hamburger-toggle').hide();
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#datatables-container").offset().top
        }, 500);
    });

    $('.news-nav').on('click', function(){
        $('#hamburger-toggle').hide();
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#blog-container").offset().top
        }, 500);
    });

    $('.contact-nav').on('click', function(){
        $('#hamburger-toggle').hide();
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#contact-form-container").offset().top
        }, 500);
    });

});