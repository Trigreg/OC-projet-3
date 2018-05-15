<?php 

		try {
		$db=new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
	}

		catch (exception $e){
		die('Erreur : ' . $e->getMessage);
	} 
	
	$posts = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
	$posts->execute(array($_GET['post_id']));
	$data=$posts->fetch();
	?>
	<div class="news">
			<h2><?= $data['title'] . " écrit le " . $data['creation_date_fr']; ?></h2>
			<p><?= $data['content'] ?></p>
		 </div> 

	<?php

	$posts->closeCursor();

	try {
		$db=new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
	}

		catch (exception $e){
		die('Erreur : ' . $e->getMessage);
	}

	$comments=$db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments where post_id = ?');
	$comments->execute(array($_GET['post_id']));

	while ($data= $comments->fetch()) {
		echo "<p>" . $data['author'] . " a écrit le " . $data['comment_date_fr'] . "</p>" ;
		echo "<p>" . $data['comment'] . "<p>" ;
	}

	$comments->closeCursor ();