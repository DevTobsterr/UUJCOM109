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

$countlog = "..\media\countlog.txt"; 
$countlog1 = "..\media\countlog1.txt"; 
$iplog = "..\media\iplog.txt";

if (!file_exists($countlog)) {
    fopen($countlog, 'w');
}

if (!file_exists($iplog)) {
    fopen($iplog, 'w');
}


$ip = $_SERVER['REMOTE_ADDR']; 
$counter = fopen($countlog,'r'); 
$count = fgets($counter,1000);
fclose($counter); 

$count = $count + 1;
echo "<div id=$divName>";
echo "<br><h1> SITE ANALYTICS</h1>";
echo "-------------------------------";
echo "<br>UNIQUE VIEWS: ".$count." hit(s)";

if (!in_array($ip, file($iplog,FILE_IGNORE_NEW_LINES))) {
    $hitcounter = (file_exists($countlog)) ? file_get_contents($countlog) : 0;
    file_put_contents($iplog,$ip."\n", FILE_APPEND);
    file_get_contents($countlog, ++$hitcounter);
}








$file = fopen($countlog1, 'r');
$icount = fgets($file,1000);
fclose($file); 

$icount = $icount + 1; 

echo "<div id=$divName>";
// echo "<br>";
echo "INDIVIDUAL VIEWS: ".$icount." hit(s)";

$file = fopen($countlog1, 'w'); 
fwrite($file, $icount);
fclose($file);









$conn->close();






?>
<html> 
<head> 
<link rel="stylesheet" type="text/css" href="..\css\cv.css"> 
</head>
</html>
