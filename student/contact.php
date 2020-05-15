<?php

  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mialTo = "cchromak@gmial.com";
    $headers = "From: ".$email;
    $txt = "You have received an Email from ".$name;".\n\n".$message;


    mail($mialTo, $subject, $txt, $headers);
    header("Location: index.php?mailsend");

  }

?>