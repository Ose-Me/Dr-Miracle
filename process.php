<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "drmiracle";
try {
    $email = $_POST['email'];
    date_default_timezone_set("Africa/Lagos");
    $insertdate = date("Y-m-d H:i:s");
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    /* set the PDO error mode to exception */
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "INSERT INTO subscribers (email)
    VALUES ('$email')";
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {

    	echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>