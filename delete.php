<?php

require "Controller/queries.ctr.php";

$query = new queries();

$id = $_GET['id'];
$query->delete($id);

?>
