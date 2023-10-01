<?php
// Load JSON data from starluxe.json file
require_once('/Applications/XAMPP/xamppfiles/htdocs/ase230/week4/ASE230-Company-website/lib/jsonReader.php');
$data = readUserData();

// Check if the "Key Products & Services" section exists in the data
if (isset($data['Key Products & Services'])) {
    $keyProducts = $data['Key Products & Services'];
} else {
    $keyProducts = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Key Products & Services</title>
</head>
<body>
    <h1>Key Products & Services</h1>

    <!-- Create button to navigate to the create page -->
    <p><a href="create_product.php">Create New Product/Service</a></p>

    <!-- Display a table of available items -->
    <table>
        <tr>
            <th>Product/Service Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($keyProducts as $productName => $productInfo) : ?>
            <tr>
                <td><?php echo htmlspecialchars($productName); ?></td>
                <td><?php echo htmlspecialchars($productInfo['description']); ?></td>
                <td>
                    <!-- View details link -->
                    <a href="detail_product.php?name=<?php echo urlencode($productName); ?>">View Details</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
