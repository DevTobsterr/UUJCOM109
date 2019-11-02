<!-- THIS IS THE PHP FOR THE WEB FORM -->
<?php 
$servername = "localhost";
$username = "B00753973";
$password = "9Cg85YmJ";
$database = "b00753973";
$divName = "cinfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = 'SELECT company FROM userinformation GROUP BY company HAVING count(*) > 0';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<div id=$divName>";
    echo "<h1><br> COMPETITING COMPANIES </h1> ";
    echo "---------------------------";
    while($row = $result->fetch_assoc()) {
        echo "<h1 id=''>".$row["company"]. "</h1>";

    }
   	echo "---------------------------";
   	echo "<h1>DON'T MISS YOUR CHANCE</h1> ";
	

} else {
    echo "<div id=$divName>";
    echo "<h1><br> COMPETITING COMPANIES </h1> ";
    echo "---------------------------<br>";
    echo "NO RESULTS TO SHOW";
}

$conn->close();
?>
<html> 
<head> 
<link rel="stylesheet" type="text/css" href="..\css\cv.css"> 
</head>
</html>
