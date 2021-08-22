<?php 

include("config.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
		if ($password == $cpassword)
		{
			//save to database
			$id = random_num(20);
			$query = "insert into user (id,username,email,password) values ('$id','$username','$email','$password')";
			mysqli_query($conn, $query);
			header("Location: index.php");
			die;
		}
    else
		{
			echo "<script>alert(' Woops ! Something Wrong Went.')</script>";
		}
	}
  

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Tt Sondage | Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="img/logo-tt.svg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="user_card">
          <div class="d-flex justify-content-center">
            <div class="brand_logo_container">
              <img src="img/logo.jpg" class="brand_logo" alt="Logo">
            </div>
          </div>
          <div class="d-flex justify-content-center form_container">
            <form action="" method="POST">
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="username" class="form-control input_user" value="" placeholder="Your Username" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                </div>
                <input type="email" name="email" class="form-control input_mail" value="" placeholder="Your Email" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" name="password" class="form-control input_user" value="" id="myInput" placeholder="Your Password" required>
              </div>
              <div class="input-group mb-4">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="cpassword" class="form-control input_user" value="" id="myInput2" placeholder="Confirm Password" required>
              </div>
              <div class="custom-control custom-checkbox ">
                <input type="checkbox" onclick="myFunction()"> Show the Password</div>
                <script>
                  function myFunction() {
                    var pw_ele = document.getElementById("myInput");
                    var pw_ele2 = document.getElementById("myInput2");
                    if (pw_ele.type && pw_ele2.type === "password") {
                      pw_ele2.type = "text";
                      pw_ele.type = "text";
                    } else {
                      pw_ele2.type = "password";
                      pw_ele.type = "password";
                    }
                  }
                  </script>
                <div class="d-flex justify-content-center mt-3 login_container">
             <button type="submit" name="button" class="btn login_btn">Register</button>
             </div>
             <div class="d-flex justify-content-center mt-3 login_container">
             <button type="cancel" name="cancel" onclick="javascript:window.location='index.php';" class="btn login_btn">Cancel</button>
            
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>