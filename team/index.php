<?php
// Load JSON data from team.json file
require_once('/Applications/XAMPP/htdocs/ase230/week4/ASE230-Company-website/lib/jsonReader.php');
$JSONData = readUserData();
error_log(print_r($JSONData,true));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Starluxe Team</title>
</head>
<body>
    <h1>Starluxe Team</h1>
     <table>
    <tr>
      <th>Name</th>
      <th>Position</th>
      <th>Image</th>
    </tr>
    <?php fillTeamTable($JSONData);?>
     </table>
    <br>
    <a href="create.php">Create</a>
</body>
</html>
