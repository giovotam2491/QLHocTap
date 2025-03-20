<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard UI</title>
    <style>
        body {
            background-color: #1e1e2f;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #1e1e2f;
        }
        nav {
            display: flex;
            gap: 20px;
        }
        nav a {
            text-decoration: none;
            color: #a0a0a0;
        }
        nav a:hover {
            color: white;
        }
        .search-container {
            display: flex;
            align-items: center;
        }
        .search-container input {
            padding: 5px;
            border: 1px solid #a0a0a0;
            border-radius: 5px;
            background-color: #2e2e3c;
            color: white;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        .buttons button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login {
            background-color: transparent;
            color: white;
            border: 1px solid #a0a0a0;
        }
        .login:hover {
            color: yellow;
        }
        .signup {
            background-color: #f9a828;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">B</div>
    <nav>
        <a href="#">Home</a>
        <a href="#">Features</a>
        <a href="#">Pricing</a>
        <a href="#">FAQs</a>
        <a href="#">About</a>
    </nav>
    <div class="search-container">
        <input type="text" placeholder="Search...">
    </div>
    <div class="buttons">
        <button class="login">Login</button>
        <button class="signup">Sign-up</button>
    </div>
</header>

</body>
</html>