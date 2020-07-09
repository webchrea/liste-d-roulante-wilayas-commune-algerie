<?php

require_once('database_connect.php');
$db = new DB();
if(!empty($_POST["id_pays"])) {
	$query ="SELECT * FROM communes WHERE wilaya_id = '" . $_POST["id_pays"] . "'";
	$results = $db->runQuery($query);
?>
	<option value="">Sélectionnez la commune</option>
<?php
	foreach($results as $ville) {
?>
	<option value="<?php echo $ville["id"]; ?>"> <?php echo $ville["nom"]; ?>  (<span><?php echo $ville["code_postal"]; ?>)</span></option>
<?php
	}
}
?>