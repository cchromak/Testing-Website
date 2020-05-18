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
    if($type[0] == "P"){
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
        <h4 class="text-black"><a href="student.php" class="no-underline">Student Dashboard</a></h4>
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
  <div class="dashboardLabel">
    <span>Here Are the questions for this Assignments</span>
  </div>

  <!-- Insert php where we would get the questions associated with the questionset_id from questionset_questions -->
  <div class="container">
    <form action="submitanswers.php" method="POST" id="answers">
      <?php
        $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
        $sql = sprintf("SELECT * FROM questionset_question where questionset_id = %s", $_GET['set']);
        $qresults = mysqli_query($db, $sql);
        while($qrow = $qresults->fetch_row()){
          $sql = sprintf("SELECT * FROM question WHERE question_id = %s", $qrow[1]);
          $results = mysqli_query($db, $sql);
          while($row = $results->fetch_row()){
            if($row[2] == "MC"){
              $questionstart = $row[3];
              if(strpos($questionstart, "<d>")){
                echo '<div class="container">';
                  echo 'Point Value: ';
                  echo $qrow[2];
                  echo '<br>';
                  echo substr($questionstart, 0, strpos($questionstart, '<a>'));
                  echo '<br>';
                  echo sprintf('<input type="radio" name="%s" value=%s>', $row[0], substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3));
                  echo substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3);
                  echo '<br>';
                  echo sprintf('<input type="radio" name="%s" value=%s>', $row[0], substr($questionstart, strpos($questionstart, "<b>") + 3, strpos($questionstart, "<c>") - strpos($questionstart, "<b>") - 3));
                  echo substr($questionstart, strpos($questionstart, "<b>") + 3, strpos($questionstart, "<c>") - strpos($questionstart, "<b>") - 3);
                  echo '<br>';
                  echo sprintf('<input type="radio" name="%s" value=%s>', $row[0], substr($questionstart, strpos($questionstart, "<c>") + 3, strpos($questionstart, "<d>") - strpos($questionstart, "<c>") - 3));
                  echo substr($questionstart, strpos($questionstart, "<c>") + 3, strpos($questionstart, "<d>") - strpos($questionstart, "<c>") - 3);
                  echo '<br>';
                  echo sprintf('<input type="radio" name="%s" value=%s>', $row[0], substr($questionstart, strpos($questionstart, "<d>") + 3, strlen($questionstart) - strpos($questionstart, "<a>") - 3));
                  echo substr($questionstart, strpos($questionstart, "<d>") + 3, strlen($questionstart) - strpos($questionstart, "<a>") - 3);
                echo "</div>";
                echo "<br> <br>";
              }
              else if(strpos($questionstart, "<c>")){
                echo '<div class="container">';
                  echo 'Point Value: ';
                  echo $qrow[2];
                  echo '<br>';
                  echo substr($questionstart, 0, strpos($questionstart, '<a>'));
                  echo '<br>';
                  echo sprintf('<input type="radio" name="%s" value=%s>', $row[0], substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3));
                  echo substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3);
                  echo '<br>';
                  echo sprintf('<input type="radio" name="%s" value=%s>', $row[0], substr($questionstart, strpos($questionstart, "<b>") + 3, strpos($questionstart, "<c>") - strpos($questionstart, "<b>") - 3));
                  echo substr($questionstart, strpos($questionstart, "<b>") + 3, strpos($questionstart, "<c>") - strpos($questionstart, "<b>") - 3);
                  echo '<br>';
                  echo sprintf('<input type="radio" name="%s" value=%s>', $row[0], substr($questionstart, strpos($questionstart, "<c>") + 3, strlen($questionstart) - strpos($questionstart, "<c>") - 3));
                  echo substr($questionstart, strpos($questionstart, "<c>") + 3, strlen($questionstart) - strpos($questionstart, "<c>") - 3);
                echo "</div>";
                echo "<br> <br>";
              }
              else if(strpos($questionstart, "<b>")){
                echo '<div class="container">';
                  echo 'Point Value: ';
                  echo $qrow[2];
                  echo '<br>';
                  echo substr($questionstart, 0, strpos($questionstart, '<a>'));
                  echo '<br>';
                  echo sprintf('<input type="radio" name="%s" value=%s>', $row[0], substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3));
                  echo substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3);
                  echo '<br>';
                  echo sprintf('<input type="radio" name="%s" value=%s>', $row[0], substr($questionstart, strpos($questionstart, "<b>") + 3, strlen($questionstart) - strpos($questionstart, "<b>") - 3));
                  echo substr($questionstart, strpos($questionstart, "<b>") + 3, strlen($questionstart) - strpos($questionstart, "<b>") - 3);
                echo "</div>";
                echo "<br> <br>";
              }
              else{
                echo '<div class="container">';
                  echo 'Point Value: ';
                  echo $qrow[2];
                  echo '<br>';
                  echo substr($questionstart, 0, strpos($questionstart, '<a>'));
                  echo '<br>';
                  echo sprintf('<input type="radio" name="%s" value=%s>', $row[0], substr($questionstart, strpos($questionstart, "<a>") + 3, strlen($questionstart) - strpos($questionstart, "<a>") - 3));
                  echo substr($questionstart, strpos($questionstart, "<a>") + 3, strlen($questionstart) - strpos($questionstart, "<a>") - 3);
                echo "</div>";
                echo "<br> <br>";
              }
            }
            else {
              $type_word = "Word Answer";
              $question = $row[3];
              echo '<div class="container">';
                echo 'Point Value: ';
                echo $qrow[2];
                echo '<br>';
                echo $question;
                echo sprintf('<textarea rows="4" cols="50" name="%s" form="answers" placeholder="Enter Answer here..."></textarea><br><br>', $row[0]);
                echo '<br> <br>';
              echo "</div>";
            }
          }
        }
        echo '<button type="submit"> Submit </button> <br> <br>';
        mysqli_close($db);
      ?>
    </form>
  </div>

  <div class ="container">
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php
/*      $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");  //select question_sets from database
      $sql = "SELECT * from questionset";
      $results = mysqli_query($db, $sql);
      while($row = $results->fetch_row()){
        //create a div to hold each assignment
        echo '<div class="aList">';
        echo sprintf("<a href=addQ.php?set=%s>", $row[0]);
        echo sprintf("%s </a>", $row[1]);
        echo '</div>';
      }
      mysqli_close($db);
*/
      ?>