<?php
// Include config file
require_once "config.php";
require_once "functions.php";
// Define variables and initialize with empty values
$name = $id = "";
$name_err = $id_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } else{
        $name = $input_name;
    }
    // Validate ID 
    $input_id = trim($_POST["id"]);
    if(empty($input_id)){
        $id_err = "Please enter an id.";     
    } else{
        $id = $input_id;
    }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($id_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO questions (id,title) VALUES (?,?)";
        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_id, $param_name);
            
            // Set parameters
            $param_id = $id;
            $param_name = $name;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
            // Count questions 
                $query = "select * from questions ";
                $results=mysqli_query($link, $query);
                $total=$results->num_rows;
            // save total questions 
                $enregistrer = " UPDATE user SET ip='$total' ";
                $link->query($enregistrer);
     
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="img/logo-tt.svg"/>

    <meta charset="UTF-8">
    <title>Ajouter des questions</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            padding-top: 100px;
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Ajouter des questions :</h2>
                    </div>
                    <p>Vous pouvez ajouter les questions à afficher au sondage.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control"><?php echo $id; ?>
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Question</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                       
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>