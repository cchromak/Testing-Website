<?php
  session_start();
?>

<?php
  if(!isset($_SESSION['username'])){
    Header("Location: ../help.html");
    die();
  }
  else{
    $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
    $user_check_query = sprintf("SELECT user_type FROM appuser WHERE login = '%s'", $_SESSION['username']);
    $results = mysqli_query($db, $user_check_query);
    $type = $results->fetch_row();
    if($type[0] == "S"){
      Header("Location: ../student/help.php");
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
    <h1 index="greeting" class="display-1">How can we help?</h1>
  </div>
  
  <div class="container mt-4">
    <div class="row">
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Registration</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Details on how to register</h6>
                    <p class="card-text">To register, simply click on the link below to get directed here.</p>
                    <a href="#" class="card-link">Registration Page</a>
                </div>
            </div>
        </div>
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Logging In</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Details on how to login</h6>
                    <p class="card-text">The user must first register in order to login. To login, click the link below.</p>
                    <a href="#" class="card-link">Login Page</a>
                </div>
            </div>
        </div>
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Contact Us</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Contacting the Authors</h6>
                    <p class="card-text">If there are additional bugs on the website, you may always contact us so that we can maintain our website.</p>
                    <a href="#" class="card-link">Contact us</a>
                </div>
            </div>
        </div>
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Assignments</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Check your assignments</h6>
                    <p class="card-text">Students can check what assignments they were given in order to find out whats due.</p>
                    <a href="#" class="card-link">Assignments</a>
                </div>
            </div>
        </div>
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Dashboard</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Check your progress!</h6>
                    <p class="card-text">Students and professors will have their own dashboards, respectively, in order to check their progress.</p>
                    <a href="#" class="card-link">Students</a>
                    <a href="#" class="card-link">Professors</a>
                </div>
            </div>
        </div> 
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;"> 
                <div class="card-body">
                    <h5 class="card-title">Grades</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Check (or modify) grades</h6>
                    <p class="card-text">Students and professors will be able to check and modify grades, respectively.</p>
                    <a href="#" class="card-link">Students</a>
                    <a href="#" class="card-link">Professors</a>
                </div>
            </div>
        </div>
    </div>
</div>
  <div class="container">
    <h1 index="ending" class="display-4">Frequently Asked Questions</h1>
    <p class="lead">
  There are two buttons for the Registration page. Which one do I choose?
	</p>
	<p class="text-center">Register accordingly to what you are. If you are a student, then choose student.
	If you aren't a student, choose professor if you're a professor.</p>
	<p class="lead">
  What if I want to check my students grades' as a professor?
  <p class="text-center">Login as a professor, then in the Professor Dashboard, click on the "Grades" card link.</p>
	</p> 
     </div>
</div>
  <div class ="container">
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>