<html>
 <head>
  <title>SQL To JSON Test</title>
 </head>
 <body>
<?php
    $host = "db";
    $user = "root";
    $pass = "root";
    $database = "laravel";


$conn = new mysqli($host, $user, $pass, $database);
 
// check connection
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}
     
     $sql="SELECT firstname, lastname, dob FROM users";
 
$rs=$conn->query($sql);
 
if($rs === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
} else {
  $rows_returned = $rs->num_rows;
}

  

    echo "<table border='0'>
        <tr>
            <th>name</th>
            <th>surname</th>
            <th>dob</th>
        </tr>";
    $rs->data_seek(0);
        while($row = $rs->fetch_assoc())
        {
           
            echo "<tr><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['dob']."</td></tr>";
        }
        echo "</table>";
    
    
        $conn->close();
        ?>