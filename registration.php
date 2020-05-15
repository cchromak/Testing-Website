<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="styleIndex.css">
  <title>Register</title>
</head>

<body>
  <?php
    //connect to the database
    $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");

    //Get the username, first name, last name, email, password, and account type associated with the account being created
    $userName = $_POST['userName'];
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(isset($_POST['submitS'])){                 //if the user pushed the student button with name submitS
      $user_type = 'S';
    }
    else{                                         //only other option would have been to push the professor button with name submitP
      $user_type = 'P';
    }

    //Initialize an array to hold errors
    $errors = array();

    //check database for existing user with same username
    $user_check_query = "SELECT * FROM appuser WHERE login = '$userName' LIMIT 1";
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);
    if ($user) {
      if ($user["login"] === $userName) {
        array_push($errors, "This username is already taken");
        Header("Location: register.php?error=username");
        die();
      }
    }

    //check database for existing email and accountType combination
    $check_email_usertype = "SELECT email, user_type FROM appuser where email = '$email'";
    $results = mysqli_query($db, $check_email_usertype);
    while ($row = $results->fetch_row()){
      if($row[1] == $user_type){
        array_push($errors, "This email is already associated with this type of account");
        Header("Location: register.php?error=emailUser");
        die();
      }
    }

    //if we have no errors we are able to register the user
    if (count($errors) == 0) {
      $sql = "INSERT INTO cake2827.appuser (login, pwd, first_name, last_name, email, user_type) VALUES('$userName', '$password', '$first', '$last', '$email', '$user_type')";
      if($db->query($sql) === FALSE){
        trigger_error(mysqli_error($db));
        echo("Error Description: " . $db->error);
      }
      echo '<div class="container">
              <h1 index="greeting" class="display-1">You are now signed up!</h1>
            </div>';
      $_SESSION['UserName'] = $name;                  //look into using session to keep information on user
      $_SESSION['success'] = "You are now signed Up";
      mysqli_close($db);                             //close the database after inserting
      Header("Refresh:5; url= index.php");           //********************make the page go to a success page then redirect to index.php
      die();
    }

    //add error handling if errors exist
    $db->close();
  ?>

  <!-- Javascript -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>


<!--Not sure what the part below here is for possibly error handling -->

<?php if (is_countable($errors) && count($errors) > 0) : ?>
    <div>
    <?php foreach ($errors as $error) : ?>
    <p><?php echo $error ?></p>
    <?php endforeach ?>
    <!--redirect to index.php after 2 seconds-->
<?php //header("Refresh:2; url= index.php"); ?>
</div>

<?php endif ?>
