<html>
<head>
    <title>Fees Detail
    </title>
<link rel="stylesheet" href="./../css/table.css">
    
</head>
<body>
    


<h1>Student Fees Detail</span></h1>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "kungfumaster");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "select s.ST_NAME,f.ST_ID,f.PURPOSE,f.DATE,p.PA_TYPE from kungfumaster.student s
inner join kungfumaster.fees f on s.ST_ID = f.ST_ID
INNER JOIN kungfumaster.payment_master p on f.PA_TYPE = p.PA_ID"; 
  
if($result = mysqli_query($link, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {
        echo "<table class=responstable>";
            echo "<tr>";
            
                echo "<th> Student Id</th>";
                echo "<th> Student Name</th>";
                echo "<th>Date</th>";
                echo "<th>Payment Type</th>";
                echo "<th>Purpose</th>";
             
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['ST_ID'] . "</td>";
                echo "<td>" . $row['ST_NAME'] . "</td>";
                echo "<td>" . $row['DATE'] . "</td>";
               echo "<td>" . $row['PA_TYPE'] . "</td>";
                echo "<td>" . $row['PURPOSE'] . "</td>";
                
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else
    {
        echo "No records matching your query were found.";
    }
} else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
</body>
</html>
