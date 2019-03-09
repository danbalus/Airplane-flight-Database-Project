
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="colocviu";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    echo "<h1>Connection failed</h1>";
    die("Connection failed: " . $conn->connect_error);
}
echo "<h1>Connected successfully</h1>";


?>


<html>
<head>
    <style>
        table, th,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        th,td{
            text-align: center;
        }
    </style>
</head>

<body>

<h1> Se gasesc numerele zborurilor pt aparatele de zbor</h1>

<form action="Exercitiul3b.php" method="GET">

    <label>Aparat zbor:</label> <input type="text" name="aparat_zbor" placeholder="Type a value" /></label><br>
    <input  type="submit"  ><br>



</form>
<?php
if(isset($_GET['aparat_zbor']))
{
    $aparat_zbor = $_GET['aparat_zbor'];
    $query="SELECT nrzbor, aparat_zbor
            FROM Zboruri
            WHERE aparat_zbor LIKE '$aparat_zbor%' ORDER BY aparat_zbor";
    $search_result = filterTable($query);
}
else{$query="Select * from Zboruri";
    $search_result = filterTable($query);}


function filterTable($query)
{


    $conn =mysqli_connect('localhost', 'root', '', 'colocviu');
    $filter_Result = mysqli_query($conn, $query) or die('error');
    return $filter_Result;
}


echo "<table style='width:100%'>";
echo "<tr>
        <th>nrzbor</th>
         <th>aparat_zbor</th>
    </tr>";

while ($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)) {

    echo "<tr>
        <td>";
    echo $row['nrzbor'];
    echo "</td>";

    echo "<td>";
    echo $row['aparat_zbor'];
    echo "</td>
    </tr>";
}


echo "</table>";

?>
<h2><form action="Meniu.html" class="button">
        <input type="submit" value="Inapoi la meniu">
    </form></h2>
</body>
</html>







