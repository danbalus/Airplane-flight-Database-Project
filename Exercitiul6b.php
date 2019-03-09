<!DOCTYPE html>
<html>
<head>
    <title>3</title>
    <link rel=stylesheet type="text/css" href="index.css">

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




$sql = "SELECT count(nrbilet) Bilete_vandute, nume
FROM Clienti 
JOIN Bilete ON Clienti.idclient = Bilete.idclient 
GROUP BY Clienti.nume, Clienti.idclient
ORDER BY Bilete_vandute DESC";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "Nume persoana: " . $row["nume"]. " - Numar bilete: " . $row["Bilete_vandute"] ." " . "<br>";
    }
}
$conn->close();

?>
    <h2><form action="Meniu.html" class="button">
            <input type="submit" value="Inapoi la meniu">
        </form></h2>
