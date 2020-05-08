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
      <h4 class="text-black"><a href="default.asp">Site Map</a></h4>
      <h4 class="text-black"><a href="default.asp">About Us</a></h4>
      <h4 class="text-black"><a href="default.asp">Contact Us</a></h4>
      <h4 class="text-black"><a href="default.asp">Help</a></h4>
    </div>
  </div>
  <nav class="navbar navbar-light" style="background-color: aliceblue">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>


    <div class="container">
       <h1 class="display-1">Welcome to <b>EpicsauceTM</b> Testing Inc.</h1>
       <h3>Where the only thing that is taken seriously is testing, seriously.</h3>
    </div>

    <div>
    <form action="connection.php" method="post">
        <div class="form-group">
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
        </div>
      </form>
    </div>

    <div class="container">
    <form action= "registration.php" method = "POST" id="smaller">
        <button onclick="ValidateEmail(); /*CheckPasswordStudent()*/">Student <form action="registration.php" method="post"></button>
        <button onclick="ValidateEmail(); /*CheckPasswordProf()*/">Professor <form action="registration.php" method="post"></button>
    
    </div>
    <div class="container" style="padding: 15px;"> 
      <a href="./register.html">Register Here</a>
    </div>
    <script src="verify.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>