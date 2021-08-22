<?php 
session_start();
	include("config.php");
	include("functions.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(!empty($username) && !empty($password))
		{
			//read from database
			$query = "select * from user where username = '$username' limit 1";
			$result = mysqli_query($conn, $query);
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					//checking for the password 
					if($user_data['password'] === $password)
					{
            
						$_SESSION['id'] = $user_data['id'];
            $unix = $user_data['unix'];
            $ip = $user_data['ip'];
            $score = $unix +1;
            // checking if the id == 1 then redirect to admin page 
            if ($user_data['id'] == 1){
						header("Location: CRUD/index.php");
						die;}
            // checking if the client vote already then redirect to alreading voting page 
            else if (($unix === $ip) || ($unix > $ip))
              {
                header("Location: cedeja.php");
                   die;}
            // checking if there is a new questions non submitted then redirect vote them  
                    else if ($unix < $ip)
                    {header("Location: sondage.php?n=".$score);}
            // else going to first question 
                      else{header("Location: sondage.php?n=1");}   
          }  
				}
			}
			echo "<script>alert(' Woops ! Wrong username or password.')</script>";
		}else
		{
			echo "<script>alert(' Woops ! Wrong username or password.')</script>";
		}
    
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Tt Sondage | Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo-tt.svg"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="user_card1">
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
                <input type="text" name="username" class="form-control input_user" value="" placeholder="Username" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="password" class="form-control input_pass" value="" id="myInput" placeholder="Password" required>
              </div>
              <div class="custom-control custom-checkbox ">
              <input type="checkbox" onclick="myFunction()"> Show the Password</div>
              <script>
                function myFunction() {
                 var pw_ele = document.getElementById("myInput");
                   if (pw_ele.type === "password") {
                  pw_ele.type = "text";
                  } else {
                    pw_ele.type = "password";
                          }
                 }
                  </script>
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customControlInline">
                  <label class="custom-control-label" for="customControlInline">Remember me</label>
                </div>
              </div>
                <div class="d-flex justify-content-center mt-3 login_container">
             <button type="submit" name="button" class="btn login_btn">Login</button>
             </div>
            </form>
          </div>
          <div class="mt-4">
            <div class="d-flex justify-content-center links">
              Don't have an account? <a href="singup.php" class="ml-2">Sign Up</a>
            </div>
            <div class="d-flex justify-content-center links">
              <a href="forgot.html">Forgot your password?</a>
              
            </div>
            
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