<?php

require_once 'DB.php';
require_once 'DB_functions.php';

// connect to the database
connect(
    'localhost', // server URL
    'world',     // database name
    'root',      // username
    ''           // password
);

function get_cities(int $page_nr)
{
    $limit = 20;

    $offset = ($page_nr - 1) * $limit;

    return select("
        SELECT *
        FROM `cities`
        ORDER BY `population` DESC
        LIMIT {$offset}, {$limit}
    ");
}

// $cities = get_cities(1);

$page_nr = $_GET['page'] ?? 1;

$cities = get_cities($page_nr);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cities with pagination</title>
</head>

<body>

    <?php if ($page_nr > 1) : ?>
        <a href="?page=<?= $page_nr - 1 ?>">Previous page</a>
    <?php endif; ?>

    <a href="?page=<?= $page_nr + 1 ?>">Next page</a>

    <ul>
        <?php foreach ($cities as $city) : ?>
            <li>
                <?= $city->name ?><br>
                population: <?= $city->population ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>