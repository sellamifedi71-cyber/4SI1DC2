<?php
declare(strict_types=1);
require __DIR__ . '/config.php';
$result = $con->query('SELECT idAction, titreAction, dateAction, lieu FROM action WHERE dateAction >= CURDATE() ORDER BY dateAction, idAction');
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Participer — EcoJeunes</title><link rel="stylesheet" href="mesStyles1.css"></head><body><main class="container"><p><a href="index.html">← Accueil</a></p><h1>Participer à une action</h1>
<?php if ($result->num_rows === 0): ?><p>Aucune action à venir pour le moment.</p><?php else: ?><form action="valider_participation.php" method="post"><fieldset><legend>Votre participation</legend><label for="mail">Adresse électronique du membre</label><input type="email" id="mail" name="mail" maxlength="100" required><label for="action">Choisir une action</label><select id="action" name="idAction" required><option value="">— Choisir —</option><?php while ($row = $result->fetch_assoc()): ?><option value="<?= (int)$row['idAction'] ?>"><?= h($row['titreAction']) ?> — <?= h($row['dateAction']) ?> — <?= h($row['lieu']) ?></option><?php endwhile; ?></select></fieldset><div class="actions"><button type="submit">Confirmer ma participation</button></div></form><?php endif; ?></main></body></html>
