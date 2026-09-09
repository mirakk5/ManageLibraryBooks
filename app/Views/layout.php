<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Manage Library Books' ?></title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar">
    <div class="container">
        <a href="/books"> Manage Library Books</a>
    </div>
</nav>
<div class="container">
    <?= $this->renderSection('content') ?>
</div>
</body>
</html>