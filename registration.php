<?php
$db = mysqli_connect('', '', '', '') or die("could not connect to database");
$userName = $_POST['userName'];
$first = $_POST['firstName'];
$last = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['submitS'])){
    $user_type = 'S';
}
else{
    $user_type = 'P';
}
//check database for existing user with same username
    $user_check_query = "Select * from users where email = '$email' LIMIT 1";

    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);


    if ($user) {
        if ($user["email"] === $email) {
            array_push($errors, "This email is already registered");
        }
    }

    //Register user if no errors

    if (count($errors) == 0) {
        $password = md5($password); //This will encrypt password

        $sql = "INSERT INTO appuser (login, pwd, first_name, last_name, email, user_type) VALUES('$userName', '$password', '$first', '$last', '$email', '$user_type')";
        //echo "Inserted";
        mysqli_query($db, $sql);

        $_SESSION['UserName'] = $name;
        $_SESSION['success'] = "You are now signed Up";

        //header('location: index.php');
        mysqli_close($db);
    }

    $db->close();
?>
<?php if (is_countable($errors) && count($errors) > 0) : ?>
    <div>
    <?php foreach ($errors as $error) : ?>
    <p><?php echo $error ?></p>
    <?php endforeach ?>
    <!--redirect to index.php after 2 seconds-->
<?php //header("Refresh:2; url= index.php"); ?>
</div>

<?php endif ?>