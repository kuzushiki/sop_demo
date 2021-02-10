<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<html>
    <head><title>ログアウト</title></head>
    <body>
        <p>ログアウトしました</p>
        <a href='login.php'>ログイン</a>
    </body>
</html>