<?php
		if(!isset($_POST['todo_ok']) || !$todo_ok){
				header("Location: /index.php");
				exit();
		}