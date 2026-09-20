<?php
require 'config.php';
$mail = $_POST['mail'];
$idAction = $_POST['idAction'];

/* 1. Vérifier l'existence du membre */
$reqMembre = "SELECT * FROM membre WHERE mail='$mail'";
$resMembre = mysqli_query($con, $reqMembre);

if (mysqli_num_rows($resMembre) == 0) {
    echo "<h3>Ce membre n'existe pas. Veuillez vous inscrire avant de participer.</h3>";
    exit();
}

/* 2. Vérifier la participation */
$reqPart = "SELECT * FROM participation WHERE mail='$mail' AND idAction='$idAction'";
$resPart = mysqli_query($con, $reqPart);

if (mysqli_num_rows($resPart) > 0) {
    echo "<h3>Vous avez déjà participé à cette action.</h3>";
    exit();
}

/* 3. Insérer la participation */
$datePart = date("Y-m-d");
$reqInsert = "INSERT INTO participation VALUES ('$mail', '$idAction', '$datePart')";
mysqli_query($con, $reqInsert);

/* 4. Récupérer infos membre et action */
$membre = mysqli_fetch_array($resMembre);

$reqAction = "SELECT * FROM action WHERE idAction='$idAction'";
$resAction = mysqli_query($con, $reqAction);
$action = mysqli_fetch_array($resAction);

/* 5. Affichage de l'invitation */
echo "<h2>Invitation à participer</h2>";
echo "<p><strong>Membre :</strong> ".$membre['nom']." (".$membre['lycee'].")</p>";
echo "<p><strong>Action :</strong> ".$action['titreAction']."</p>";
echo "<p><strong>Date :</strong> ".$action['dateAction']."</p>";
echo "<p><strong>Lieu :</strong> ".$action['lieu']."</p>";
?>
