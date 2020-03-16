<?php
$host = 'localhost';
$db = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
echo "Conected to db" .' '. $pdo->query("show databases like 'netland'")->fetchColumn() . PHP_EOL;
echo "with version" .' '. $pdo->query('select version()')->fetchColumn();
?>

<DOCTYPE html>
<head>
<title>Netfix 2.0</title>
</head>
<body>
</body>
</html>