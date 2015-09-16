<?php
		if(!isset($_SESSION['todo_ok']) || !$todo_ok){
				header("Location: /index.php");
				exit();
		}