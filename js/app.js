$(document).foundation();






// Game function

$(document).ready(function(){
  $('.infobulle').hide();
});

  var life;
  var data;
  function init(){
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
          if (index == 'life') {
            life = el;
          }
    });
      }
    });
  }

  function feed(){
    var d = new Date().toLocaleString();
    // var datetime = d.getDate();
    var increase_feed = eval(life+"+1");
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
