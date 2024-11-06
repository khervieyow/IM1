<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgb(165, 182, 141);
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 420px;
            width: 100%;
        }

        .container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 1.8rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 1rem;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], input[type="password"], input[type="date"], select {
            padding: 12px;
            border: 1px solid #b2ebf2;
            border-radius: 5px;
            font-size: 1rem;
            width: 100%;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus, input[type="date"]:focus, select:focus {
            border-color: #55679C;
            outline: none;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #55679C;
            font-size: 1.2rem;
        }

        button {
            padding: 12px;
            border: none;
            background-color: #55679C;
            color: #fff;
            font-size: 1.1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        button:hover {
            background-color: #176B87;
        }

        .form-footer {
            text-align: center;
            margin-top: 15px;
        }

        .form-footer a {
            color: #55679C;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .modal-header, .modal-footer {
            background-color: rgb(165, 182, 141);
        }

        .modal-content {
            padding: 20px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="code.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter your username" required>

            <label for="password">Password</label>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
                <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
            </div>

            <button type="submit" name="submit">Submit</button>

            <div class="form-footer">
                <a href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a>
            </div>
        </form>
    </div>

    <!-- Modal for Sign Up Form -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="signup.php" method="post">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>

                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>

                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>

                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-select" required>
                            <option selected>Choose...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                        <label for="birthdate">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>

                        <label for="signup-username">Username</label>
                        <input type="text" class="form-control" id="signup-username" name="username" required>

                        <label for="signup-password">Password</label>
                        <div class="password-container">
                            <input type="password" class="form-control" id="signup-password" name="password" required>
                            <i class="fas fa-eye toggle-password" onclick="togglePasswordSignup()"></i>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block" name="signup">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Password toggle for Login Form
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Password toggle for Sign Up Form (inside modal)
        function togglePasswordSignup() {
            const passwordField = document.getElementById('signup-password');
            const toggleIcon = document.querySelector('#signupModal .toggle-password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
