<?php
$server = "localhost";
$name = "root";
$pass = "";
$dbName = "web";
$bace = mysqli_connect($server,$name,$pass,$dbName);
if (!$bace){
    die("connection failed :".mysqli_connect_error());
}
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "GET") {
    $sql = "SELECT * FROM foolder";
    $result = mysqli_query($bace, $sql);
    $row = array();
    if (mysqli_num_rows($result) > 0) {
        while ($r = mysqli_fetch_assoc($result)) {
            array_push($row, $r);
        }
        print json_encode($row);
    } else {
        echo "no data";
    }
}elseif ($method == "POST"){
    $name = $_POST['itemName'];
    $email = $_POST['itemEmail'];
    $pss = $_POST['itemPss'];
    $insert = "INSERT INTO foolder(`name`,`email`,`pss`) values ('$name', '$email', '$pss')";
    if (mysqli_query($bace, $insert)){
        echo "ok insert";
    }else{
        echo "error";
    }
}
mysqli_close($bace);