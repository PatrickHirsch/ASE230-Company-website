<?php
 session_start();
// Load JSON data from starluxe.json file
require_once(__DIR__ .'/../lib/jsonReader.php');
$data = readUserData();

// Check if the team member name is provided as a query parameter
if (isset($_GET['name'])) {
    $teamMemberName = $_GET['name'];
    
    // Check if the team member exists in the "Team" section
    if (isset($data['Team'][$teamMemberName])) {
        $teamMember = $data['Team'][$teamMemberName];
        $imageSrc = $teamMember['image'];
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
    // Redirect back to the index.php page or any other desired location
    header('Location: delete.php');
    exit();
}
error_log(print_r($_SESSION,true));
if (isset($_SESSION['message'])){
    echo $_SESSION;
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
<!-- Check if 'image' key exists before displaying the image -->
<?php if (isset($teamMember['image'])): ?>
    <img src="../<?= $imageSrc?>" alt="<?php echo $teamMemberName; ?>">
    <?php else: ?>
        <p>No image available.</p>
    <?php endif; ?>
    
    <form method="post" action="">
        <input type="submit" name="delete" value="Delete">
        <a href="edit.php?name=<?php echo urlencode($teamMemberName); ?>">Edit</a>
    </form>
</body>
</html>
