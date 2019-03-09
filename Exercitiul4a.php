
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

<h1> Se gasesc biletele cumparate de clientii cu statut</h1>

<form action="Exercitiul4a.php" method="GET">

    <label>Statut:</label> <input type="text" name="statut" placeholder="Type a value" /></label><br>
    <input  type="submit"  ><br>



</form>
<?php
if(isset($_GET['statut']))
{
    $statut = $_GET['statut'];
    $query="SELECT *
            FROM Bilete
            JOIN Clienti ON Clienti.idclient=Bilete.idclient
            WHERE statut LIKE '$statut' '%'";
    $search_result = filterTable($query);
}
else{$query="Select * from Bilete JOIN Clienti ON Clienti.idclient=Bilete.idclient ";
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
         <th>clasa</th>
          <th>valoare</th>
           <th>sursa</th>
            <th>destinatia</th>
             <th>idclient</th>
              <th>nume</th>
               <th>statut</th>
 
                 
    </tr>";

while ($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)) {

    echo "<tr>
        <td>";
    echo $row['nrbilet'];
    echo "</td>";

    echo
    "<td>";
    echo $row['clasa'];
    echo "</td>";

    echo
    "<td>";
    echo $row['valoare'];
    echo "</td>";

    echo
    "<td>";
    echo $row['sursa'];
    echo "</td>";

    echo
    "<td>";
    echo $row['destinatia'];
    echo "</td>";

    echo
    "<td>";
    echo $row['idclient'];
    echo "</td>";

    echo
    "<td>";
    echo $row['nume'];
    echo "</td>";


    echo "<td>";
    echo $row['statut'];
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







