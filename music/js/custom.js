//MINE.JS //
$(document).ready(function(){

    $('.regular').slick({
      dots: true,
      //variableWidth: true,
      centerPadding: '0px',
      slidesToShow: 5,
      slidesToScroll: 5,
      speed: 500,
      infinite:true,

          responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
          infinite: true,
          dots: true,
          arrows: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
          infinite: true,
          dots: true,
          arrows: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true,
          arrows : false
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
    });
  });
      

  function goDoSomething(identifier){     
         var dataid = $(identifier).data('id');
         
         window.location.href = "music-modal.php?id=" + dataid;
             
         } 
function introLoader(element,delay) {
  this.open = function(callback) {
    setTimeout(function() {
      $(element).fadeIn(500, function() {
        if(callback !== undefined) callback();
      });
    }, delay);
    
  };
  this.close = function(callback) {
    setTimeout(function() {
      $(element).fadeOut(500, function() {
        if(callback !== undefined) callback();
      });
    }, delay);
  };
}
$('video#player').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
    var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
    var event = state ? 'FullscreenOn' : 'FullscreenOff';

    // Now do something interesting
    document.getElementById('player').pause();
});
$(window).keypress(function(e) {
  var video = document.getElementById("player");
  if (e.which == 32) {
    if (video.paused == true)
      video.play();
    else
      video.pause();
  }
  
});

$("#box1").click(function(){
     window.location=$(this).find(".clean-link").attr("href"); 
     return false;
});
//MINE JS END//


//PRELOADER JS //

$(window).on('load', function() {
  $(".preloader").fadeOut();
  });

$('#controlR').click(function() {
      event.preventDefault();
      $('#content').animate({
        marginLeft: "-=400px"
      }, "fast");
   });

 $('#controlL').click(function() {
      event.preventDefault();
      $('#content').animate({
        marginLeft: "+=400px"
      }, "fast");
 });

$(document).ready(function(){
    $("#selectme").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});