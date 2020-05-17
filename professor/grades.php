

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="basicStyle.css">
    <title>Teacher's Lounge</title>
</head>
<body>
    
    <div class="container">
        <h1 index="greeting" class="display-1 h1">Grading Notebook</h1>
        
    </div>

		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">First Name</th>
		      <th scope="col">Last Name</th>
		      <th scope="col">Grades</th>
		    </tr> 
		  </thead>
		  <tbody> 
		     <?php 
		     $db = mysqli_connect('mars.cs.qc.cuny.edu', 'cake2827', '23682827', 'cake2827') or die("could not connect to database");
             $sql_grades_receiver = "SELECT grade FROM grades";
            $results = mysqli_query($db, $sql_grades_receiver);
		     while ($row = $results->fetch_row()) { 
                	echo "<tr>
                    <td> id </td>  
                    <td> titty </td>
                    <td> man </td> 
                    <td>" . $row[0] . "</td>
                  </tr>"; 
            }
        ?>
		  </tbody>
		</table>

    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
