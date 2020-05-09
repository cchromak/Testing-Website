<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="styleIndex.css">
  <title>Register</title>
</head>

<body>
  <div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="p-4" style="background-color: aliceblue">

        <h4 class="text-black"><a href="index.php" class="no-underline">Log in</a></h4>
        <h4 class="text-black"><a href="register.html" class="no-underline">Register</a></h4>
        <h4 class="text-black"><a href="default.asp" class="no-underline">About Us</a></h4>
        <h4 class="text-black"><a href="default.asp" class="no-underline">Contact Us</a></h4>
        <h4 class="text-black"><a href="default.asp" class="no-underline">Help</a></h4>

      </div>
    </div>
    <nav class="navbar navbar-light" style="background-color: aliceblue">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
        aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
  </div>
  <div class="container">
    <h1 index="greeting" class="display-1">Let's sign you up!</h1>
  </div>

  <form action="registration.php" method="post">
    <div class="form-group">
      <input type="userName" class="form-control" id="userName" name="userName" placeholder="Enter Prefered Username" onkeyup="checkFields()">
    </div>
    <div class="form-group">
      <input type="firstName" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" onkeyup="checkFields()">
    </div>
    <div class="form-group">
      <input type="lastName" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" onkeyup="checkFields()">
    </div>
    <div class="form-group">
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email" onkeyup="checkFields()">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" onkeyup="checkFields()">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="conPassword" name="conPassword" placeholder="Confirm Password" onkeyup="checkFields()">
    </div>
    <div class="container">
        <button type="submit" id="submitS" name="submitS" disabled>Student<span> </span></button>
        <button type="submit" id="submitP" name="submitP" disabled>Professor<span> </span></button>
    </div>
  </form>
  </div>

  <script src="verify.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>

</html>