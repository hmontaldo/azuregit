<!DOCTYPE html>
<html>
<head>
<title>Afficher une table MariaDB</title>
</head>
<body>

<h1>Mon logo</h1>
<img src="logo.jpg" alt="Logo de mon site">

<?php
// Paramètres de connexion
$host = 'hen-bantko.mysql.database.azure.com';
$username = 'henry_admin';
$password = 'Simplon2024@';
$database = 'utilisateur';

// Connecter à la base de données MariaDB
$db = new mysqli($host, $username, $password, $database);

// Vérifier la connexion
if ($db->connect_error) {
    die('Erreur de connexion (' . $db->connect_errno . ') ' . $db->connect_error);
}

// Sélectionner les données de la table
$query = "SELECT Nom, Prénom, Service, Fonction, Login, Mail FROM votre_table";
$result = $db->query($query);

// Vérifier le résultat de la requête
if (!$result) {
    die('Erreur dans la requête (' . $db->errno . ') ' . $db->error);
}

// Afficher les données dans un tableau HTML
echo "<table>";
echo "<tr><th>Nom</th><th>Prénom</th><th>Service</th><th>Fonction</th><th>Login</th><th>Mail</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['Nom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Prénom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Service']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Fonction']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Login']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Mail']) . "</td>";
    echo "</tr>";
}
echo "</table>";

// Fermer la connexion à la base de données
$db->close();
?>

</body>
</html>