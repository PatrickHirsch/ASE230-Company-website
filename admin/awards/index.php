<?php
require_once('./awards.php');
$awardsList = getCsvArray();
?>

<table>
    <tbody>
    <?php
    for ($index = 0; $index < count($awardsList); $index++) {
        if (!empty($awardsList[$index])) {
            echo '<tr>';
            echo '<td><a href="detail.php?index='.$index.'" class="full-link">' . $awardsList[$index][0] . '</a></td>';
            echo '<td>' . $awardsList[$index][1] . '</td>';
            echo '</tr>';
        }
    }
    ?>
    </tbody>
</table>
<button><a href="./create.php">Create</a></button>

