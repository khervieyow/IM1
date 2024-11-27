<?php
require_once 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$productCRUD = new ProductCRUD();
$cartCRUD = new CartCRUD();
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        if (isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
            $cartCRUD->addToCart($user_id, $_POST['product_id'], $quantity);
            header("Location: index.php");
            exit;
        } elseif (isset($_POST['action']) && $_POST['action'] === 'buy_now') {
            $cartCRUD->buyNow($user_id, $_POST['product_id'], $quantity);
            header("Location: confirmation.php");
            exit;
        }
    }
}

$products = $productCRUD->readProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Regala Midterm</title>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Header Section -->
    <header class="bg-white shadow">
        <nav class="container mx-auto flex justify-between items-center py-4 px-6">
            <div class="text-xl font-bold text-gray-800">Merchants Guild</div>
            <ul class="flex space-x-6 text-gray-600">
                <li><a href="index.php" class="hover:text-gray-800">Products</a></li>
                <li><a href="cart.php" class="hover:text-gray-800">Cart</a></li>
            </ul>
            <div>
                <a href="logout.php" class="text-gray-600 hover:text-red-600 flex items-center">
                    <i class="fa-solid fa-right-from-bracket mr-2"></i>Logout
                </a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-8 px-6">
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($products as $product): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <img src="<?= htmlspecialchars($product->image_url); ?>"
                        alt="<?= htmlspecialchars($product->product_name); ?>"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($product->product_name); ?></h3>
                        <p class="text-gray-600 mb-4">$<?= number_format($product->price, 2); ?></p>
                        <div class="flex flex-col space-y-2">
                            <form action="index.php" method="POST" class="flex items-center space-x-2">
                                <input type="hidden" name="product_id" value="<?= $product->product_id; ?>">
                                <input type="number" name="quantity" value="1" min="1" class="w-16 px-2 py-1 border border-gray-300 rounded focus:ring focus:ring-indigo-200 focus:outline-none" required>
                                <button type="submit" name="action" value="add_to_cart" class="flex-1 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300">Add to Cart</button>
                            </form>
                            <form action="index.php" method="POST" class="flex items-center space-x-2">
                                <input type="hidden" name="product_id" value="<?= $product->product_id; ?>">
                                <input type="number" name="quantity" value="1" min="1" class="w-16 px-2 py-1 border border-gray-300 rounded focus:ring focus:ring-green-200 focus:outline-none" required>
                                <button type="submit" name="action" value="buy_now" class="flex-1 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300">Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>
