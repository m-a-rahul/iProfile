<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPropel</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <style media="screen">
    body{
      background-color:#5394b0;
    }
    #bg
    {
      background:url(./img/bg-img.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }
    h3 {
      font-family: 'Pacifico', cursive;
    }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="./img/logo.jpg" width="250" height="auto" alt="">
        </a>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col md-6 d-none d-lg-block mt-5" id="bg">
        </div>
        <div class="col-lg-6 col-12 border shadow-lg bg-body rounded pb-5 px-4 bg-light mt-5">
          <h3 class="py-3">Login</h3>
          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error" style="display:none">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <form method="post">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password">
            </div>
            <button type="submit" id="login" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </body>
  <script>
  // Form submission
  $(document).ready(function() {
    $('#login').on('click', function() {
  		var email = $('#email').val();
  		var password = $('#password').val();
  		if(email!="" && password!="" ){
  			$.ajax({
  				url: "save.php",
  				type: "POST",
  				data: {
  					type:2,
  					email: email,
  					password: password
  				},
  				cache: false,
  				success: function(dataResult){
  					var dataResult = JSON.parse(dataResult);
  					if(dataResult.statusCode==200){
  						location.href = "welcome.php";
  					}
  					else if(dataResult.statusCode==201){
  						$("#error").show();
  						$('#error').html('Invalid EmailId or Password !');
  					}

  				}
  			});
  		}
  		else{
  			alert('Please fill all the field !');
  		}
  	});
  });
  </script>
</html>
