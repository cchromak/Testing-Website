<?php
$servername = "mars.cs.qc.cuny.edu";
$username = "chch3299";
$password = "23703299";
$db = "chch3299";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$login = $_POST['login'];
$pwd = $_POST['password'];

echo "Connected successfully";

mysqli_close($db);

?>



<?php

//Login users
$db = mysqli_connect('mars.cs.qc.cuny.edu', 'chch3299', '23703299', 'chch3299') or die("could not connect to database");
$login = $_POST['login'];
$password = $_POST['password'];

if (isset($_POST['login'])) {
    $errors = array();

    if (empty($login)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
      
        $query = "Select * from appuser where login = '$login' AND pwd = '$password' ";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results)) {
            $_SESSION['login'] = $login;
            $_SESSION['success'] = "Logged in Successfully";

            echo "You are now logged in. Thank you :)";
        } else {
            array_push($errors, "Wrong Username/Password combination. Please try again.");
        }
    }
mysqli_close($db);
 }

 else

 {
session_start() ;


$errors = array() ;

//register users

$userName = $_POST['userName'];
$firstName = $_POST['firstName'] ;
$lastName = $_POST['lastName'];
$conPassword = $_POST['conPassword'] ;
$email = $_POST['email'];
$psswd = $_POST['password'];

//form validation

if( empty($firstName) )
{
    array_push( $errors , "Name is required") ;
} 

if( empty($email) )
{
    array_push($errors , "email is required") ;
} 

if( empty($password))
{
    array_push($errors , "Password is required") ;
} 

if( $psswd != $conPassword )
{
    array_push($errors , "Password do not match" ) ;
}

//check database for existing user with same username
$user_check_query = "Select * from appuser where email = '$email' LIMIT 1" ;

$results = mysqli_query( $db , $user_check_query ) ;
$user = mysqli_fetch_assoc($results) ;


if($user)
{
    if($user["email"] === $email)
    {
        array_push($errors , "This email is already registered" ) ;
    }
}

//Register user if no errors

if( count($errors) == 0 )
{
   
    $query = "Insert into appuser (login , pwd , first_name, last_name, email ) values ( '$userName' , '$password' , '$firstName', '$lastName', '$email' )" ;
    
    mysqli_query($db , $query ) ;

    $_SESSION['userName'] = $userName ;
    $_SESSION['success'] = "You are now signed Up" ;

    header( 'location: index.php' ) ;
    mysqli_close($db);
}
 
}

?>
<?php if (is_countable($errors) && count($errors) > 0) : ?>
    <div>
    <?php foreach($errors as $error) : ?>
    <p><?php echo $error ?></p>
    <?php endforeach ?>
    <!--redirect to index.php after 2 seconds-->
    <?php header("Refresh:2; url= index.php"); ?>
    </div>
    
    <?php endif ?>
     