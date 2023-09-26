<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        .logout-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #d9534f; 
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #c9302c; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Logout</h2>
        <p>Are you sure you want to logout?</p>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
