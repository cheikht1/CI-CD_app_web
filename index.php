<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" href="script.js" defer></script> -->

</head>
<body>
    <!-- <div class="container"> -->
    <header>
        <h1>Mini formulaire simple (Focus sur cheikh le devops)</h1>
    </header>

        <h1>Modifier mon Profil</h1>
        <?php
        include('includes/db.php');

        // Récupérer les informations de l'utilisateur depuis la base de données
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Afficher le formulaire de modification avec les informations de l'utilisateur
            while($row = $result->fetch_assoc()) {
        ?>
       
        <section class="formulaire">
        <h2>Informations Personnelles</h2>
        <form id="profileForm" action="pages/update_profile.php" method="post">
            <div class="champ">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" value="<?php echo $row["nom"]; ?>" required>

            </div>
            <div class="champ">
                <label for="prenom">Prenom:</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $row["prenom"]; ?>" required>
            </div>
            <div class="champ">
                <label for="email">Email :</label>
                <input type="text" id="email" name="email" value="<?php echo $row["email"]; ?>" required>
            </div>

            <div class="champ">
                <label for="date_naissance">Date de naissance :</label>
                <input type="date" id="date_naissance" name="date_naissance" value="<?php echo $row["date_naissance"]; ?>" required>
            </div>
            <div class="champ">
                <label for="sexe">Sexe:</label>
                <select id="sexe" name="sexe" required>
                    <option value="homme" <?php if($row["sexe"]=="homme") echo "selected"; ?>>Homme</option>
                    <option value="femme" <?php if($row["sexe"]=="femme") echo "selected"; ?>>Femme</option>
                    <!-- <option value="autre" <?php if($row["sexe"]=="autre") echo "selected"; ?>>Autre</option> -->
                </select>
            </div>
            <div class="champ">
                <label for="telephone">Téléphone:</label>
                <input type="text" id="telephone" name="telephone" value="<?php echo $row["telephone"]; ?>" required>
            </div>
             <div class="champ">
                <label for="profession">Profession:</label>
                <input type="text" id="profession" name="profession" value="<?php echo $row["profession"]; ?>" required>
             </div>

            <button type="submit">Enregistrer</button>


        </form>
    </section>




        <?php
            }
        } else {
            echo "0 résultats";
        }
        $conn->close();
        ?>
    <!-- </div> -->
        <section class="infos-contact">
        <h2>Informations de contact</h2>
        <address>
            <p>Adresse : 2ème étage, Salle 1, Angle 3<br>Dakar, Sénégal</p>
            <p>Téléphone : + 221 777654321</p>
            <p>Email : odc.aws.groupe3@gmail.com</p>
            <p>Site web : <a href="index.php">Notre site</a></p>
        </address>
    </section>
    <footer>
        <p>&copy; 2024 Groupe 3 Promo 3 AWS</p>
    </footer>
</body>
</html>
