<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>
        <?= isset($appTitle) ? APPNAME . " - $appTitle" : APPNAME; ?>
    </title>
</head>
<body>
<?php include "$view.php"; ?>

</body>
</html>
