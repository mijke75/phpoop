<?php
	$params = $GLOBALS['page']->parameters;

	if(isset($params['action']) && $params['action'] == 'add'){

		$example = new Example();

		$example->setName($params['exampleName']);
		$example->setDescription($params['exampleDescription']);

		$example->add();

?>
<form>
	<label>Example '<?php echo $params['exampleName'] ?>' has been added to the database.</label>
	<br><br><br>
	<a href="example_add.php" class="button">Add another one!</a>
</form>


<?php
	}
	else {
?>

<form method="post" action="example_add.php">
	<label for="exampleName">Name</label>
	<input type="text" name="exampleName" />
	<label for="exampleDescription">Description</label>
	<textarea name="exampleDescription" rows="8"></textarea>

	<input type="hidden" name="action" value="add" />
	<input type="submit" value="Add Example" />
</form>

<?php		
	} // if save
?>