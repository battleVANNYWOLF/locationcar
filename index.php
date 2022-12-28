<?php require("connection.php");  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/loccar_style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Location voitures</title>
</head>
<body>
	<div id="entete">
		<video controls autoplay onloadedmetadata="this.muted = true" playsinline autoplay muted loop class="video_entete">
			<source src="assets/images/Spectre.mp4" type="video/mp4">
		</video>
		<p class="titresite">Location et vente des voitures</p>
		<div id="formauto">
			 <form name="formauto" method="POST" action="">
			 	<input id="motcle" type="text" name="motcle" placeholder=" Rechercher une Marque"/>
			 	<input class="btnfind" type="submit" name="btnsubmit" value="Recherche"/>
			 </form>
		</div>
	</div>
	<div id="articles">
		<?php 
		$query = $con->query("SELECT * FROM automobile ORDER BY id DESC");  
		if(isset($_POST['btnsubmit']))
		{
			$mc = $_POST['motcle']; 
			$query = $con->query("SELECT * FROM automobile WHERE marque LIKE '%$mc%'");
		}else{
			echo"<p><h2><i>Recherche introuvatrouvable!</i></h2></p>";
		}
		
		while ($ligne= $query->fetch())
		 {
	?>
		<div id="auto">
			<a href="">
			<?= $ligne['id'];?>
			<img src="<?= $ligne['photo']; ?>"/><br/>
			<?= $ligne['imatriculation']; ?><br/>
			<?= $ligne['marque']; ?><br/>
			<?= $ligne['prix']; ?><br/>
		</a></div>



	<?php 	}

		?>
		
	</div><br/>
	
	
				<!-- creation du footer -->
<div id="footer">
	
		
		<img src="assets/images/ajouter.png"/><a href="">Facebook<i></i></a><br/>
			
		<div class="out-footer">
		<p class="">Copyright &copy; The Batoula Concept <?php echo date("Y"); ?></p>													
	</div>
</div>


</body>
</html>