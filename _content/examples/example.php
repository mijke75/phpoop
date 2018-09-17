<?php
    $example = new Example($_GET['id']);

    echo '<h2>' . $example->getName() . '</h2>';
    echo '<p>' . $example->getDescription() .'</p>';

?>

<!--
    This is a bad example, because we don't want to send ids with GET.
    And we need a confirmation as well before deleting an item
    But hey, it shows how the classes work!
-->

<div class="controls">
    <a href="example_edit.php?id=<?php echo $example->getID() ?>"><img src="/_content/images/edit-512.png" /></a>
    <a href="example_delete.php?id=<?php echo $example->getID() ?>"><img src="/_content/images/delete-512.png" /></a>
</div>
