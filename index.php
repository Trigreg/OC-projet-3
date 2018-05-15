
<?php 
	try {
		$db=new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
	}

	catch (exception $e){
		die('Erreur : ' . $e->getMessage);
	}

	$posts=$db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY id DESC');
	

require('index_view.php');
?>
