<?php

//Connect to database
$db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");

$title = $_POST['title'];
$question = $_POST['question'];

if(isset($_POST['mc'])){                 
    $questionType = 'MC';
  }
  else{                                        
    $questionType = 'WA';
  }
$answer = $_POST['answer'];


if (count($errors) == 0) {
    $sql = "INSERT INTO cake2827.question (title, question_type, content, answer) VALUES('$title', '$question_type', '$content', '$answer)";
    if($db->query($sql) === FALSE){
      trigger_error(mysqli_error($db));
      echo("Error Description: " . $db->error);
    }
    echo '<div class="container">
            <h1 index="greeting" class="display-1">You added a question!</h1>
          </div>';
    $_SESSION['UserName'] = $name;                  //look into using session to keep information on user
    $_SESSION['success'] = "You are now signed Up";
    mysqli_close($db);                             //close the database after inserting
    Header("Refresh:5; url= makeQuestions.php");           //********************make the page go to a success page then redirect to index.php
    die();
  }

  //add error handling if errors exist
  $db->close();
?>






?>