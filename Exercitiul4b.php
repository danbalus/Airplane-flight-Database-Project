
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

<h1> Se vor afisa perechile de zbor</h1>

<form action="Exercitiul4b.php" method="GET">

    <label>Zbor 1:</label> <input type="text" name="Zboruri_1" placeholder="Type a value" /></label><br>
    <label>Zbor 2:</label> <input type="text" name="Zboruri_2" placeholder="Type a value" /></label>
    <input  type="submit"  ><br>



</form>
<?php
//$sursa=null;
//$query=null;
if(isset($_GET['Zboruri_1']) and isset($_GET["Zboruri_2"]))
{
    $Zboruri_1 = $_GET['Zboruri_1'];
    $Zboruri_2 = $_GET['Zboruri_2'];
    $query="SELECT Zboruri_1.nrzbor as nrzbor1, Zboruri_2.nrzbor as nrzbor2
            FROM Zboruri Zboruri_1 JOIN Zboruri Zboruri_2
            ON(Zboruri_1.nrzbor < Zboruri_2.nrzbor)
            WHERE Zboruri_1.de_la LIKE '$Zboruri_1' '%'AND
            Zboruri_1.la LIKE '$Zboruri_2' '%' AND
            Zboruri_2.de_la LIKE '$Zboruri_2' '%' AND
            Zboruri_2.la LIKE '$Zboruri_1' '%'";
    $search_result = filterTable($query);
}
else{$query="Select * FROM Zboruri Zboruri_1 JOIN Zboruri Zboruri_2
ON(Zboruri_1.nrzbor < Zboruri_2.nrzbor)";
    $search_result = filterTable($query);}

//$sursa=null;

function filterTable($query)
{


    $conn =mysqli_connect('localhost', 'root', '', 'colocviu');
    $filter_Result = mysqli_query($conn, $query) or die('error');
    return $filter_Result;
}


echo "<table style='width:100%'>";
echo "<tr>
        <th>nrzbor1</th>
         <th>nrzbor2</th>
    </tr>";

while ($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)) {

    echo "<tr>
        <td>";
    echo $row['nrzbor1'];
    echo "</td>";




    echo "<td>";
    echo $row['nrzbor2'];
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







