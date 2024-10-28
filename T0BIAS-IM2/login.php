<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login $h1t</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 1rem;
            margin: 10px 0 5px;
        }
        input[type="text"] {
            padding: 10px;
            border: 1px solid #b2ebf2;
            border-radius: 5px;
            font-size: 1rem;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            border: none;
            background-color: #00acc1;
            color: #fff;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #00838f;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="code.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter your username">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" placeholder="Enter your password">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
