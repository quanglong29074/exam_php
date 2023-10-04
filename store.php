<?php
$name = $_POST["name"];
$age= $_POST["age"];
$address= $_POST["address"];
$telephone = $_POST["telephone"];


//$_GET["email"]

//Xử lý dữ liệu nhận đươc

//Quay trở về danh sách

// get products from db
// 1. connect db
$host = "127.0.0.1";
$dbname = "t2210a_php";
$dbuser = "root";
$dbpass = ""; // Xampp: ""   Mamp: "root"

$conn = new mysqli($host,$dbuser,$dbpass,$dbname); // host user pass dbname
if($conn->connect_error){
    die("Connection refused!");
}
$sql_check = "SELECT * FROM students WHERE name='$name' AND telephone='$telephone'";
$result_check = $conn->query($sql_check);
if ($result_check->num_rows > 0) {
    die("This student already exists");
}

$sql = "insert into students(name,age,address,telephone) values  ('$name', '$age','$address', '$telephone')";
$conn-> query($sql);
header("Location: Students.php");