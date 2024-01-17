<?php
// delete_anime.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // アニメIDの取得
    $anime_id = isset($_POST['id']) ? $_POST['id'] : null;

    // データベースへの接続
    define('SERVER', 'mysql220.phy.lolipop.lan');
    define('DBNAME', 'LAA1516805-final');
    define('USER', 'LAA1516805');
    define('PASS', 'Pass0222');

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
    $pdo = new PDO($connect, USER, PASS);

    // アニメを削除するクエリ
    $sql_delete = "DELETE FROM Anime WHERE id = :id";
    $stmt_delete = $pdo->prepare($sql_delete);
    $stmt_delete->bindParam(':id', $anime_id);

    if ($stmt_delete->execute()) {
        echo "アニメが削除されました。";
    } else {
        echo "アニメの削除に失敗しました。";
    }
} else {
    echo "無効なリクエストです。";
}
?>
<a href="hyouji.php">アニメ表示画面に戻る</a>
<link rel="stylesheet" href="CSS/delate.css">

