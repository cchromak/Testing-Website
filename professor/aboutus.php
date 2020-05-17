<?php
  session_start();
?>

<?php
  if(!isset($_SESSION['username'])){
    Header("Location: ../aboutus.php");
    die();
  }
  else{
    $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
    $user_check_query = sprintf("SELECT user_type FROM appuser WHERE login = '%s'", $_SESSION['username']);
    $results = mysqli_query($db, $user_check_query);
    $type = $results->fetch_row();
    if($type[0] == "S"){
      Header("Location: ../student/aboutus.php");
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
  <title>Learning Is Fun </title>
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
    <style>
      h2	{text-align: left;}
      p	{text-align: left;}
    </style>
    <h1 class="display-1">About Us</h1>
    <h3>All about who we are!</h3>
    <h2>Kevin Cardenas</h2>
    <p> Splatoon goon </p>
    <h2>Chris Chromak</h2>
    <img src="img/cchromak.png" alt="Chris Chromak" align="left" style="border:2px solid black" class="header-photo img-fluid">
    <p> The daddy </p>
    <h2>Charly Gomez</h2>
    <p> Soup lover </p>
    <h2>Patricio Tapia</h2> 
    <p> Tapz </p>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 
