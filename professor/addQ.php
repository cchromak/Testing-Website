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


  if (!isset($_GET['set']))
  {
    //username not registered
    Header("Location: index.php");
    die();
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
        <!--<h4 class="text-black"><a href="grades.php" class="no-underline">Grades</a></h4>-->
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

  <?php
  $qsetID = $_GET['set'];

  $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
  $sql = "SELECT title FROM questionset WHERE questionset_id = '$qsetID' LIMIT 1";
  $results = mysqli_query($db, $sql);
  $row = $results->fetch_row();

  echo '<div class="container">';
  echo sprintf("<h1 class='display-1'>%s</h1>", $row[0]);
  echo "</div>";
  mysqli_close($db);

  ?>
  <div class="container">
    <div>Existing Questions: <br> <br> </div>
    <?php
      $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
      $sql = sprintf("SELECT * FROM questionset_question where questionset_id = %s", $_GET['set']);
      $qresults = mysqli_query($db, $sql);
      while($qrow = $qresults->fetch_row()){
        $sql = sprintf("SELECT * FROM question WHERE question_id = %s", $qrow[1]);
        $results = mysqli_query($db, $sql);
        while($row = $results->fetch_row()){
          if($row[2] == "MC"){
            $type_word = "Multiple Choice";
            $questionstart = $row[3];
            if(strpos($questionstart, "<d>")){
              $question = substr($questionstart, 0, strpos($questionstart, '<a>')) . "<br>a) " . substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3) . "<br> b) " . substr($questionstart, strpos($questionstart, "<b>") + 3, strpos($questionstart, "<c>") - strpos($questionstart, "<b>") - 3) . "<br> c) " . substr($questionstart, strpos($questionstart, "<c>") + 3, strpos($questionstart, "<d>") - strpos($questionstart, "<c>") - 3) . "<br> d) " . substr($questionstart, strpos($questionstart, "<d>") + 3, strlen($questionstart) - strpos($questionstart, "<a>") - 3);
            }
            else if(strpos($questionstart, "<c>")){
              $question = substr($questionstart, 0, strpos($questionstart, '<a>')) . "<br>a) " . substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3) . "<br> b) " . substr($questionstart, strpos($questionstart, "<b>") + 3, strpos($questionstart, "<c>") - strpos($questionstart, "<b>") - 3) . "<br> c) " . substr($questionstart, strpos($questionstart, "<c>") + 3, strlen($questionstart) - strpos($questionstart, "<c>") - 3);
            }
            else if(strpos($questionstart, "<b>")){
              $question = substr($questionstart, 0, strpos($questionstart, '<a>')) . "<br>a) " . substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3) . "<br> b) " . substr($questionstart, strpos($questionstart, "<b>") + 3, strlen($questionstart) - strpos($questionstart, "<b>") - 3);
            }
            else{
              $question = substr($questionstart, 0, strpos($questionstart, '<a>')) . "<br>a) " . substr($questionstart, strpos($questionstart, "<a>") + 3, strlen($questionstart) - strpos($questionstart, "<a>") - 3);
            }
          }
          else {
            $type_word = "Word Answer";
            $question = $row[3];
          }
          echo '<div class="container">';
            echo $question;
            echo '<br>';
            echo 'Type: ' . $type_word . '<br>';
            echo 'Point Value: ';
            echo $qrow[2];
          echo "</div>";
          echo "<br> <br>";
        }
      }
      mysqli_close($db);
    ?>
  </div>
  <div class ="container">
    Questions To Add:
    <?php echo sprintf('<form action="addQdb.php?set=%s" method="POST"', $_GET['set']); ?>
      <div>
        <?php
          $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
          $sql = "SELECT * FROM question";
          $results = mysqli_query($db, $sql);
          $index = 1;
          while($row = $results->fetch_row()){
            if($row[2] == "MC"){
              $type_word = "Multiple Choice";
              $questionstart = $row[3];
              if(strpos($questionstart, "<d>")){
                $question = substr($questionstart, 0, strpos($questionstart, '<a>')) . "<br>a) " . substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3) . "<br> b) " . substr($questionstart, strpos($questionstart, "<b>") + 3, strpos($questionstart, "<c>") - strpos($questionstart, "<b>") - 3) . "<br> c) " . substr($questionstart, strpos($questionstart, "<c>") + 3, strpos($questionstart, "<d>") - strpos($questionstart, "<c>") - 3) . "<br> d) " . substr($questionstart, strpos($questionstart, "<d>") + 3, strlen($questionstart) - strpos($questionstart, "<a>") - 3);
              }
              else if(strpos($questionstart, "<c>")){
                $question = substr($questionstart, 0, strpos($questionstart, '<a>')) . "<br>a) " . substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3) . "<br> b) " . substr($questionstart, strpos($questionstart, "<b>") + 3, strpos($questionstart, "<c>") - strpos($questionstart, "<b>") - 3) . "<br> c) " . substr($questionstart, strpos($questionstart, "<c>") + 3, strlen($questionstart) - strpos($questionstart, "<c>") - 3);
              }
              else if(strpos($questionstart, "<b>")){
                $question = substr($questionstart, 0, strpos($questionstart, '<a>')) . "<br>a) " . substr($questionstart, strpos($questionstart, "<a>") + 3, strpos($questionstart, "<b>") - strpos($questionstart, "<a>") - 3) . "<br> b) " . substr($questionstart, strpos($questionstart, "<b>") + 3, strlen($questionstart) - strpos($questionstart, "<b>") - 3);
              }
              else{
                $question = substr($questionstart, 0, strpos($questionstart, '<a>')) . "<br>a) " . substr($questionstart, strpos($questionstart, "<a>") + 3, strlen($questionstart) - strpos($questionstart, "<a>") - 3);
              }
            }
            else {
              $type_word = "Word Answer";
              $question = $row[3];
            }
            echo '<div class="container">';
              echo sprintf('<input type="checkbox" value="%s" name="question%s">', $row[0], $index);
              echo $question;
              echo '<br>';
              echo 'Type: ' . $type_word . '<br>';
              echo '<label for="points">Point Value</label>';
              echo sprintf('<input name="points%s" type="number" min="0.1" step="0.1" value="1";>', $index++);
            echo "</div>";
            echo "<br> <br>";
          }
          mysqli_close($db);
        ?>
        <button type="submit"> Submit </button> <br> <br>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>