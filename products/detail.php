<?php
// Load JSON data from team.json file
readUserData();

// Check if the item name is provided as a query parameter
if (isset($_GET['name'])) {
    $itemName = $_GET['name'];
    
    // Check if the item exists in the "Key Products & Services" section
    if (isset($products_and_services['Key Products & Services'][$itemName])) {
        $item = $products_and_services['Key Products & Services'][$itemName];
    } else {
        // Handle the case when the item doesn't exist
        echo 'Item not found.';
        exit();
    }
} else {
    // Handle the case when no item name is provided
    echo 'Item not specified.';
    exit();
}

// Check if the "delete" button is clicked
if (isset($_POST['delete'])) {
    // Remove the item from the array
    unset($products_and_services['Key Products & Services'][$itemName]);
    
    // Save the updated data back to the team.json file
    file_put_contents('team.json', json_encode($products_and_services, JSON_PRETTY_PRINT));
    
    // Redirect back to the index.php page
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product/Service Details</title>
</head>
<body>
    <h1>Product/Service Details</h1>
    <h2><?php echo $itemName; ?></h2>
    <p>Description: <?php echo $item['description']; ?></p>
    
    <h3>Applications:</h3>
    <ul>
        <?php
            foreach ($item['applications'] as $application) {
                echo '<li>' . $application . '</li>';
            }
        ?>
    </ul>
    
    <form method="post" action="">
        <input type="submit" name="delete" value="Delete">
        <a href="edit.php?name=<?php echo urlencode($itemName); ?>">Edit</a>
    </form>
</body>
</html>
