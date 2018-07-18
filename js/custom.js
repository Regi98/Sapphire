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
         
         window.location.href = "movies-modal.php?id=" + dataid;
             
         } 
function goDoSomethingSeries(identifier){     
         var dataid = $(identifier).data('id');
         
         window.location.href = "series-modal.php?id=" + dataid+"&season=1";
             
         }
function goDoSomethingMusic(identifier) {
  var dataid = $(identifier).data('id');

  window.location.href = "music-modal.php?id=" + dataid;

}

$('#season-number').on('change', function(){
  var season_number = $(this).val();
  var series_id = getUrlParameter('id');
  console.log(season_number+series_id);

  window.location.href = "series-modal.php?id=" + series_id+"&season="+season_number;
});
$(document).ready(function(){
  var season = getUrlParameter('season');
  $('#season-number').val(season)
});
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
$('#maingenre').on('change', function () {
  var main_genre = $(this).val();
  var genre_id = getUrlParameter('id');
  console.log(main_genre + genre_id);

  window.location.href = "series-genre.php?genre=" + main_genre;
});
$(document).ready(function () {
  var genre = getUrlParameter('genre');
  $('#maingenre').val(genre)
});
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

$(document).ready(function(){
    $(".wallet").hide();
    $(".credit").hide();
    $(".token").hide();
    $("#wallet").click(function(){
                $(".wallet").show();
                $(".credit").hide();
                $(".token").hide();
    }).change();
    $("#credit").click(function(){
                $(".credit").show();
                $(".wallet").hide();
                $(".token").hide();
    }).change();
    $("#token").click(function(){
                $(".token").show();
                $(".credit").hide();
                $(".wallet").hide();
    }).change();
});