<?php
// データベースへの接続
define('SERVER', 'mysql220.phy.lolipop.lan');
define('DBNAME', 'LAA1516805-final');
define('USER', 'LAA1516805');
define('PASS', 'Pass0222');

$connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
$pdo = new PDO($connect, USER, PASS);

// アニメIDの取得
$anime_id = isset($_POST['id']) ? $_POST['id'] : null;

// アニメが存在するか確認
$sql_check = "SELECT * FROM Anime WHERE id = :id";
$stmt_check = $pdo->prepare($sql_check);
$stmt_check->bindParam(':id', $anime_id);
$stmt_check->execute();
$anime = $stmt_check->fetch();

if (!$anime) {
    echo "指定されたアニメは存在しません。";
    exit;
}

// フォームからのデータを取得
$title = isset($_POST["title"]) ? $_POST["title"] : $anime['title'];
$popularity = isset($_POST["popularity"]) ? $_POST["popularity"] : $anime['popularity'];
$start_date = isset($_POST["start_date"]) ? $_POST["start_date"] : $anime['release_date'];
$genre = isset($_POST["genre"]) ? $_POST["genre"] : $anime['genre'];

// データの更新クエリ
$sql_update = "UPDATE Anime SET title = :title, popularity = :popularity, release_date = :release_date, genre = :genre WHERE id = :id";
$stmt_update = $pdo->prepare($sql_update);

// パラメータに値をバインド
$stmt_update->bindParam(':title', $title);
$stmt_update->bindParam(':popularity', $popularity);
$stmt_update->bindParam(':release_date', $start_date);
$stmt_update->bindParam(':genre', $genre);
$stmt_update->bindParam(':id', $anime_id);

// クエリの実行
if ($stmt_update->execute()) {
    echo "<p>データが更新されました。</p>";
} else {
    echo "<p>データの更新に失敗しました。</p>";
}

?>
<a href="index.php">トップに戻る</a>
<link rel="stylesheet" href="CSS/style.css">

