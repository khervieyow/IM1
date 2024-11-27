<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new Connection();
    $userCRUD = new UserCRUD();
    $user = $userCRUD->login($email, $password);

    if ($user) {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['username'] = $user->username;
        $_SESSION['user_type'] = $user->user_type;
        if ($user->user_type == 'admin') {
            header("Location: admin.php");
        } else {

            header("Location: index.php");
        }
        exit;
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login</h2>
        <?php if (!empty($error_message)) : ?>
            <p class="text-red-500 text-sm mb-4"><?= htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST" class="space-y-4">
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                    required>
            </div>
            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" id="password" name="password" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                    required>
            </div>
            <!-- Submit Button -->
            <button type="submit" 
                class="w-full bg-indigo-600 text-white py-2 rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300">
                Login
            </button>
        </form>
        <p class="mt-4 text-sm text-gray-600 text-center">
            Don't have an account? <a href="register.php" class="text-indigo-600 hover:underline">Sign up here</a>.
        </p>
    </div>
</body>

</html>
