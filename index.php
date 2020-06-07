<?php
	include_once("db.php");
	$rows = DB::table("users")->get();
	foreach ($rows as $key => $row) {
		echo $row->name."<br>";
	}
?>