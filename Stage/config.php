<!--  connextion a la base donnée -->
<?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "sondage";

$conn = mysqli_connect($server, $user, $pass, $database);
// Error msg
if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
?>