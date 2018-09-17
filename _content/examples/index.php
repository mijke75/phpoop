<h2>Examples</h2>
<p>The examples below are retrieved from a collection of object oriented classes which inherit from base classes:</p>
<ul>

<?php

	$examples = new Examples();

	$exampleList = $examples->load();

	foreach ($exampleList as $example) {
		echo '<li><a href="example.php?id=' . $example->getID() . '">' . $example->getName() . '</a></li>';
	}	

?>
</ul>
<br>
<a href="example_add.php" class="button">Add another example!</a>
