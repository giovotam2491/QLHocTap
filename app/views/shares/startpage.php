<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Quản Lý Học Tập Trực Tuyến</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #000;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-image: url('uploads/startpage.jpg');
            background-size: cover;
            background-position: center;
        }

        header {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .menu {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1.2rem;
        }

        h2 {
            font-size: 2.5rem;
            font-weight: normal;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.5rem;
            max-width: 600px;
            margin-bottom: 30px;
        }

        .buttons a {
            display: inline-block;
            color: white;
            text-decoration: none;
            border: 2px solid white;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        .buttons a:hover {
            background: white;
            color: black;
        }

        .social-icons {
            position: absolute;
            right: 20px;
            bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .scroll-down {
            position: absolute;
            bottom: 20px;
            font-size: 1rem;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <main>
        <h2>Chào Mừng.</h2>
        <p>Đây là trang web hỗ trợ cho môi trường học tập của bạn đạt chất lượng cao hơn</p>
        <div class="buttons">
            <a href="/QLHocTap/homepage/homepage">Bắt đầu</a>
        </div>
    </main>

</body>
</html>