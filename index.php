<?php

	include("./php/inc/connection.php");
	include("./php/inc/function.php");

	$pools = getEquipePerPool( connect() );
	$poolName = getPool(connect());
	
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
			<h2 class="text-center text-white text-underlined pt-4">
				<u>
					Liste des Groupes
				</u>
			</h2>
			<div class="SetPrediction text-center mt-4">

				<a href="Match.php" class="btn btn-dark py-3 px-5 rounded-pill">
					See Random result
				</a>
			</div>
			<!-- manomboka eto amin'izay no bouclena -->
			<?php 
				for( $i = 0 ; $i < count($pools) ; $i++ ){ ?>
						<div class="col-md-4 offset-md-1 fs-4">
							<div class="panel border-bottom shadow my-5 bg-body rounded transit ">
								<div class="panel-heading ">
									<h2 class="panel-title text-dark text-center fw-bolder">
										<?php echo $poolName[$i]['poolName']; ?>
									</h2>
								</div>
								<table class="table">
									<th class="titles">Classement</th>
									<th class="titles">Nom d'equipe</th>
									<th class="titles">Points</th>
									<th class="titles">Flags</th>

									<?php 
										for( $j = 0 ; $j < count($pools[$i]) ; $j++ ){ 
											$equip = $pools[$i][$j];
										?>
											<tr class="rows">
												<td class="column">
													<?php echo $j + 1 ; ?>
												</td>
												<td class="column"> 
													<?php echo $equip['nomEquipe'] ?>
												</td>
												<td class="column"> 
													<?php echo $equip['Points'] ?>
												</td>
												<td class="column"> 
													<img src="./assets/img/<?php echo $equip['image'] ?>" alt="" class="img-fluid myimg">
												</td>
											</tr>

										<?php }
									?>
									
								</table>
							</div>
						</div>

				<?php }

			?>


		</div>

		<footer class="footer text-center text-secondary p-3 border-top fs-4">
			Made by ETU002032 , ETU001969 , ETU002069
		</footer>
		
	</div>

	<script src="./assets/dist/js/jquery.min.js"></script>
	<script src="./assets/dist/js/bootstrap.min.js"></script>
</body>
</html>