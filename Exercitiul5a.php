
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

<h1> Se va gasi numele clientilor al caror bilet are VALOAREA cea mai mare intre biletele din clasa Economic</h1>

<form action="Exercitiul5a.php" method="GET">

    <label>Valoare:</label> <input type="integer" name="valoare" placeholder="Type a value" /></label>
    <input  type="submit"  ><br>



</form>
<?php
//$sursa=null;
//$query=null;
if(isset($_GET['valoare']))
{
    $valoare = $_GET['valoare'];
    $query="SELECT nume, clasa, valoare
            FROM Clienti
            JOIN Bilete ON Clienti.idclient = Bilete.idclient
            WHERE clasa = 'Economic'  AND valoare>$valoare";
    $search_result = filterTable($query);
}
else{$query="Select nume, valoare,clasa from Bilete JOIN Clienti ON Clienti.idclient = Bilete.idclient";
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
        <th>nume</th>
         <th>clasa</th>
         <th>valoare</th>
    </tr>";

while ($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)) {

    echo "<tr>
        <td>";
    echo $row['nume'];
    echo "</td>";

    echo
    "<td>";
    echo $row['clasa'];
    echo "</td>";

    echo "<td>";
    echo $row['valoare'];
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







