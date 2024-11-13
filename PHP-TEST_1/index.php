<!DOCTYPE html>
<html>
<head>
	<title>IBookIn</title>
</head>



<body>

<div align='center'>
	<h1> <a href="index.php">IBookIn</a> </h1>

	<form method="POST" action="index.php">
		<p> <input type="text" name="categorie" placeholder="Cours PHP"> </p>
		<p> <input type="text" name="isbn" placeholder="9791092928228"> </p>
		<p> <input type="submit" value="Rechercher" name="rechercher"> </p>
	</form>
	<hr>
</div>


<!-- Traitement des données - PHP -->

<?php

if (!empty($_POST['rechercher'])){

	// On récupère les champs de recherche
	$catego = $_POST['categorie'];
	echo $catego;
	$ISBN = $_POST['isbn'];


	include('BookSearcher.class.php');

	$googleBook = new BookSearcher();


	if (!empty($_POST['categorie']))
	{
		// Exemple de recherche par mot clés //
		$livres = $googleBook->getBooksByKeyword($catego);

		echo '<h1>Example de recherche</h1>';
		for ($i=0; $i<count($livres); $i++) {
			echo 'Livre ' . ($i+1) . '<br />';
			if (isset($livres[$i]['image']))
			{
				$livres[$i]['image'] = str_replace ('&edge=curl' ,'' , $livres[$i]['image']);
				echo "<img id='dynamic' src='" . $livres[$i]['image']. "'>";
			}
			else
				echo "<h3>Aucune image trouvée :/ </h3>";
			echo '<pre>';
				print_r($livres[$i]);
			echo '</pre><br />';
		}
	}


	if (!empty($_POST['isbn']))
	{
		// Exemple de recherche par ISBN //
		echo '<h1>Example de recherche par ISBN</h1>';
		$livre = $googleBook->getBookByISBN($ISBN);

		echo 'Livre (2844272592)<br />';
		if (isset($livre['image']))
		{
			$livre['image'] = str_replace ('&edge=curl' ,'' , $livre['image']);
			echo "<img id='dynamic' src='" . $livre['image']. "'>";
		}
		else
				echo "<h3>Aucune image trouvée :/ </h3>";
		echo '<pre>';
			print_r($livre);
		echo '</pre><br />';
	}
}

?>



</body>
</html>