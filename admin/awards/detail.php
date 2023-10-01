<?php
$index = $_GET['index'];
require_once('./awards.php');
$item = getItem($index);
?>

<div><?=$item[0]?></div>
<div><?=$item[1]?></div>
<div>

    <button>
        <a href="./edit.php?index=<?=$index?>">Edit</a>
    </button>
    <button>
        <a href="./delete.php?index=<?=$index?>">Delete</a>
    </button>
</div>

