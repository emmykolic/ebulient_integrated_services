$(document).ready(function(){
    $(".owl-one").owlCarousel({
        items: 4,
        margin: 15,
        padding: 15,
        loop: true,
        autoplay: true,
        mouseDrag: true,
        stagePadding: 5,
        smartSpeed: 200,
        stopOnHover: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1,
            dots: false,
          },
          485: {
              items: 2,
              dots: false,
          },
          720: {
              items: 2,
              dots: false,
          },
          960: {
              items: 3,
              dots: false,
          },
          1200: {
            items: 4,
            dots: false,
          }
        }
    });
});

// document.getElementById('showFloatingBox').addEventListener('click', function() {
//   var toast = new bootstrap.Toast(document.getElementById('floatingBox'));
//   toast.show();
// });

(function ($) {
    "use strict";
    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1000);
    };
    spinner();
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });

    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });

    //Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav : false
    });
    
})(jQuery);


//dark mode
// function changeColor() {
//     var element = document.getElementById('agenda');
//     element.classList.toggle("dark-mode");
  
//     var x = document.getElementById("btnValue");
//     if (x.innerHTML === "Dark mode") {
//       x.innerHTML = "Light mode";
//       x.classList.remove('btn-dark')
//       x.classList.toggle('btn-light')
//     }else {
//       x.innerHTML = "Dark mode";
//       x.classList.remove('btn-light')
//       x.classList.toggle('btn-dark')
//     }  
// }

        /*--------------------------
        Image Croper
  ---------------------------- */
  var mainWidth=$('#cropperWrapper').width();
  var subWidth=mainWidth-50;
  var $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:subWidth,
      height:subWidth,
      type:'square' //circle square
    },
    boundary:{
      width:mainWidth,
      height:mainWidth,
    }
  });
  
  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    // $('#uploadimageModal').modal('show');
  });
  
// For Crooping Products Photo
$('.crop_product_image').click(function(event){
  $("#loading").removeClass('d-none');
  var burl=$('#burl').val();
  var code=$('#code').val();
  $image_crop.croppie('result', {
    type: 'canvas',
    size: '1000,1000'
  }).then(function(response){
      response=response.split(";");
      response=response[1];
      response=response.split(",");
      response=response[1];
    $.ajax({
      url:(burl+"croppie/defaultb"),
      type: "POST",
      data:{
          "image": response,
          "code": code
      },
      success:function(data)
      {
        
         window.location.assign(burl+"products/");
      }
    });
  })
});

  // For Crooping User Photo
$('.crop_image').click(function(event){
  $("#loading").removeClass('d-none');
  var burl=$('#burl').val();
  var uid=$('#uid').val();
  $image_crop.croppie('result', {
    type: 'canvas',
    size: '1000,1000'
  }).then(function(response){
      response=response.split(";");
      response=response[1];
      response=response.split(",");
      response=response[1];
    $.ajax({
      url:(burl+"croppie/user_photo"),
      type: "POST",
      data:{
          "image": response,
          "uid": uid
      },
      success:function(data)
      {
        
         window.location.assign(burl+"admin_profile/");
      }
    });
  })
});

  // For Crooping User Photo
  $('.crop_image').click(function(event){
    $("#loading").removeClass('hidden');
    var burl=$('#burl').val();
    var uid=$('#uid').val();
    $image_crop.croppie('result', {
      type: 'canvas',
      size: '1000,1000'
    }).then(function(response){
        response=response.split(";");
        response=response[1];
        response=response.split(",");
        response=response[1];
      $.ajax({
        url:(burl+"croppie/user_photo"),
        type: "POST",
        data:{
            "image": response,
            "uid": uid
        },
        success:function(data)
        {
          
           window.location.assign(burl+"profile/");
        }
      });
    })
  });

  // Search Toggle
  $("#search_input_box").hide();
  $("#search").on("click", function () {
      $("#search_input_box").slideToggle();
      $("#search_input").focus();
  });
  $("#close_search").on("click", function () {
      $('#search_input_box').slideUp(500);
  });

  $(document).ready(function() {
    // Function to handle incrementing the price
    function incrementPrice(productId) {
      var burl=$('#burl').val();
      var uid=$('#uid').val();
      $.ajax({
        url: (burl+"carts/action"), // PHP script to update the price in the database
        method: 'POST',
        data: {
          productId: productId
        },
        success: function(response) {
          // Update the total display
          $('#total').text(response);
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }

    // Event listener for the input change event
    $('#price-input').on('change', function() {
      var productId = '#price-input'; // Replace with the actual product ID

      // Call the incrementPrice function
      incrementPrice(productId);
    });
  });

  // Start of Tawk.to Script
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/6481ac0b94cf5d49dc5c8033/1h2d8g46n';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  // End of Tawk.to Script

  // setInterval(function () {
  //   load_last_notification()
  // }, 10000)