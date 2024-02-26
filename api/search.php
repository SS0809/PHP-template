<?php

$jsonFile = 'data.json';
$jsonData = file_get_contents($jsonFile);
$dataArray = json_decode($jsonData, true);

$searchName = isset($_GET['search']) ? $_GET['search'] : '';
$results = [];

if (!empty($searchName)) {
    foreach ($dataArray as $person) {
        // Case-insensitive search by name
        if (stripos($person['tag'], $searchName) !== false) {
            $results[] = $person;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="../style/style.css" type="text/css">
</head>
<body>

    <?php if (!empty($results)): ?>
        <h2>Search Results:</h2>
        <ul>
            <?php foreach ($results as $result): ?>
                <li><?php echo $result['tag']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>

</body>
</html>
