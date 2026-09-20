<?php
// Connexion à la base
require 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Participer à une action</title>
    <link rel="stylesheet" href="mesStyles1.css">
</head>
<body>

<h2 style="text-align:center; color:#1E3A5F;">Participer à une action</h2>

<form action="valider_participation.php" method="post">

    <fieldset>
        <legend>Participation</legend>

        <label for="mail">Adresse électronique</label>
        <input type="email" id="mail" name="mail" required>

        <label for="action">Choisir une action</label>
        <select id="action" name="idAction" required>
            <option value="">-- Choisir --</option>
            <?php
            $req = "SELECT idAction, titreAction, dateAction FROM action";
            $res = mysqli_query($con, $req);

            while ($row = mysqli_fetch_array($res)) {
                echo "<option value='".$row['idAction']."'>";
                echo $row['titreAction']." - ".$row['dateAction'];
                echo "</option>";
            }
            ?>
        </select>

    </fieldset>

    <div style="text-align:center;">
        <input type="submit" value="Participer">
        <input type="reset" value="Annuler">
    </div>

</form>

</body>
</html>
