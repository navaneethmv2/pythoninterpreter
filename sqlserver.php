<?php

$username="root";
$pass="";
$servername="localhost";
$dbname="compiler";
$conn=mysqli_connect($servername,$username,$pass,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

    $code = $_POST['code'];
    $input = $_POST['input'];
    $filenames = $_POST['filename'];

    $inputfilepath = "files/input.txt";
    $inputfile = fopen($inputfilepath,"w");
    fwrite($inputfile,$input);
    fclose($inputfile);

    $codefilepath = "files/".$filenames."."."py";
    $codefile = fopen($codefilepath,"w");
    fwrite($codefile,$code);
    fclose($codefile);

    $output = $_POST['outputs'];

    $sql = "INSERT INTO files  (file_name, output) VALUES ('$filenames','$output')";


    if ($conn->query($sql) === TRUE) {
        echo "File inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }




?>