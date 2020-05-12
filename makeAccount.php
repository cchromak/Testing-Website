<?php
    $userName =$_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = "P";

    $conn =  mysqli_connect('mars.cs.qc.cuny.edu', 'chch3299', '23703299', 'chch3299') or die("could not connect to database");
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(login, pwd, first_name, last_name, email, user_type)
        values(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $userName, $firstName, $lastName, $email, $password, $userType);
        $stmt->execute();
        echo "registration success!";
        $stmt->close();
        $conn->close();
    }

    ?>