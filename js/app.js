$(document).foundation();






// Game function

$(document).ready(function(){
  $('.infobulle').hide();
});

  var pv;
  var pv_max;
  var data;
  var x = document.getElementById("geoloc");
  function init(){


getLocation();

    $('.panneau').addClass('memphis');
     data = document.body.getAttribute('user');
    $.ajax({
      type : 'GET',
      url :  'function/ajax.php',
      data : {
        get_tam : data
      },
      success : function(response){
        var resp = JSON.parse(response);
        $.each(resp, function(index, el) {
          $('#'+index).html(el);
          if (index == 'pv') {
            $('#'+index).html('<meter value="'+el+'"min="0" low="'+(el*.33)+'" high="'+el*.77+'" optimum="'+el+'" max="'+resp['pv_max']+'"></meter>');
            pv = el;
            pv_max = resp['pv_max'];
          }
    });
      }
    });
  }
  function getLocation() {

  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
  } else {
      x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
    // x.innerHTML = "Latitude: " + position.coords.latitude +
    // "<br>Longitude: " + position.coords.longitude;

    var lat =  position.coords.latitude ;
    var long = position.coords.longitude;

    $.ajax({
            type: 'GET',
            dataType: "json",
            url: "http://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+long+"&sensor=false",
            data: {},
            success: function(data) {
                $('#city').html(data);
                $.each( data['results'],function(i, val) {
                    $.each( val['address_components'],function(i, val) {
                        if (val['types'] == "locality,political") {
                            if (val['long_name']!="") {
                                $('#city').html(val['long_name']);
                            }
                            else {
                                $('#city').html("unknown");
                            }
                            console.log(i+", " + val['long_name']);
                            console.log(i+", " + val['types']);
                        }
                    });
                });
                console.log('Success');
            },
            error: function () { console.log('error');
            $('#city').html('probleme de connection'); }
        });


}

  function feed(){
    var d = new Date().toLocaleString();
    // var datetime = d.getDate();


    if (pv < pv_max) {
      var increase_feed = eval(pv+"+5");
        console.log(increase_feed);
    $.ajax({
      type : 'post',
      url : 'function/ajax.php',
      data : {
        feed : increase_feed,
        user : data,
        date : d,
      },
      success : function(response){
            $('.info').html(return_etat("feed"));
            $('.infobulle').show();
            // $('.infobulle').fadeOut(5000);
        init();
      }
    });
    }
    else{
      console.log('Déja au max');
    }
  }

  function shake(e){
    $('.tamview').removeClass('tamanime');
    $('.tamview').addClass('shake');

setTimeout(function () {
    $('.tamview').removeClass('shake');
    $('.tamview').addClass('tamanime');
}, 2000);

$('.info').html(return_etat("love"));
$('.infobulle').show();
}

function return_etat(etat){
  if (etat== "feed") {
    return "<span><img src='images/watermelon.png'/></span>";
  }
  if (etat == "love") {
    return "<span><img src='images/hearts.png'/></span>";
  }
}

// Function generale


  function submitForm(){
  var data = $("#login-form").serialize();
  $.ajax({
  type : 'POST',
  url : 'function/login_process.php',
  data : data,
  beforeSend: function(){
  $("#error").fadeOut();
  $("#login_button").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
  },
  success : function(response){
  if(response=="ok"){
    window.location.reload(true);

  } else {
  $("#error").fadeIn(1000, function(){
  $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   '+response+' !</div>');
  $("#login_button").html('<span class="glyphicon glyphicon-log-in"></span>   Sign In');
  });
  }
  }
  });
  return false;
  }

  function logout(){
  $.ajax({
      type: 'GET',
      url: 'function/logout.php',
      success: function() {
        window.location.reload(true);

      }
  });
  }

  function ferme(e){
    $(e).slideUp();
  }
