<?php 
    include("./inc/function.php");
    include("./inc/connection.php");

    $huitOuest = getFromBlockOuest( connect() , 8 );
    $huitEst = getFromBlockEst( connect() , 8 );

    $quatreOuest = getFromBlockOuest( connect() , 4 );
    $quatreEst = getFromBlockEst( connect() , 4 );

    $demiOuest = getFromBlockOuest( connect() , 2 );
    $demiEst = getFromBlockEst( connect() , 2 );

    $finaleOuest = getOuestChampion(connect());
    $finaleEst = getEstChampion(connect());

    $resultats = getFinalMatch(connect());
    $winner = getMondialWinner( connect() );
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Style.css">
    <title>Liste des Matchs</title>

</head>
<body>
<div class="dd">    
    <div class="container">
        <div class="list-group row east container">

            <!-- pool Est -->
            <h2 class="text-center text-underlined">
                <u>
                    Pool Est
                </u>
            </h2>
            <div class="row SetPrediction text-center">
                <a href="reset.php" class="btn btn-primary">
                    Reset Result
                </a>
            </div>
            <!-- manomboka eto amin'izay no bouclena -->

            <div class="col-md-4 offset-md-1 shadow mb-5 bg-body rounded transit" >
                <div class="panel panel-success ">
                    <div class="panel-heading hh" style=" background-color:rgb(173, 78, 14);">
                        <h2 class="panel-title text-center" style=" font-weight: bold; color:Black;">
                            Huitieme de Finale (Est le 3 et 5 Decembre)
                       </h2>
                    </div>
                    <table class="table">
                        <th class="titles text-center">Equipe 1</th>
                        <th class="titles text-center">Equipe 2</th>
                            <?php 
                                for( $i = 0 ; $i < count($huitOuest) - 1 ; $i+=2 ){ ?>
                                    <tr class="rows">
                                        <td class="column" style="background-color: <?php echo $huitOuest[$i]['bgc']?>;">
                                            <?php echo $huitOuest[$i]['nomEquipe']  ?>
                                        </td>
                                        <td class="column" style="background-color: <?php echo $huitOuest[$i+1]['bgc']?>;"> 
                                            <?php echo $huitOuest[$i+1]['nomEquipe']  ?>
                                        </td>                                    
                                    </tr>

                                <?php }

                            ?>
                                    
                    </table>
                                
                </div>
            </div>


            <div class="col-md-4 offset-md-1 shadow  mb-5 bg-body rounded transit" >
                <div class="panel panel-success ">
                    <div class="panel-heading hh" style=" background-color:rgb(173, 78, 14);">
                        <h2 class="panel-title text-center" style=" font-weight: bold; color:Black;">
                            Quart de Finale ( Le 9 Decembre )
                        </h2>
                    </div>
                    <table class="table">
                        <th class="titles text-center">Equipe 1</th>
                        <th class="titles text-center">Equipe 2</th>
                            <?php 
                                for( $i = 0 ; $i < count($quatreOuest) - 1 ; $i+=2 ){ ?>
                                    <tr class="rows">
                                        <td class="column" style="background-color: <?php echo $quatreOuest[$i]['bgc']?>;">
                                            <?php echo $quatreOuest[$i]['nomEquipe']  ?>
                                            </td>
                                        <td class="column" style="background-color: <?php echo $quatreOuest[$i+1]['bgc']?>;"> 
                                            <?php echo $quatreOuest[$i+1]['nomEquipe']  ?>
                                        </td>
                                    </tr>
                                <?php }

                            ?>

                    </table>            
                </div>
            </div>    
            <div class="col-md-4 offset-md-1 shadow  mb-5 bg-body rounded transit" >
                <div class="panel panel-success ">
                    <div class="panel-heading hh" style=" background-color:rgb(173, 78, 14);">
                        <h2 class="panel-title text-center" style=" font-weight: bold; color:Black;">
                            Demi-Finale ( 13 Decembre )
                        </h2>
                    </div>
                    <table class="table">
                        <th class="titles text-center">Equipe 1</th>
                        <th class="titles text-center">Equipe 2</th>
                            <?php 
                                for( $i = 0 ; $i < count($demiOuest) - 1 ; $i+=2 ){ ?>
                                    <tr class="rows">
                                        <td class="column" style="background-color: <?php echo $demiOuest[$i]['bgc']?>;">
                                            <?php echo $demiOuest[$i]['nomEquipe']  ?>
                                        </td>
                                        <td class="column" style="background-color: <?php echo $demiOuest[$i+1]['bgc']?>;"> 
                                            <?php echo $demiOuest[$i+1]['nomEquipe']  ?>
                                        </td>
                                
                                    </tr>

                            <?php }

                            ?>
                                
                    </table>
                </div>
            </div>

            <br>
            <br>
        </div>    
        <div class="list-group west row">
            <!-- poule Ouest -->
            <h2 class="text-center text-underlined row">
                <u>
                    Pool Ouest
                </u>
            </h2>
            <div class="col-md-4 offset-md-1 shadow row mb-5 bg-body rounded transit" >
                <div class="panel panel-success ">
                    <div class="panel-heading hh" style=" background-color:rgb(173, 78, 14);">
                        <h2 class="panel-title text-center" style=" font-weight: bold; color:Black;">
                            Huitieme de Finale ( Le 4 et 6 Decembre)
                        </h2>
                    </div>
                    <table class="table">
                        <th class="titles text-center">Equipe 1</th>
                        <th class="titles text-center">Equipe 2</th>
                            <?php 
                                for( $i = 0 ; $i < count($huitEst) - 1 ; $i+=2 ){ ?>
                                    <tr class="rows">
                                        <td class="column" style="background-color: <?php echo $huitEst[$i]['bgc']?>;">
                                            <?php echo $huitEst[$i]['nomEquipe']  ?>
                                        </td>
                                        <td class="column" style="background-color: <?php echo $huitEst[$i+1]['bgc']?>;"> 
                                            <?php echo $huitEst[$i+1]['nomEquipe']  ?>
                                        </td>
                                        <!-- <td class="column"> 
                                            
                                            </td> -->
                                    </tr>

                                <?php }

                            ?>
                    </table>                        
                </div>
            </div>
            <div class="col-md-4 offset-md-1 shadow  mb-5 bg-body rounded transit" >
                <div class="panel panel-success ">
                    <div class="panel-heading hh" style=" background-color:rgb(173, 78, 14);">
                        <h2 class="panel-title text-center" style=" font-weight: bold; color:Black;">
                            Quart de Finale (Le 10 Decembre)
                        </h2>
                    </div>
                    <table class="table">
                                        <!-- <th class="titles">Classement</th> -->
                        <th class="titles text-center">Equipe 1</th>
                        <th class="titles text-center">Equipe 2</th>
                                        <!-- <th class="titles">Points</th> -->

                            <?php 
                                for( $i = 0 ; $i < count($quatreEst) - 1 ; $i+=2 ){ ?>
                                    <tr class="rows">
                                        <td class="column" style="background-color: <?php echo $quatreEst[$i]['bgc']?>;">
                                            <?php echo $quatreEst[$i]['nomEquipe']  ?>
                                        </td>
                                        <td class="column" style="background-color: <?php echo $quatreEst[$i+1]['bgc']?>;"> 
                                            <?php echo $quatreEst[$i+1]['nomEquipe']  ?>
                                        </td>
                                                <!-- <td class="column"> 
                                                    
                                                </td> -->
                                    </tr>
                                <?php }

                            ?>
                    </table>
                           
                </div>
            </div>
            <div class="col-md-4 offset-md-1 shadow  mb-5 bg-body rounded transit" >
                <div class="panel panel-success ">
                    <div class="panel-heading hh" style=" background-color:rgb(173, 78, 14);">
                        <h2 class="panel-title text-center" style=" font-weight: bold; color:Black;">
                            Demi-Finale (Le 14 Decembre)
                        </h2>
                    </div>
                    <table class="table">
                        <th class="titles text-center">Equipe 1</th>
                        <th class="titles text-center">Equipe 2</th>
                    <?php 
                        for( $i = 0 ; $i < count($demiEst) - 1 ; $i+=2 ){ ?>
                            <tr class="rows">
                                <td class="column" style="background-color: <?php echo $demiEst[$i]['bgc']?>;">
                                    <?php echo $demiEst[$i]['nomEquipe']  ?>
                                </td>
                                <td class="column" style="background-color: <?php echo $demiEst[$i+1]['bgc']?>;"> 
                                    <?php echo $demiEst[$i+1]['nomEquipe']  ?>
                                </td>
                           
                            </tr>

                        <?php }

                    ?>
                                        
                    </table>
                </div>
            </div>
        </div>  

        <div class=" list-group row container">   
            <h2 class="text-center text-underlined">    
                Finale Coupe Du Monde
            </h2>   
            <div class="col-md-4 offset-md-1 shadow  mb-5 bg-body rounded transit" > 
                <div class="panel panel-success ">
                    <div class="panel-heading hh" style=" background-color:rgb(173, 78, 14);">
                        <h2 class="panel-title text-center" style=" font-weight: bold; color:Black;">
                            Finale ( 18 Decembre )
                        </h2>
                    </div>
                    <table class="table">
                        <th class="titles text-center">Equipe 1</th>
                        <th class="titles text-center">Equipe 2</th>
                       <tr class="rows">
                           <td class="column" style="background-color: <?php echo $finaleOuest['bgc']?>;"> 
                               <?php echo $finaleOuest['nomEquipe']; ?>
                           </td>
                           <td class="column" style="background-color: <?php echo $finaleEst['bgc']?>;"> 
                               <?php echo $finaleEst['nomEquipe']; ?>
                                               
                           </td>
                       </tr>
                    </table>
                                
                </div>                  
            </div>
        </div> 
            
        <div class="resultat row">
                Le resultat du match : 
                <div class="panel panel-success">
                    <div class="panel-heading">
    				    <h2 class="panel-title text-center">
    					   Resultat :
    				    </h2>
                    </div>
    			    <table class="table text-center">
    				    <th class="title text-center">Equipe1</th>
    				    <th class="title text-center">Score</th>
    				    <th class="title text-center">Equipe2</th>
    				    <tr>
                            <td>    
    						  <?php echo $resultats[0]['e1']; ?>      
                            </td>
                            <td>
    						  <?php echo $resultats[0]['score']; ?>
          					</td>
                            <td>
    						  <?php echo $resultats[0]['e2']; ?>
                                  
                            </td>
    				    </tr>
                    </table>
                </div>
        </div>
        <div class="vainqueur row"> 

        	<div class="panel panel-success">
        			<div class="panel-heading">
        				<h2 class="panel-title text-center">
        					Le vainquer du Mondial est :
        				</h2>
        			</div>
        			<div class="panel-body text-center fs-4">
        				<?php echo  $winner['nomEquipe'] ?>
        			</div>
        	</div>
        </div>
            <footer class="footer text-center text-secondary p-3 border-top fs-4">
                Made by ETU002032 , ETU001969 , ETU002069
            </footer>
    </div>
</div>

    <script src="./assets/dist/js/jquery.min.js"></script>
    <script src="./assets/dist/js/jquery.min.js"></script>
    <script src="./assets/dist/js/bootstrap.min.js"></script>
    <script src="./assets/dist5/js/bootstrap.min.js"></script>
</body>
</html