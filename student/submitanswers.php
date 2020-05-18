<?php
  session_start();
?>

<?php
  if(!isset($_SESSION['username'])){
    Header("Location: ../index.php");
    die();
  }
  else{
    $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
    $user_check_query = sprintf("SELECT user_type FROM appuser WHERE login = '%s'", $_SESSION['username']);
    $results = mysqli_query($db, $user_check_query);
    $type = $results->fetch_row();
    if($type[0] == "P"){
      Header("Location: ../login.php");
      mysqli_close($db);
      die();
    }
    mysqli_close($db);
  }
?>
<?php
$db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
$sql = sprintf("SELECT user_id FROM appuser WHERE login='%s'", $_SESSION['username']);
$result = mysqli_query($db, $sql);
$row = $result->fetch_row();
$user = $row[0];
$questionset = $_GET['set'];
echo $user;
echo $questionset;
$sql = sprintf("SELECT * FROM questionset_question WHERE questionset_id = '%s'", $questionset);
$results = mysqli_query($db, $sql);
while($row = $results->fetch_row()){
  print_r($row);
  $sql = sprintf("INSERT INTO student_answers(student_id, questionset_id, question_id, answer) VALUES (%d, %d, %d, '%s')", $user, $questionset, $row[1], $_POST[$row[1]]);
  echo $sql;
  mysqli_query($db, $sql);
  echo "finished";
}
Header("Location: grades.php");
mysqli_close($db);

?>