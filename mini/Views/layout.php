<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? htmlspecialchars($title) : 'App' ?></title>
</head>
<body>
<header>
    <h1><?= isset($title) ? htmlspecialchars($title) : 'App' ?></h1>
</header>
<main>
    <?= $content ?>
    
</main>
</body>
</html>

