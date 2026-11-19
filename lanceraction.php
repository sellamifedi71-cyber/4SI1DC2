<?php
declare(strict_types=1);
require __DIR__ . '/config.php';
$today = date('Y-m-d');
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Proposer une action — EcoJeunes</title><link rel="stylesheet" href="mesStyles1.css"><script src="controle.js" defer></script></head>
<body><main class="container"><p><a href="index.html">← Accueil</a></p><h1>Proposer une action</h1><form action="valideraction.php" method="post" onsubmit="return verifAction()"><input type="hidden" name="csrf" value="<?= h(csrf_token()) ?>"><fieldset><legend>Informations du membre</legend>
<label for="ae">Adresse électronique</label><input type="email" id="ae" name="ae" maxlength="100" required>
<label for="nm">Nom et prénom</label><input type="text" id="nm" name="nm" maxlength="50" minlength="2" required>
<label for="ly">Lycée / établissement</label><input type="text" id="ly" name="ly" maxlength="50" minlength="2" required></fieldset>
<fieldset><legend>Informations sur l'action</legend>
<label for="titre">Titre de l'action</label><input type="text" id="titre" name="titre" maxlength="100" minlength="5" required>
<label for="tya">Type d'action</label><select id="tya" name="tya" required><option value="">Choisir un type</option><option value="N">Nettoyage</option><option value="P">Plantation</option><option value="S">Sensibilisation</option><option value="R">Recyclage</option></select>
<label for="da">Date de l'action</label><input type="date" id="da" name="da" min="<?= htmlspecialchars($today, ENT_QUOTES, 'UTF-8') ?>" required>
<label for="li">Lieu de l'action</label><input type="text" id="li" name="li" maxlength="100" minlength="3" required></fieldset>
<div class="actions"><button type="submit">Publier l'action</button><button type="reset" class="secondary">Réinitialiser</button></div></form></main></body></html>
