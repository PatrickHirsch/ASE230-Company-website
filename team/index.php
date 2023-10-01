<?php
// Load JSON data from team.json file
readUserData();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Starluxe Team</title>
</head>
<body>
    <h1>Starluxe Team</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($team !== null) {
                    foreach ($team as $name => $member) {
                        echo '<tr>';
                        echo '<td>' . $name . '</td>';
                        echo '<td>' . $member['title'] . '</td>';
                        echo '<td><a href="detail.php?name=' . urlencode($name) . '">Details</a></td>';
                        echo '</tr>';
                    }
                }
            ?>
        </tbody>
    </table>
    
    <br>
    <a href="create.php">Create</a>
</body>
</html>
