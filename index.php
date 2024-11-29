<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ИНЛАЙН</title>
</head>
<body>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }
</style>

<!--Создание Постов и комментариев-->
<?php //require_once $_SERVER['DOCUMENT_ROOT']. '/db/db.php'?>
<?php //require_once $_SERVER['DOCUMENT_ROOT']. '/file/create_db.php'?>

<h1>Форма</h1>
<form action="search.php" method="get">
    <input type="text" name="text" minlength="3" required>
    <button type="submit">Найти</button>
</form>

<?php
session_start();
$posts = $_SESSION['data'] ?? [];
unset($_SESSION['data']);
$isSearch = $_GET['search'] ?? '';

if ($isSearch) {
    if (!empty($posts)): ?>
        <h2>Результаты поиска:</h2>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>userId</th>
                <th>Заголовок</th>
                <th>Тело</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $post['id'] ?></td>
                    <td><?= $post['userId'] ?></td>
                    <td><?= $post['title'] ?></td>
                    <td><?= $post['body'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Ничего не найдено.</p>
    <?php endif;
} ?>
</body>
</html>