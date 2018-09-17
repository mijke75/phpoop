<?php
	$params = $GLOBALS['page']->parameters;

	$exampleName = '';

	if(isset($params['id'])){

		$example = new Example($params['id']);

		$exampleName = $example->getName();

		$example->delete();

?>
<form>
	<label>Example '<?php echo $exampleName ?>' has been deleted to the database.</label>
</form>


<?php
	}
	else {
?>

<form>
	<label>Something went wrong.</label>
</form>

<?php		
	} // if delete and valid ID
?>