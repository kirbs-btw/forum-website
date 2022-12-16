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

  // need a hashing function to generate a id for the thread
  $id = "";


  if (mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  } else{
    $sql = "INSERT INTO thread VALUES('$id' ,'$topic' , '$content', DATE '$today', '$time');";
    mysqli_query($conn, $sql);
  }

  //threadTopic conversion
  $threadTopic = "";

  for ($i=0; $i < len($topic); $i++) {
    if ($topic[i] != " ") {
      $threadTopic = $threadTopic + $topic[i]
    }else {
      $threadTopic = $threadTopic + "_"
    }
  }
  

  // create file
  $file = fopen("../../thread/" . $threadTopic)



  // redirect
  header("Location:../ask.html");
?>
