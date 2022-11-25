<?php 
		include("./inc/function.php");
		include("./inc/connection.php");
		$id = 0;
		if( isset($_GET['idPool']) ){
				$id = $_GET['idPool'];
		}else{
			header('location:../index.php');
		}
		$poolName  = getSpecificPool( $id , connect() );
		$listMatch = getMatchPerGroup( $id , connect() );

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/dist5/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="../assets/css/Style.css"> -->
	<title>Liste resultats</title>
</head>
<body>

	<div class="container">
		<div class="match-container row">
				<h2 class="text-center text-decoration-underline mb-3 py-4">
					Resultats des matchs du <?php echo $poolName;  ?>
				</h2>	
			<?php 	
				foreach( $listMatch as $match  ){ ?>
					<div class="match-details shadow p-3 mb-5 bg-body rounded d-flex flex-row justify-content-evenly p-5 mb-3">
						<div class="joueur1">
							<h3 class="joueur-1 ">
								<?php echo $match['equ1'];  ?>
							</h3>
							
						</div>
						<div class="scores">
							<h3 class="score text-center">
								<?php 	echo $match['score']; ?>
							</h3>
							
						</div>
						<div class="joueur2">
							<h3 class="joueur-2 text-right">
								<?php echo $match['equ2'];  ?>
								<!-- Joueur 2 -->
							</h3>
							
						</div>
					</div>

				<?php }

			?>
			<footer class="footer text-center text-secondary p-3 border-top fs-4">
				Made by ETU002032 , ETU001969 , ETU002069
			</footer>
						
		</div>	
	</div>


	<script src="../assets/dist/js/bootstrap.min.js"></script>
	<script src="../assets/dist/js/jquery.min.js"></script>
</body>
</html>