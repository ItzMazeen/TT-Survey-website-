<?php 
session_start();
	include("config.php");
	include("functions.php");
	$user_data = check_login($conn);
	$username = $user_data['username'];
    $number = (int) $_GET['n'];
    $query = "select title from questions
    where id = $number";
    $result=mysqli_query($conn, $query);
    $question= $result ->fetch_assoc();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //action when clicking next button (next question)
        if (isset($_POST['forward'])) {
        $next=$number+1;
        $query = "select * from questions ";
        $results=mysqli_query($conn, $query);
        $total=$results->num_rows;
        //save the score of total questions 
        $enregistrer = "UPDATE user SET ip='$total' where username='$username'";
        $conn->query($enregistrer);
        //save the score of submitting questions
        $enreg ="UPDATE user SET unix='$total' where username='$username'";
        $conn->query($enreg);
        //redirect pages
        if ($number == $total) {
            header("Location: final.php?n=".$total);
            exit();
        }
        else{
            header("Location: resultats.php");
        }
    } 
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
                    <script type="text/javascript">
                    $(document).ready(function () {
                    $('#checkBtn').click(function() {
                    checked = $("input[type=checkbox]:checked").length;
                    if(!checked) {
                    alert("Vous devez cocher la case.");
                    return false;
                                 }
                         });
                    });
                    </script>
                  
                    <form id="wrapped" method="post">
                        <input id="website" name="website" type="text" value="">  
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">
                        <div class="submit step" id="end">
                                <div class="summary">
                                    <div class="wrapper">
                                    <div class="text-center">
                                        <br><br><br><br>
                                        <h4>Merci pour votre temps <?php echo $user_data['username']; ?> ! &#10084;&#65039; </h4> <br> 
                                        <p> Nous vous contacter à votre adresse e-mail 
 <strong id="email_field"></strong> et si nécessaire prendre des mesures.</p>
                                   
                                   
                                        <div class="form-group terms">
                                            <label class="container_check">Veuillez accepter notre
 <a href="#" data-toggle="modal" data-target="#terms-txt">Termes et conditions
</a> avant Soumettre

                                                <input type="checkbox" name="terms" value="Yes" class="required">
                                                <span class="checkmark"></span>
                                                
                                            </label>
                                           
                                            </div>
                                            <center> <br>*cliquer sur le bouton <b>Résultats</b> pour consulter les résultats du sondage.  </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /middle-wizard -->
                        <div id="bottom-wizard"> 
                            <button type="submit" name="forward" class="forward" value="Test Required" id="checkBtn">Résultats</button>
                            <input type="hidden" name="number" value="<?php echo $next; ?>" />  
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