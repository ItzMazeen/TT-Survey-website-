<?php 
session_start();
	include("config.php");
	include("functions.php");
	$user_data = check_login($conn);
	$username = $user_data['username'];

        //action when clicking next button (next question)
        if (isset($_POST['forward'])) {
        //redirect pages

            header("Location: resultats.php");
            exit();
      
        }
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Magnifica Questionnaire Form Wizard includes Coronavirus Health questionnaire">
    <meta name="author" content="Ansonika">
    <title>Tt Sondage</title>
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
	<!-- MODERNIZR MENU -->
	<script src="js/modernizr.js"></script>
    <link rel="icon" href="img/logo-tt.svg" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>
<body>	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->
	<header>
		<div class="container">
		    <div class="row">            
            </div>
		</div>
		<!-- /container -->
	</header>
	<!-- /Header -->
	<div class="container">
    <div id="form_container">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div id="left_form">
                    <figure><img src="img/logo-tt.svg" alt="" width="190" height="190"></figure>
                    <h2>Tunisie Télécom <span>Questionnaire Client</span></h2>
                    <p>Enquête sur la qualité de service et la tarification d'offres d'internet.</p>    
                </div>
            </div>
            <div class="col-lg-8">
                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>  
                        <span id="location"></span>   
                    </div>
                    <!-- /top-wizard -->
                    
                    
                    <form id="wrapped" method="post">
                        <input id="website" name="website" type="text" value="">  
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">
                        <div class="text-center">
                        <div class="submit step" id="end">
                                <div class="summary">
                                    <div class="wrapper">
                                        <h4> <br> <br>Bienvenue  <?php echo $user_data['username']; ?> &#10084;&#65039; | <a href="logout.php" >Déconnecter</a>
<br> <br> Vous avez déja faire ce sondage ! </h4> <br>*cliquer sur le bouton <b>Résultats</b> pour consulter les résultats du sondage. <br> 
                                                       </div>
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /middle-wizard -->
                        <div id="bottom-wizard"> 
                            <button type="submit" name="forward" class="forward" value="Test Required" id="checkBtn">Résultats</button>
                             
                        </div>
                        <!-- /bottom-wizard -->
                    </form>
                </div>
                <!-- /Wizard container -->
            </div>
        </div><!-- /Row -->
    </div><!-- /Form_container -->
</div>
<!-- /container -->
	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/common_functions.js"></script>

	<!-- Wizard script-->
	

</body>
</html>