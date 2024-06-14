<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<?php
include('../includes/db.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$date_naissance = $_POST['date_naissance'];
$sexe = $_POST['sexe'];
$telephone = $_POST['telephone'];
$profession = $_POST['profession'];

//username fixé sur db.php

$sql = "UPDATE users SET nom='$nom', prenom='$prenom', email='$email', date_naissance='$date_naissance', sexe='$sexe', telephone='$telephone', profession='$profession' WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
    // header("Location: ../index.php");
    echo '<script>alert("Modification réussie")</script>';
    echo "Modification réussie";

    // exit();
} else {
    // header("Location: ../index.html?message=Erreur%20lors%20de%20la%20mise%20à%20jour%20du%20profil.");
    echo "Erreur lors de la modification";
    exit();
}



$conn->close();

echo '<a href="../index.php" >Retour</a>'

?>

</body>
</html>


