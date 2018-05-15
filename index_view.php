<!DOCTYPE html>
<html>
<head>
	<title>Mon super blog !</title>
	<meta charset="utf-8">
</head>
<body>

<h1>Mon super blog</h1>

<p>Derniers posts du blog :</p>


<?php 

		while ($data=$posts->fetch()) {
?>
		<div class="news">
			<h2><?= $data['title'] . " écrit le " . $data['creation_date_fr']; ?></h2>
			<p><?= $data['content'] ?></p>
			<a href="comments.php?post_id=<?= $data['id']; ?>">Commentaires</a>
		 </div> 
		 <?php
	} ?>

</body>
</html>

