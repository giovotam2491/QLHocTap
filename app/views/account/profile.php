<!-- File: app/views/account/profile.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hồ sơ cá nhân</title>
    <link rel="stylesheet" href="path/to/your/style.css">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f5f5f5; 
            padding: 20px; 
        }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            background: white; 
            padding: 20px; 
            border-radius: 8px; 
        }
        .form-group { 
            margin-bottom: 15px; 
        }
        label { 
            display: block; 
            margin-bottom: 5px; 
        }
        input[type="text"], 
        input[type="email"], 
        input[type="tel"] {
            width: 100%; 
            padding: 10px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
        }
        .btn { 
            padding: 10px 20px; 
            background-color: #007BFF; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
        }
        .btn:hover { 
            background-color: #0056b3; 
        }
        .alert { 
            padding: 10px; 
            margin-bottom: 15px; 
            border-radius: 4px; 
        }
        .alert-success { 
            background-color: #d4edda; 
            color: #155724; 
        }
        .alert-error { 
            background-color: #f8d7da; 
            color: #721c24; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hồ sơ cá nhân</h1>
        <?php if (!empty($error)) : ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="full_name">Họ và Tên:</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($account['full_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($account['phone']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($account['email']); ?>" required>
            </div>
            <button type="submit" class="btn">Cập nhật thông tin</button>
        </form>
    </div>
</body>
</html>
