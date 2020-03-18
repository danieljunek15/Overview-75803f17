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

$dataSeries = $pdo->query('SELECT * FROM netland.series')->fetchAll();
$dataFilms = $pdo->query('SELECT * FROM netland.films')->fetchAll();

?>

<DOCTYPE html>
<head>
<title>Netfix 2.0</title>
</head>
<body>

<h1>Welkom bij Netfix de enige echte fix streamer</h1>
<h2>Series</h2>
<table>
    <tr>
        <th>Titel</th>
        <th>Rating</th>
    </tr>
    <tr>
        <td>  
            <?php foreach ($dataSeries as $row){
                echo $row['title'] . "<br />\n";
            } ?>
        </td>
        <td>
            <?php foreach ($dataSeries as $row){
                echo $row['rating'] . "<br />\n";
            } ?>
        </td>
    </tr>
</table>


<h2>Films</h2>
<table>
    <tr>
        <th>Titel</th>
        <th>Duur</th>
    </tr>
    <tr>
        <td>
            <?php foreach ($dataFilms as $row){
                echo $row['title'] . "<br />\n";
            } ?>
        </td>
        <td>
            <?php foreach ($dataFilms as $row){
                echo $row['duur'] . "<br />\n";
            } ?>
        </td>
    </tr>
</table>

</body>
</html>