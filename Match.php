<?php 
	include("./php/inc/connection.php");
	include("./php/inc/function.php");
	$simulation = getPrediction(connect());
	$poolName = getPool(connect());

	// $bestPlayers = setNewClassement(connect());
	initBLock( connect() );
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/dist5/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/Style.css">
	<title>Liste des equipe par poule</title>
</head>
<body>

	<div class="container">
		<div class=" row allEquips-Container">
			<h2 class="text-center text-white text-underlined py-4">
				<u>
					Classement provisoire
				</u>
			</h2>
			<div class=" delete text-center my-4">
				<a href="./php/traitement/Delete.php" class="link btn btn-danger">
					Reset result
				</a>
				<a href="./php/InitMondiale.php" class="link btn btn-danger">
					Set mondiale
				</a>
			</div>
			<!-- manomboka eto amin'izay no bouclena -->
			<?php 
				for( $i = 0 ; $i < count($poolName) ; $i++ ){ ?>
						<div class="col-md-4 offset-md-1 fs-4">
							<div class="panel border-bottom shadow my-5 bg-body rounded">
								<div class="panel-heading">
									<h2 class="panel-title text-center">
										<?php echo $poolName[$i]['poolName']; ?> 
									</h2>
								</div>
								<table class="table p-3">
									<th class="titles">Classement</th>
									<th class="titles">Nom d'equipe</th>
									<th class="titles">Points</th>
									<th class="titles">Flags</th>

									<?php 
										for( $j = 0 ; $j < count($simulation[$i]) ; $j++ ){ 
											$equip = $simulation[$i][$j];
										?>
											<tr class="rows">
												<td class="column text-center">
													
													<?php echo $j + 1 ; ?>
												</td>
												<td class="column text-center"> 
													
													<?php echo $equip['nomEquipe'] ?>
												</td>
												<td class="column text-center"> 
													
													<?php echo $equip['Points'] ?>
												</td>
												<td class="column text-center"> 
													<img src="./assets/img/<?php echo $equip['image'] ?>" alt="" class="img-fluid myimg">
													
												</td>
											</tr>

										<?php }
									?>
									
								</table>
								<div class="panel-footer fs-4">
									<a href="./php/ListMatch.php?idPool=<?php echo $poolName[$i]['idPool'] ?>" class="btn btn-success">
										Voir les resultats des matchs
									</a>
								</div>
							</div>
						</div>

				<?php }

			?>

		</div>


		<!--  -->



		<footer class="footer text-center text-secondary p-3 border-top fs-4">
			Made by ETU002032 , ETU001969 , ETU002069
		</footer>

	</div>

	<script src="./assets/dist/js/jquery.min.js"></script>
	<script src="./assets/dist/js/bootstrap.min.js"></script>
</body>
</html>