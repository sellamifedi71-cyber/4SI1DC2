<?php
declare(strict_types=1);
require __DIR__ . '/config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: participer.php'); exit; }
$mail = strtolower(trim($_POST['mail'] ?? ''));
$idAction = filter_input(INPUT_POST, 'idAction', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || !$idAction) { http_response_code(422); exit('Adresse électronique ou action invalide.'); }

$memberStmt = $con->prepare('SELECT nom, lycee FROM membre WHERE mail = ?');
$memberStmt->bind_param('s', $mail); $memberStmt->execute(); $member = $memberStmt->get_result()->fetch_assoc();
if (!$member) { http_response_code(404); exit('Ce membre n’existe pas encore. Proposez une action pour créer votre fiche membre, ou contactez l’association.'); }
$actionStmt = $con->prepare('SELECT titreAction, dateAction, lieu FROM action WHERE idAction = ? AND dateAction >= CURDATE()');
$actionStmt->bind_param('i', $idAction); $actionStmt->execute(); $action = $actionStmt->get_result()->fetch_assoc();
if (!$action) { http_response_code(404); exit('Action introuvable ou déjà passée.'); }

try {
    $insert = $con->prepare('INSERT INTO participation (mail, idAction, datePart) VALUES (?, ?, CURDATE())');
    $insert->bind_param('si', $mail, $idAction); $insert->execute();
} catch (mysqli_sql_exception $exception) {
    if ((int)$exception->getCode() === 1062) { http_response_code(409); exit('Vous êtes déjà inscrit à cette action.'); }
    throw $exception;
}
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Participation confirmée</title><link rel="stylesheet" href="mesStyles1.css"></head><body><main class="container"><p class="success">Votre participation est confirmée.</p><h2>Récapitulatif</h2><p><strong>Membre :</strong> <?= h($member['nom'] ?? '') ?> — <?= h($member['lycee'] ?? '') ?></p><p><strong>Action :</strong> <?= h($action['titreAction']) ?></p><p><strong>Date :</strong> <?= h($action['dateAction']) ?></p><p><strong>Lieu :</strong> <?= h($action['lieu']) ?></p><p><a href="liste.php">Voir les actions</a> · <a href="index.html">Accueil</a></p></main></body></html>
