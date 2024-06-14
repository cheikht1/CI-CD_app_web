<?php
// Informations de connexion à la base de données
$servername = "db";//127.0.0.1
// $username = "nazim";
// $password = "passer";
$username = "root";
$password = "root";
$base = "fil_rouge";

// Création de la connexion
$conn = new mysqli($servername, $username, $password);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//création de la base
$sql_creation_base =" CREATE DATABASE IF NOT EXISTS fil_rouge; ";
if ($conn->query($sql_creation_base) === TRUE) {
    echo "Table créée avec succès";
}


// Sélection de la base de données
$conn->select_db($base);


// Création de la table users si elle n'existe pas
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    date_naissance DATE NOT NULL,
    sexe VARCHAR(10) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    profession VARCHAR(100) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    // echo "Table 'users' créée avec succès ou elle existe déjà";
} else {
    // echo "Erreur lors de la création de la table 'users': " . $conn->error;
}

// Requête SELECT pour vérifier si l'utilisateur existe déjà
//Vu q'il ya 1 seul utilisateur j'ai fixé le username pour la requete au lieu de recuperer l'id etc... (Flemme)
$username = "momo";
$sql_select = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql_select);


if ($result->num_rows > 0) {
    // echo "Un utilisateur avec le nom d'utilisateur '$username' existe déjà.";
} else {
    // Requête INSERT pour créer un nouvel utilisateur
    $nom = "Gueye";
    $prenom = "Mohamed";
    $email = "momo@gmail.com";
    $date_naissance = "2000-01-01";
    $sexe = "homme";
    $telephone = "771234567";
    $profession = "Dev";

    $sql_insert = "INSERT INTO users (username, nom, prenom, email, date_naissance, sexe, telephone, profession) VALUES ('$username', '$nom', '$prenom', '$email', '$date_naissance', '$sexe', '$telephone', '$profession')";

    if ($conn->query($sql_insert) === TRUE) {
        // echo "Nouvel utilisateur créé avec succès";
    } else {
        // echo "Erreur lors de la création de l'utilisateur: " . $conn->error;
    }
}


// $conn->close();
?>

