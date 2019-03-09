
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

<h1> Se vor afisa biletele cu sursa si destinatia dorita</h1>

<form action="Exercitiul3a.php" method="GET">

    <label>Sursa:</label> <input type="text" name="sursa" placeholder="Type a value" /></label><br>
    <label>Destinatia:</label> <input type="text" name="destinatia" placeholder="Type a value" /></label>
    <input  type="submit"  ><br>



</form>
<?php
//$sursa=null;
//$query=null;
if(isset($_GET['sursa']) and isset($_GET["destinatia"]))
{
    $sursa = $_GET['sursa'];
    $destinatia=$_GET['destinatia'];
    $query="SELECT * 
            FROM Bilete
            WHERE CONCAT(sursa)LIKE '%" .$sursa."%' AND CONCAT(destinatia)LIKE '%" .$destinatia."%'";
    $search_result = filterTable($query);
}
else{$query="Select * from Bilete";
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
        <th>nrbilet</th>
         <th>sursa</th>
          <th>destinatia</th>
    </tr>";

while ($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)) {

    echo "<tr>
        <td>";
    echo $row['nrbilet'];
    echo "</td>";

    echo
    "<td>";
    echo $row['sursa'];
    echo "</td>";

    echo "<td>";
    echo $row['destinatia'];
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







