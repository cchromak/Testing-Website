<?php
  session_start();
?>

<?php

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

$title = $_POST['title'];
$question = $_POST['question'];
$answer = $_POST['answer'];
$type = $_POST['type'];
if($type == "MC"){
  $choice1 = $_POST['choice1'];
  $choice2 = $_POST['choice2'];
  $choice3 = $_POST['choice3'];
  $choice4 = $_POST['choice4'];
  if($choice4 != ""){
    $question = $question . "<a>" . $choice1 . "<b>" . $choice2 . "<c>" . $choice3 . "<d>" . $choice4;
  }
  else if($choice3 != ""){
    $question = $question . "<a>" . $choice1 . "<b>" . $choice2 . "<c>" . $choice3;
  }
  else if($choice2 != ""){
    $question = $question . "<a>" . $choice1 . "<b>" . $choice2;
  }
  else{
    $question = $question . "<a>" . $choice1;
  }
}

//Connect to database
$db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
$sql = "INSERT INTO cake2827.question (title, question_type, content, answer) VALUES('$title', '$type', '$question', '$answer')";

if($db->query($sql) === FALSE){
  trigger_error(mysqli_error($db));
  echo("Error Description: " . $db->error);
  die();
}

  echo '<div class="container">
          <h1 index="greeting" class="display-1">You added a question!</h1>
        </div>';
  $_SESSION['UserName'] = $name;                  //look into using session to keep information on user
  $_SESSION['success'] = "You are now signed Up";
  mysqli_close($db);                             //close the database after inserting
  Header("Refresh:3; url= makeQuestions.php");           //********************make the page go to a success page then redirect to index.php
  die();

  //add error handling if errors exist
  $db->close();
?>












?>