<?php

header('Content-Type: application/json');

  // Check for GET variable
  if(isset($_GET['x'])){

    $x = $_GET['x'];

    $connection = mysqli_connect("localhost", "root", "", "naselja_rh");
    mysqli_query($connection ,'SET NAMES utf8');

    $sql = "SELECT * FROM naselja WHERE postanski_broj = '$x' LIMIT 1";

    $result = mysqli_query($connection, $sql);

    // Fetch Data
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($data); 
    
  }elseif(isset($_GET['z'])){

    $z = $_GET['z'];

    $connection = mysqli_connect("localhost", "root", "", "naselja_rh");
    mysqli_query($connection ,'SET NAMES utf8');

    $sql = "SELECT * FROM naselja WHERE opcina LIKE '%$z%' LIMIT 1";

    $result = mysqli_query($connection, $sql);

    // Fetch Data
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
    echo json_encode($data); 

  }

