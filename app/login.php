<?php
session_start();
$err = "";
if (isset($_GET['id']) && $_GET['id'] !== "") {
    if ($_GET['id'] === "hoge") {
        if ($_GET['pw'] === "hoge") {
            $_SESSION['id'] = $_GET['id'];
            header('Location: /index.php');
            exit;
        } else {
            $err = "パスワードが違います！";
        } 
    } else {
        $err =  $_GET['id'] . "は無効なIDです！";
    }
}
?>
<html>
    <head><title>ログイン</title></head>
    <body>
        <form name="form1" action="login.php" method="GET">
            ID: <input type="text" name="id"><br>
            PW: <input type="password" name="pw"><br>
            <input type="submit" value="送信">
        </form>
        <p><?= $err ?></p>
    </body>
</html>
