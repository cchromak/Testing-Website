<?php
      $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");  //select question_sets from database
      $sql = "SELECT * from questionset";
      $results = mysqli_query($db, $sql);
      while($row = $results->fetch_row()){
        //create a div to hold each assignment
        echo '<div class="aList">';
        echo sprintf("<a href=addQ.php?set=%s>", $row[0]);
        echo sprintf("%s </a>", $row[1]);
        echo '</div>';
      }
      mysqli_close($db);
?>