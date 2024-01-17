<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Animeデータ追加</title>
    <link rel="stylesheet" href="CSS/add_anime.css"> <!-- 適切なスタイルシートへのリンクを追加 -->
</head>
<body>
    <h2>Animeデータ追加</h2>

    <form action="add_anime.php" method="post">
        <label for="title">タイトル:</label>
        <input type="text" id="title" name="title" required>

        <label for="popularity">人気度:</label>
        <input type="text" id="popularity" name="popularity" required>

        <label for="start_date">放送開始日:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="genre">ジャンル:</label>
        <input type="text" id="genre" name="genre" required>

        <input type="submit" value="追加">
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームが送信された場合の処理

    // 入力データの取得
    $title = $_POST["title"];
    $popularity = $_POST["popularity"];
    $start_date = $_POST["start_date"];
    $genre = $_POST["genre"];

    // データベースへの接続
    define('SERVER', 'mysql220.phy.lolipop.lan');
    define('DBNAME', 'LAA1516805-final');
    define('USER', 'LAA1516805');
    define('PASS', 'Pass0222');

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
    $pdo = new PDO($connect, USER, PASS);

    // データの挿入クエリ
    $sql = "INSERT INTO Anime (title, popularity, release_date, genre) VALUES (:title, :popularity, :start_date, :genre)";

    // プリペアドステートメントを作成
    $stmt = $pdo->prepare($sql);

    // パラメータに値をバインド
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':popularity', $popularity);
    $stmt->bindParam(':start_date', $start_date); // 修正: release_date から start_date に変更
    $stmt->bindParam(':genre', $genre);

    // クエリの実行
    if ($stmt->execute()) {
        echo "<p>データが追加されました。</p>";
    } else {
        // 重複エラーに対処
        if ($pdo->errorInfo()[1] == 1062) { // 修正: $stmt から $pdo に変更
            echo "<p>すでに同じデータが存在しています。</p>";
        } else {
            echo "<p>データの追加に失敗しました。</p>";
        }
    }
}
?>

<a href="index.php">トップに戻る</a>

</body>
</html>

