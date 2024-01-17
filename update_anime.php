<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Animeデータ更新</title>
    <link rel="stylesheet" href="CSS/update.css"> <!-- 適切なスタイルシートへのリンクを追加 -->
</head>
<body>
    <h2>Animeデータ更新</h2>

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

    // アニメ情報をフォームで表示
    ?>
    <form action="update_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo $anime_id; ?>">
        <label for="title">タイトル:</label>
        <input type="text" id="title" name="title" value="<?php echo $anime['title']; ?>" required>

        <label for="popularity">人気度:</label>
        <input type="text" id="popularity" name="popularity" value="<?php echo $anime['popularity']; ?>" required>

        <label for="start_date">放送開始日:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo $anime['release_date']; ?>" required>

        <label for="genre">ジャンル:</label>
        <input type="text" id="genre" name="genre" value="<?php echo $anime['genre']; ?>" required>

        <input type="submit" value="更新">
    </form>

    <a href="index.php">トップに戻る</a>
    

</body>
</html>
