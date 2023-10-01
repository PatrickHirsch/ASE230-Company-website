<?php
$index = $_GET['index'];
require_once('./awards.php');
$item = getItem($index);
?>

<div><?=$item[0]?></div>
<div><?=$item[1]?></div>
<div>Are you sure you want to delete the above?</div>
<button onclick="confirm()">Yes</button>

<script>
    const confirm = () => {
        <?php deleteItem($index);?>
        alert("item deleted successfully");
        window.location.href = 'http://localhost/ASE230-Company-website/admin/awards/';
    }
</script>
