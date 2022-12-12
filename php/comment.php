<?php




  // access data
  $host = "";
  $dbUsername = "";
  $dbPassword = "";
  $dbName = "";

  // connection
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

  // data
  $today = date("Y-m-d");
  $time = date("H:i:s");
  $topic = mysqli_real_escape_string($conn, $_POST['topic']);
  $content = mysqli_real_escape_string($conn, $_POST['content']);
  // how to get id from the html ? idk yet
  $threadId = mysqli_real_escape_string($conn, $_POST['id']);



  if (mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  } else{
    $sql = "INSERT INTO comment VALUES('$threadId' ,'$topic' , '$content', DATE '$today', '$time');";
    mysqli_query($conn, $sql);
  }

  // redirect
  header("Location:../index.html");
?>
