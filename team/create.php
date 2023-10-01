<?php
// Load JSON data from starluxe.json file
readUserData();

// Initialize variables to hold form data
$name = $title = $description = $image = '';
$error = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    // Validate form data (you can add more validation as needed)
    if (empty($name) || empty($title) || empty($description)) {
        $error = 'Please fill in all required fields.';
    } else {
        // Create a new team member entry
        $newMember = [
            'title' => $title,
            'description' => $description,
        ];

        // Optionally, add an image if provided
        if (!empty($image)) {
            $newMember['image'] = $image;
        }

        // Add the new team member to the "Team" section
        $data['Team'][$name] = $newMember;

        // Save the updated data back to the starluxe.json file
        file_put_contents('starluxe.json', json_encode($data, JSON_PRETTY_PRINT));

        // Redirect to the edit page for the newly created team member
        header("Location: edit.php?name=" . urlencode($name));
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create New Team Member</title>
</head>
<body>
    <h1>Create New Team Member</h1>
    
    <?php
    // Display an error message if validation fails
    if (!empty($error)) {
        echo '<p style="color: red;">' . $error . '</p>';
    }
    ?>

    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>
        <label for="image">Image URL (optional):</label>
        <input type="text" name="image"><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
