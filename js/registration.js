$(document).ready(function() {
  // Validate Password
  $('input[type=password]').keyup(function() {
    var pswd = $('#password').val();
    if ( pswd.length < 8 ) {
        $('#length').removeClass('valid').addClass('invalid');
    } else {
        $('#length').removeClass('invalid').addClass('valid');
    }
    if ( pswd.match(/[A-z]/) ) {
        $('#letter').removeClass('invalid').addClass('valid');
    } else {
        $('#letter').removeClass('valid').addClass('invalid');
    }
    if ( pswd.match(/[A-Z]/) ) {
        $('#capital').removeClass('invalid').addClass('valid');
    } else {
        $('#capital').removeClass('valid').addClass('invalid');
    }
    if ( pswd.match(/\d/) ) {
        $('#number').removeClass('invalid').addClass('valid');
    } else {
        $('#number').removeClass('valid').addClass('invalid');
    }
  }).focus(function() {
      $('#pswd_info').show();
  }).blur(function() {
      $('#pswd_info').hide();
  });
  // Form Validation
 function required(name,email,password) {
  if( name == ''  || name == "null" || email == ''  || email == "null" || password == ''  || password == "null") {
      return false;               
   }
   else if (!password.match(/[A-z]/)  || !password.match(/\d/) || password.length < 8 || !password.match(/[A-Z]/)) {
    alert("Your password isn't strong");
    return false;
  }
   else{
     return true;
   }
}
// Form submission
$('#register').on('click', function() {
  $("#register").attr("disabled", "disabled");
  var name = $('#name').val();
  var email = $('#email').val();
  var password = $('#password').val();
  var hash = window.btoa(password);
  if (required(name,email,password)) {
    $.ajax({
      url: "./php/save.php",
      type: "POST",
      data: {
        type: 1,
        name: name,
        email: email,
        password: hash
      },
      cache: false,
      success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        if(dataResult.statusCode==200){
          location.href = "login.html";
        }
        else if(dataResult.statusCode==201){
          $("#error").show();
          $('#error').html('Email ID already exists !');
          $("#register").removeAttr("disabled");
        }
      }
    });
    }
    else{
      $("#register").removeAttr("disabled");
    }
  });
});
