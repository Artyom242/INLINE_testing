<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db.php';
$jsonPost = file_get_contents('https://jsonplaceholder.typicode.com/posts');
$jsonComments = file_get_contents('https://jsonplaceholder.typicode.com/comments');

CreateDB($jsonPost, $jsonComments, $db);

function CreateDB(string $jsonPost, string $jsonComm, $db)
{
    $countPost = 0;
    $countComments = 0;

    $objPost = json_decode($jsonPost);
    $objComm = json_decode($jsonComm);

    foreach ($objPost as $post) {
        $countPost++;

        $sql = $db->prepare('INSERT INTO `posts`(`userId`, `title`, `body`) VALUES (:userId, :title, :body)');
        $sql->execute(['userId' => $post->userId, 'title' => $post->title, 'body' => $post->body]);
    }

    foreach ($objComm as $comment) {
        $countComments++;

        $sql = $db->prepare('INSERT INTO `comments`(`postId`, `name`, `email`, `body`) VALUES (:postId, :name, :email, :body)');
        $sql->execute(array('postId' => $comment->postId, 'name' => $comment->name, 'email' => $comment->email, 'body' => $comment->body));
    }

    echo "<script>console.log(`Загружено $countPost записей и $countComments комментариев`);</script>";
}