<?php
	$params = $GLOBALS['page']->parameters;

	if(isset($params['id'])){
		$example = new Example($params['id']);		
	}

	if(isset($params['action']) && $params['action'] == 'edit' && isset($example)){

		$example->setName($params['exampleName']);
		$example->setDescription($params['exampleDescription']);

		$example->save();

?>
<form>
	<label>Example '<?php echo $params['exampleName'] ?>' has been updated.</label>
    <br><br><br>
    <a href="example.php?id=<?php echo $params['id']?>" class="button">Back to Example</a>
</form>

<?php
	}
	else {
?>

<form method="post" action="example_edit.php">
	<label for="exampleName">Name</label>
	<input type="text" name="exampleName" value="<?php echo $example->getName() ?>" />
	<label for="exampleDescription">Description</label>
	<textarea name="exampleDescription" rows="8"><?php echo $example->getDescription() ?></textarea>

	<input type="hidden" name="id" value="<?php echo $params['id'] ?>" />
	<input type="hidden" name="action" value="edit" />
	<input type="submit" value="Update Example" />
</form>

<?php		
	} // if save
?>