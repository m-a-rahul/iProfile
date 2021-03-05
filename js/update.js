// Form submission
$(document).ready(function() {
  $('#update').on('click', function() {
    var dob = $('#dob').val();
    var phone = $('#phone').val();
    var city = $('#city').val();
    var email = $('#email').val();
    if(dob!="" && phone!="" && city!="" ){
      $.ajax({
        url: "save.php",
        type: "POST",
        data: {
          type:2,
          email: email,
          phone: phone,
          dob: dob,
          city:city
        },
        cache: false,
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            location.href = "welcome.php";
          }
          else if(dataResult.statusCode==201){
            $("#error").show();
            $('#error').html('Invalid Request !');
          }

        }
      });
    }
    else{
      alert('Please fill all the field !');
    }
  });
});
