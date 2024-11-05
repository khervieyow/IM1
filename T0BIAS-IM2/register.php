<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        input[type="text"], input[type="date"], select {
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
        <h2>Register</h2>
        <form action="register_process.php" method="post">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" required>

            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" required>

            <label for="address">Address</label>
            <input type="text" name="address" id="address" required>

            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate" required>

            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                
            </select>

            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password</label>
            <input type="text" name="password" id="password" required>

            <input type="hidden" name="role" value="customer">
            <input type="hidden" name="date_created" value="<?php echo date('Y-m-d H:i:s'); ?>">

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>