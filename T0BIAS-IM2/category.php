<?php

include 'prelim.php'; 

$newconnection = new Connection();


if (isset($_POST['insertcategory'])) {
    $category_name = $_POST['category_name'];
    $date_created = $_POST['date_created'];

    try {
        $connection = $newconnection->openConnection(); 
        $query = "INSERT INTO categories (category_name, date_created) VALUES (:category_name, :date_created)";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':date_created', $date_created);
        $stmt->execute();
        echo '<script>alert("Category added successfully!");</script>';
    } catch (PDOException $th) {
        echo "Error: " . $th->getMessage();
    }
}


$categories = []; 
try {
    $connection = $newconnection->openConnection(); 
    $query = "SELECT * FROM categories";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC); 
} catch (PDOException $th) {
    echo "Error: " . $th->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1 class="my-4">Category Management</h1>
    
 
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#insertModal">
        Add Category
    </button>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo htmlspecialchars($category['category_name']); ?></td>
                    <td><?php echo htmlspecialchars($category['date_created']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="" method="POST" class="row g-12">
                            <div class="col">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" required>
                            </div>
                            <div class="col">
                                <label for="date_created" class="form-label">Date Created</label>
                                <input type="date" class="form-control" id="date_created" name="date_created" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="insertcategory">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>