<?php
  // data
    // getting the thread id
    // the thread id is visible in the html
    // e.g.
    // <p id="thread-id">4902384902384892034829034890238904823908</p>
    // how do i get the file name ? it is ever changing
    $htmlContent = file_get_contents('../index.html');;
    preg_match('/<p id="thread-id">(.*?)</p>/s', $htmlContent, $match);
    $threadId = $match[1];

    $today = date("Y-m-d");
    $time = date("H:i:s");
    $topic = mysqli_real_escape_string($conn, $_POST['topic']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);


  // access data
  $host = "";
  $dbUsername = "";
  $dbPassword = "";
  $dbName = "";

  // connection
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

  if (mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  } else{
    $sql = "INSERT INTO comment VALUES('$threadId' ,'$topic' , '$content', DATE '$today', '$time');";
    mysqli_query($conn, $sql);
  }

  // redirect
  header("Location:../index.html");
?>
