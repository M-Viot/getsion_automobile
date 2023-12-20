<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>
        <?= isset($appTitle) ? APPNAME . " - $appTitle" : APPNAME; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="/public/styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
<header>
    <h1 class="text-center"><?= APPNAME ?></h1>
</header>
<?php include "$view.php"; ?>
</body>
</html>
