<?php
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
		switch($action) {
			case 'select':
				echo 1;die;
			break;
		}
	}	
?>