<?php
  session_start();
?>

<?php
  if(!isset($_SESSION['username'])){
    Header("Location: ../index.php");
    die();
  }
  else{
    $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
    $user_check_query = sprintf("SELECT user_type FROM appuser WHERE login = '%s'", $_SESSION['username']);
    $results = mysqli_query($db, $user_check_query);
    $type = $results->fetch_row();
    if($type[0] == "S"){
      Header("Location: ../login.php");
      mysqli_close($db);
      die();
    }
    mysqli_close($db);
  }
?>

<?php

  //$_GET['set'] is the questionset_id
  $index = 1;
  //get max value of question_id
  $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
  $sql = sprintf("SELECT max(question_id) FROM question");
  $result = mysqli_query($db, $sql);
  $max = $result->fetch_row();
  while($index <= (int)$max[0]){
    $var = sprintf('question%s', $index);
    if($_POST[$var]){
      $question = "question" . $index; //working
      $points = "points" . $index; //working
      $sql = sprintf("INSERT INTO questionset_question (questionset_id, question_id, points) VALUES (%d,%d,%f)", $_GET['set'], $_POST[$question], $_POST[$points]);
      mysqli_query($db, $sql);
    }
    $index++;
  }
  Header(sprintf("Location: addQ.php?set=%s", $_GET['set']));
  //add error handling if errors exist
  $db->close();
?>