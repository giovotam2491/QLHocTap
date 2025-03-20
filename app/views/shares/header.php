<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Header Example</title>
    <style>
        .header {
            background-color: #151515; /* Dark background */
        }
        .btn-yellow {
            background-color: #FFC107; /* Sign-up Button Color */
            color: black;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #FFC107;
        }
        .btn-yellow:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark header">
    <a class="navbar-brand" href="#">
        <img src="path_to_logo.png" alt="Logo" style="width: 40px; height: 40px;">
        My Learning Platform
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">FAQs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-2" type="search" placeholder="Search..." aria-label="Search">
            <a href="/QLHocTap" class="btn btn-outline-light my-2 my-sm-0">Login</a>
            <a href="app/views/account/register.php" class="btn btn-outline-warning my-2 my-sm-0 ml-2">Sign-up</a>
        </form>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
