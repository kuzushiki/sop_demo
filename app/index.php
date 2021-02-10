<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] === "") {
    header('Location: /login.php'); //先にログインさせる
    exit;
}
?>
<html>
    <head><title>ひみつのぺーじ</title></head>
    <body>
        ようこそ！<?= $_SESSION['id'] ?> さん
        <h2>あなたのひみつ</h2>
        <p>実は…〇〇さんのことが好きです！</p>
        <a href='logout.php'>ログアウト</a>
    </body>
</html>
