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

  <div class="container">
    <h1 class="display-1">Professor Dashboard</h1>
  </div>
  <div class ="container">
	  <div class="alert alert-primary alert-dismissible fade show" role="alert">
	  <strong>Hint:</strong> As a professor, make sure to always log out. We wouldn't want a student logging in. :) 
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	
	  <div class="container mt-4">
    <div class="row d-flex justify-content-center">
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Create Questions</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Ask anything!</h6>
                    <p class="card-text">Assign your students questions by clicking the link below.</p><br>
                    <a href="https://venus.cs.qc.cuny.edu/~cake2827/epic/professor/makeQuestions.php" class="card-link">Create Questions Page</a>
                </div>
            </div>
        </div>
        <!--
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Grades</h5>
                    <h6 class="card-subtitle mb-2 text-muted">The grading notebook</h6>
                    <p class="card-text">The professor can grade assignments from their virtual notebook.</p>
                    <a href="https://venus.cs.qc.cuny.edu/~cake2827/epic/professor/grades.php" class="card-link">Grades Page</a>
                </div>
            </div>
        </div>
        -->
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Assignments</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Create assignments</h6>
                    <p class="card-text">The professor can also create and assign assingments to their students.</p>
                    <a href="https://venus.cs.qc.cuny.edu/~cake2827/epic/professor/assignments.php" class="card-link">Create Assignment</a>
                </div>
            </div>
        </div>
    </div>
</div>
	
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>