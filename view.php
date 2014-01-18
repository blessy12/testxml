<?php

//include 'connect.php';

function add_country($name,$code) {
    $connection = mysqli_connect("localhost", "root", "", "testxml");
    if (!$connection) {
        die('connect error: ' . mysqli_connect_error());
    }
    $xml = simplexml_load_file('countries.xml');
    echo $insert = $xml->state->add;
    $stmt = mysqli_prepare($connection, $insert);
    if (!$stmt) {
        die('mysqli error: ' . mysqli_error($connection));
    }
    mysqli_stmt_bind_param($stmt,"ss",$name,$code);

    if (!mysqli_execute($stmt)) {
        die('stmt error: ' . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_execute($stmt);
    // $stmt->close();
    //$mysqli->close();
}

?>