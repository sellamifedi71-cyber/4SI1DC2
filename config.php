<?php
declare(strict_types=1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'bdecojeunes';

try {
    $con = new mysqli($host, $user, $password, $database);
    $con->set_charset('utf8mb4');
} catch (mysqli_sql_exception $exception) {
    http_response_code(500);
    exit('Connexion à la base impossible. Vérifiez les paramètres de config.php et la base bdecojeunes.');
}

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
