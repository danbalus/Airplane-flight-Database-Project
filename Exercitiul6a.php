
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

<h1> Se gasesc, pentru fiecare zbor, numarul de bilete si valoarea totala</h1>





</form>
<?php
$result = mysqli_query($conn, "call procedure1()");


echo "<table style='width:100%'>";
echo "<tr>
        <th>nrbilet</th>
         <th>valoare</th>
         <th>de la</th>
         <th>la</th>
    </tr>";

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    echo "<tr>
        <td>";
    echo $row['nrbilett'];
    echo "</td>";

    echo
    "<td>";
    echo $row['val'];
    echo "</td>";

    echo
    "<td>";
    echo $row['de_la'];
    echo "</td>";

    echo "<td>";
    echo $row['la'];
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







