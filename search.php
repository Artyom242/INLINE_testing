<?php
$input_name = $_GET['text'];
GetPost($input_name);

header('Location: ' . '/index.php?search=true');
die();

function GetPost(string $input)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db.php';

    $sql = $db->prepare("
                        SELECT distinct posts.* FROM `comments` 
                        JOIN posts 
                        ON posts.id = comments.postId
                        WHERE comments.body LIKE :text
                        ");

    $sql->execute(['text' => "%$input%"]);
    $posts = $sql->fetchAll(PDO::FETCH_ASSOC);

    session_start();
    $_SESSION['data'] = $posts;
}
