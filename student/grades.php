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
  <title>Teacher's Lounge</title>
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
  <div class="container" style="background-color: aliceblue">
    <h1 index="greeting" class="display-1 h1">Grading Notebook</h1>
  </div>
  <table class="table" style="background-color: aliceblue"> 		
    <thead class="thead-dark" style="background-color: aliceblue">
      <tr>
        <th scope="col">Assignment</th>
        <th scope="col">Points Earned</th>
        <th scope="col">Points Possible</th>
        <th scope="col">Grade</th>
      </tr> 
    </thead>
    <tbody style="background-color: aliceblue"> 
      <?php 
        $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
        $sql = sprintf("SELECT user_id FROM appuser where login='%s'", $_SESSION['username']);
        $result = mysqli_query($db, $sql);
        $user = $result->fetch_row();
        $user = $user[0];
        $sql = "SELECT * FROM questionset";
        $results = mysqli_query($db, $sql);
        while($row = $results->fetch_row()){
          $sql = sprintf("SELECT sum(points) FROM questionset_question WHERE questionset_id=%d", $row[0]);
          $pTotal = mysqli_query($db, $sql);
          $totalRow = $pTotal->fetch_row();
          $total = $totalRow[0]; //total number of points possible
          $total = round($total, 1); //*************************************************************************
          $sql = sprintf("SELECT * FROM student_answers WHERE student_id=%d and questionset_id=%d", $user, $row[0]);
          if(mysqli_query($db, $sql)->num_rows === 0){
            $earned = "N/A";
            $grade = "Not Started";
          }
          else{
            $sAnswerResult = mysqli_query($db, $sql);
            $earned = 0;
            while($sAnsRow = $sAnswerResult->fetch_row()){
              $sAns = $sAnsRow[3]; //student asnwer
              $sql = sprintf("SELECT * FROM question WHERE question_id=%d", $sAnsRow[2]);
              $check = mysqli_query($db, $sql);
              $ans = $check->fetch_row();
              $checkAns = $ans[4]; //get accepted answer
              if(strcasecmp($sAns, $checkAns) == 0){
                $sql = sprintf("SELECT points FROM questionset_question WHERE questionset_id=%d and question_id=%d", $sAnsRow[1], $sAnsRow[2]);
                $p = mysqli_query($db, $sql);
                $pRow = $p->fetch_row();
                $earned += $pRow[0]; //point values earned
              }
            }
            $grade = $earned / $total;
            $grade = round($grade * 100, 1) . "%";
          }
          echo sprintf("<tr>
          <td> %s </td>  
          <td> %s </td>
          <td> %s </td>
          <td>%s</td>
          </tr>", $row[1], $earned, $total, $grade); //Assignment name taken here from row, and total points possible put into table
        }
      ?>
    </tbody>
     
  </table> 
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>