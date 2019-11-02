<!-- THIS IS THE PHP FOR THE WEB FORM -->
<?php 
$servername = "localhost";
$username = "B00753973";
$password = "9Cg85YmJ";
$database = "b00753973";

// Create connection

// https://scm.ulster.ac.uk/~B00753973/workspace/html/

// Linking HTML to PHP Vars 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$company = $_POST['company'];
$number = $_POST['number'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `userinformation` (`fname`, `lname`,`number`, `email`, `company`) VALUES ('$fname', '$lname','$number','$email', '$company')";

if ($conn->query($sql) === TRUE) {
    // alert("New record created successfully");
	header('Location: ../html/cv.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
