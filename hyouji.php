<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Animeデータ表示</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1440688807730-73e4e2169fb8?format=auto&auto=compress&dpr=2&crop=entropy&fit=crop&w=1920&h=1282&q=80');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: #fff; 
            margin: 0;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.7);
            padding: 20px;
            margin: 50px auto;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 10px;
            text-align: left;
            color: #000;
        }

        .operations {
            display: flex;
            justify-content: space-between;
        }

        .operations form {
            display: inline;
        }

        .operations input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .operations input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
        }

        
        .add-anime-container {
            background: rgba(255, 255, 255, 0.7);
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
            text-align: center;
            position: relative;
        }

        .add-anime-container h2 {
            position: relative;
            color: #000; 
            background: #81d0cb;
            line-height: 1.4;
            padding: 0.5em 0.5em 0.5em 1.8em;
            margin-bottom: 20px;
        }

        .add-anime-container h2:before {
            font-family: "Font Awesome 5 Free";
            content: "\f14a";
            font-weight: 900;
            position: absolute;
            left: 0.5em;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    <h2>Animeデータ表示</h2>

    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>人気度</th>
                <th>放送開始日</th>
                <th>ジャンル</th>
                <th>操作</th>
            </tr>

            <?php
            define('SERVER', 'mysql220.phy.lolipop.lan');
            define('DBNAME', 'LAA1516805-final');
            define('USER', 'LAA1516805');
            define('PASS', 'Pass0222');

            $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
            $pdo = new PDO($connect, USER, PASS);

            $sql = "SELECT * FROM Anime";
            $stmt = $pdo->query($sql);

            while ($row = $stmt->fetch()) {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['title'].'</td>';
                echo '<td>'.$row['popularity'].'</td>';
                echo '<td>'.$row['release_date'].'</td>';
                echo '<td>'.$row['genre'].'</td>';
                echo '<td class="operations">
                        <form action="update_anime.php" method="post">
                            <input type="hidden" name="id" value="'.$row['id'].'">
                            <input type="submit" value="更新">
                        </form>
                        <form action="delete_anime.php" method="post">
                            <input type="hidden" name="id" value="'.$row['id'].'">
                            <input type="submit" value="削除">
                        </form>
                      </td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>

    <a href="add_anime.php">新しいアニメを追加する</a>
    <a href="index.php">topに戻る</a>
</body>
</html>
