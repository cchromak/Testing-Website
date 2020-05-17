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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="styleIndex.css">
  <title>Learning Is Fun</title>
</head>
<body>
	<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="p-4" style="background-color: aliceblue">
        <h4 class="text-black"><a href="professor.php" class="no-underline">Professor Dashboard</a></h4>
        <h4 class="text-black"><a href="makeQuestions.php" class="no-underline">Create Questions</a></h4>
        <h4 class="text-black"><a href="assignments.php" class="no-underline">Assignments</a></h4>
        <h4 class="text-black"><a href="grades.php" class="no-underline">Grades</a></h4>
        <h4 class="text-black"><a href="aboutus.php" class="no-underline">About Us</a></h4>
        <h4 class="text-black"><a href="contactus.php" class="no-underline">Contact Us</a></h4>
        <h4 class="text-black"><a href="help.php" class="no-underline">Help</a></h4>
        <h4 class="text-black"><a href="../logout.php" class="no-underline">Log out</a></h4>
      </div>
    </div>
    <nav class="navbar navbar-light" style="background-color: aliceblue">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
  </div>

  <div class="container">
    <h1 class="display-1">Write your question</h1>
  </div>
  <div>
    <form action="question.php" method="POST" id="form">
      <div class="form-group">
        <input type="title" class="form-control" name="title" placeholder="Enter Question Title" onkeyup="checkFields()">
      </div>
      <input type="radio" id="mc" name="type" value="MC" onclick="checkType()" checked>
      <label for="mc">Multiple choice</label><br>
      <input type="radio" id="wa" name="type" value="WA" onclick="checkType()">
      <label for="wa">Word answer</label><br><br>
      <!-- add 4 text input fields if MC is chosen, with all grayed out until the one before it is filled, then format it to send with <a>, <b>, <c>, then use string delimiter to show them in addQ.php -->
      <textarea rows="4" cols="50" name="question" form="form" placeholder="Enter question here..."></textarea><br><br>
      <div id="mcChoices">
        <div class="form-group">
          <label for="choice1"> Choice 1 </label> <br>
          <input type="text" class="form-control" id="choice1" name="choice1" onkeyup="enableFields()">
        </div>
        <div class="form-group">
          <label for="choice2"> Choice 2 </label> <br>
          <input type="text" class="form-control" id="choice2" name="choice2" onkeyup="enableFields()" disabled>
        </div>
        <div class="form-group">
          <label for="choice3"> Choice 3 </label> <br>
          <input type="text" class="form-control" id="choice3" name="choice3" onkeyup="enableFields()" disabled>
        </div>
        <div class="form-group">
          <label for="choice4"> Choice 4 </label> <br>
          <input type="text" class="form-control" id="choice4" name="choice4" onkeyup="enableFields()" disabled>
        </div> 
      </div>     
      <div class="form-group">
        <br>
        <label for="answer"> Correct Answer: </label> <br>
        <input type="answer" class="form-control" name="answer" placeholder="Enter Answer" onkeyup="checkFields()">
      </div>
      <div class="container">
        <button type="submit" name="create" class="grayedOut btn btn-secondary">Create Question<span> </span></button>
      </div>
    </form>
  </div>
  <script src="questiontype.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>