<?php

  $today = date("Y-m-d");
  $time = date("H:i:s");


  // access data
  $host = "";
  $dbUsername = "";
  $dbPassword = "";
  $dbName = "";

  // connection
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

  $topic = mysqli_real_escape_string($conn, $_POST['topic']);
  $content = mysqli_real_escape_string($conn, $_POST['content']);

  if (mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  } else{
    $sql = "INSERT INTO feedback VALUES('$topic' , '$content', DATE '$today', '$time');";
    mysqli_query($conn, $sql);
  }

  // redirect
  header("Location:../ask.html");
?>
