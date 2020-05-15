<?php
  //Connect to database
  $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");

  //get username and password submited to login
  $userName = $_POST['userName'];
  $password = $_POST['password'];

  //find user associated with the given userName
  $user_check_query = "SELECT * FROM appuser WHERE login = '$userName' LIMIT 1";
  $results = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($results);

  if (!$user) {                               //if the query did not return a result, the user doesn't exist
    mysqli_close($db);                        //close the database
    Header("Location: index.php?error=1");    //redirect to home page with an error value of 1 so that the page knows which error to display
    die();                                    //prevents further scripts from running
  }

  //At this point a user with the username submitted has been found in the database

  if($user["pwd"] != $password){              //if the password provided doesn't match what is in the database
    mysqli_close($db);                        //close the database
    Header("Location: index.php?error=2");    //redirect to home page with an error value of 2 so the page knows which error to display
    die();                                    //prevents further scripts from running
  }


  //*****I have an idea here but I'm not sure if it will work, in order to make sure the pages populate correctly we're gonna*****
  //*****have to pass the username so that we can use it to display the correct information*****
  //if the username and password match, we have to get the account_type
  if($user["user_type"] === "S"){
    mysqli_close($db);
    Header("Location: ./student/student.html");       //redirect to student.html
  }
  else{
    mysqli_close($db);                                //close the database
    Header("Location: ./professor/professor.html");   //redirect to professor.html
  }
  mysqli_close($db);                                  //in case anything happens and we don't close the database close it here
?>