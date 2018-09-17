<h2>More examples</h2>
<ul>
<?php
	$examples = new Examples();

	$exampleList = $examples->load();

	foreach ($exampleList as $example) {
        echo '<li><a href="example.php?id=' . $example->getID() . '">' . $example->getName() . '</a></li>';
    }

?>
</ul>
