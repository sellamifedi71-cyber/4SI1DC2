<?php
declare(strict_types=1);
require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: lanceraction.php'); exit; }
verify_csrf();
$mail = strtolower(trim($_POST['ae'] ?? ''));
$name = trim($_POST['nm'] ?? '');
$school = trim($_POST['ly'] ?? '');
$title = trim($_POST['titre'] ?? '');
$type = strtoupper(trim($_POST['tya'] ?? ''));
$date = trim($_POST['da'] ?? '');
$place = trim($_POST['li'] ?? '');
$dateValue = DateTimeImmutable::createFromFormat('!Y-m-d', $date);
$validDate = $dateValue && $dateValue->format('Y-m-d') === $date && $dateValue >= new DateTimeImmutable('today');

if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || strlen($mail) > 100 || mb_strlen($name) < 2 || mb_strlen($name) > 50 || mb_strlen($school) < 2 || mb_strlen($school) > 50 || mb_strlen($title) < 5 || mb_strlen($title) > 100 || !in_array($type, ['N','P','S','R'], true) || !$validDate || mb_strlen($place) < 3 || mb_strlen($place) > 100) {
    http_response_code(422); exit('Certaines informations sont invalides. Vérifiez le formulaire et réessayez.');
}

$con->begin_transaction();
try {
    // Upsert avoids a race when two submissions create the same member simultaneously.
    // Existing member details are preserved; the submitted contact is linked to the new action.
    $member = $con->prepare('INSERT INTO membre (mail, nom, lycee) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE mail = VALUES(mail)');
    $member->bind_param('sss', $mail, $name, $school);
    $member->execute();
    $action = $con->prepare('INSERT INTO action (titreAction, typeAction, dateAction, lieu, mail) VALUES (?, ?, ?, ?, ?)');
    $action->bind_param('sssss', $title, $type, $date, $place, $mail);
    $action->execute();
    $actionId = $con->insert_id;
    $con->commit();
} catch (Throwable $exception) {
    $con->rollback();
    throw $exception;
}
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Action publiée</title><link rel="stylesheet" href="mesStyles1.css"></head><body><main class="container"><p class="success">Votre action a été publiée avec succès.</p><p>Référence : <strong>#<?= (int)$actionId ?></strong></p><p><a href="liste.php">Voir les actions</a> · <a href="lanceraction.php">Proposer une autre action</a> · <a href="index.html">Accueil</a></p></main></body></html>
