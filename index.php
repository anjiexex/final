<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/index.css">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Pacifico);

        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
        }

        .wrapper {
            display: inline-block;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1440688807730-73e4e2169fb8?format=auto&auto=compress&dpr=2&crop=entropy&fit=crop&w=1920&h=1282&q=80');
            background-size: cover;
            -webkit-filter: blur(0px);
            filter: blur(0px);
            overflow: hidden;
            position: relative;
        }

        .circle_container {
            position: absolute;
            top: 50%;
            left: 50%;
            height: 10px;
            transform-origin: left center;
        }

        .circle {
            position: absolute;
            border-radius: 100%;
            background: rgba(255, 255, 255, 0.3);
            left: 0;
            opacity: 0;
            animation-name: move;
            animation-duration: 20s;
            animation-iteration-count: infinite;
        }

        @keyframes move {
            0% {
                transform: translateX(0px);
                opacity: 0;
            }

            1% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }

            100% {
                transform: translateX(70vmin);
                opacity: 0;
            }
        }

        .wrapper .name_container {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 80vmin;
            height: 80vmin;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 100%;
            box-shadow: inset 0px 0px 30px 30px rgba(200, 200, 200, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .wrapper .name_container>div {
            font-family: 'Pacifico', cursive;
            color: rgba(255, 255, 255, 0.7);
        }

        .wrapper .name_container .name {
            font-size: 5.5vmax;
        }

        .wrapper .name_container .designation {
            margin-top: 10px;
            font-size: 2vmax;
        }
    </style>
</head>

<body>
    <h3>php</h3>
    <p>SD2Dクラス 21番 藤春 あんじ（最終課題）
        <a href="add_anime.php">登録</a>
        <a href="hyouji.php">アニメ表示</a>
        <hr>
        <div class="wrapper">
            <div class="circle_container">
                <div class="circle"></div>
            </div>
            <div class="name_container">
                <div class="name">Your Name</div>
                <div class="designation">Web Developer</div>
            </div>
        </div>
    </p>
</body>

</html>
