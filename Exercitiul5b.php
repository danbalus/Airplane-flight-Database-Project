
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

<h1> Se gasesc cupoanele care au aceasi clasa cu clasa de pe bilet</h1>

<form action="Exercitiul5b.php" method="GET">

    <label>Cupoane clasa:</label> <input type="text" name="clasa" placeholder="Type a value" /></label><br>
    <input  type="submit"  ><br>



</form>
<?php
if(isset($_GET['clasa']))
{
    $clasa = $_GET['clasa'];
    $query="SELECT Bilete.nrbilet, Bilete.clasa as bclasa, Cupoane.clasa as cclasa
            FROM Bilete
            JOIN Cupoane ON Bilete.nrbilet = Cupoane.nrbilet
            WHERE Bilete.nrbilet IN( SELECT nrbilet FROM Cupoane WHERE (Bilete.clasa LIKE '$clasa' '%' AND Cupoane.clasa LIKE '$clasa'))";
    $search_result = filterTable($query);
}
else{$query="Select nrbilet, bclasa, cclasa from Cupoane JOIN Cupoane ON Bilete.nrbilet = Cupoane.nrbilet";
    $search_result = filterTable($query);}


function filterTable($query)
{


    $conn =mysqli_connect('localhost', 'root', '', 'colocviu');
    $filter_Result = mysqli_query($conn, $query) or die('error');
    return $filter_Result;
}


echo "<table style='width:100%'>";
echo "<tr>
        <th>nrbilet</th>
         <th>clasa cupoane</th>
         <th>clasa bilet</th>
    </tr>";

while ($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)) {

    echo "<tr>
        <td>";
    echo $row['nrbilet'];
    echo "</td>";

    echo
    "<td>";
    echo $row['cclasa'];
    echo "</td>";

    echo "<td>";
    echo $row['bclasa'];
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







