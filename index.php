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
  <!-- This entire div holds the navbar -->
	<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="p-4" style="background-color: aliceblue">
        <h4 class="text-black"><a href="index.php" class="no-underline">Log in</a></h4>
        <h4 class="text-black"><a href="register.php" class="no-underline">Register</a></h4>
        <h4 class="text-black"><a href="aboutus.php" class="no-underline">About Us</a></h4>
        <h4 class="text-black"><a href="contactus.html" class="no-underline">Contact Us</a></h4>
        <h4 class="text-black"><a href="help.html" class="no-underline">Help</a></h4>
      </div>
    </div>
    <nav class="navbar navbar-light" style="background-color: aliceblue">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
  </div>

  <!-- This div holds the text of our home page -->
  <div class="container">
    <h1 class="display-1">Welcome to <b>EpicsauceTM</b> Testing Inc.</h1>
    <h3>Where the only thing that is taken seriously is testing, seriously.</h3>
  </div>

  <!-- This div is empty and doesn't show unless we get an error on a login attempt, in which case we show a message above the input fields -->
  <div class ="container">
    <?php
    if (isset($_GET['error']))
    {
      //username not registered
      if($_GET['error'] == 1){
        $message = "The username you entered is not registered!";
        echo '<span class="error">';
        echo "$message";
        echo '</span>';
      }

      //incorrect password
      else if($_GET['error'] == 2){
        $message = "The password you entered is incorrect!";
        echo '<span class="error">';
        echo "$message";
        echo '</span>';
      }
    }
    ?>
  </div>

  <!-- This div holds the form and submits it to login.php where we check it for invalid username or password -->
  <div>
    <form action="login.php" method="POST">
      <div class="form-group">
        <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter Username" onkeyup="checkLoginFields()">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" onkeyup="checkLoginFields()">
      </div>
      <div class="container">
        <button type="submit" id="loginB" name="loginB" class="grayedOut" disabled>Login!<span> </span></button>
      </div>
    </form>
  </div>

  <!-- Javascript files -->
  <script src="verify.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>