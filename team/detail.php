<?php
// Load JSON data from starluxe.json file
require_once('/Applications/XAMPP/xamppfiles/htdocs/ase230/week4/ASE230-Company-website/lib/jsonReader.php');
$data = readUserData();

// Check if the team member name is provided as a query parameter
if (isset($_GET['name'])) {
    $teamMemberName = $_GET['name'];
    
    // Check if the team member exists in the "Team" section
    if (isset($data['Team'][$teamMemberName])) {
        $teamMember = $data['Team'][$teamMemberName];
    } else {
        // Handle the case when the team member doesn't exist
        echo 'Team member not found.';
        exit();
    }
} else {
    // Handle the case when no team member name is provided
    echo 'Team member not specified.';
    exit();
}

// Check if the "delete" button is clicked
if (isset($_POST['delete'])) {
    // Remove the team member from the array
    unset($data['Team'][$teamMemberName]);
    
    // Save the updated data back to the starluxe.json file
    file_put_contents('starluxe.json', json_encode($data, JSON_PRETTY_PRINT));
    
    // Redirect back to the index.php page or any other desired location
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team Member Details</title>
</head>
<body>
    <h1>Team Member Details</h1>
    <h2><?php echo $teamMemberName; ?></h2>
    <p>Title: <?php echo $teamMember['title']; ?></p>
    <p>Description: <?php echo $teamMember['description']; ?></p>
    
    <!-- You can display the team member's image here -->
    <img src="<?php echo $teamMember['image']; ?>" alt="<?php echo $teamMemberName; ?>">
    
    <form method="post" action="">
        <input type="submit" name="delete" value="Delete">
        <a href="edit.php?name=<?php echo urlencode($teamMemberName); ?>">Edit</a>
    </form>
</body>
</html>
