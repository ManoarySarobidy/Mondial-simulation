	<?php
	
	function getAllEquip($pdo){
		$query = "Select * from Equipe join Pool on Equipe.idPool = Pool.idPool order by Pool.idPool";
		$query = $pdo->query($query);
		$valiny = $query->fetchAll(PDO::FETCH_ASSOC);
		$query->closeCursor();
		return $valiny;
	}

	function getPool( $pdo ){
		$query = "Select * from pool";
		$query = $pdo->query($query);
		$valiny = $query->fetchAll(PDO::FETCH_ASSOC);
		$query->closeCursor();
		return $valiny;
	}

	function getEquipePerPool( $pdo ){
		$allEquip = getAllEquip( $pdo );
		$pools = createPool( $allEquip );
		return $pools;
	}

	function createPool( $allEquip ){
		$Pool = array();
		$temp = array();

		foreach( $allEquip as $equip ){
			$temp[] = $equip;
			if( count( $temp ) == 4 ){
				$Pool[] = $temp;
				$temp = array();
			}
		}
		return $Pool;
	}

	// i

	function setMatch( $currentGroupe , $pdo ){
		// currentGroupe = tableaux d'equipe
		for( $i = 0 ; $i < count($currentGroupe) ; $i++ ){
			
			// get Player 1 from the array player
			$player = $currentGroupe[$i];

			for( $j = $i + 1 ; $j < count($currentGroupe) ; $j++ ){
				// get PLayer 2 from the array player
				$player2 = $currentGroupe[$j]; 
				
				// all points from database
				$points = getUserPoints( $player['idEquipe'] , $pdo ); 
				$points2 = getUserPoints( $player2['idEquipe'] , $pdo );

				// generate random score : score1 for player 1 and score2 for player 2
				$score1 = randomScore( 0 , 7 );
				$score2 = randomScore( 0 , 7 );

				// eto amin'izay le mi-check win
				$allPoints = checkWinOrLose( $score1 , $score2 );

				// index 0 is for the player one and index 1 is for the player two

				$points += $allPoints[0];
				$points2 += $allPoints[1];

				// rehefa avy ampitomboiko ilay points de sauveko ilay match

				// asehoko ilay score sous forme x - y
				$score = $score1." - ".$score2;

				insertMatch( $player['idEquipe'] , $player2['idEquipe'] , $score , $pdo );
				$latestMatch = getLastMatchId( $pdo );
				// // mila insert score iany koa
				insertScore( $score1 , $score2 , $latestMatch , $pdo );
				// // mila miupdate anle points farany selon anle equipe
				updatePoints( $player['idEquipe'] , $score1 , $pdo );
				updatePoints( $player2['idEquipe'] , $score2 , $pdo );

			}
		}

	}

	// rehefa avy eo dia ordonena par points amin'izay ry zareo

	function getPrediction( $pdo ){
		// rehefa tonga eto dia alaiko ny equipe rehetra par classement aloha
		$pools = getEquipePerPool($pdo);
		foreach( $pools as $pool ){
			setMatch( $pool , $pdo );
		}
		// zay ihany no eto de vita de atsoiko fotsiny amzay le getClassement
		$classement = getClassement( $pdo );
		return $classement;
	}

	function getClassement( $pdo ){
		$query = " Select * from Equipe join Pool on Equipe.idPool = Pool.idPool order by Pool.idPool asc , Equipe.Points desc ";
		$query = $pdo->query( $query );
		$valiny = $query->fetchAll(PDO::FETCH_ASSOC);
		$valiny = createPool( $valiny );
		$query->closeCursor();

		return $valiny;
	}

	// mila bouton reinitialiser koa amin'izay

	function resets( $pdo ){
		$match = "Delete from exhibition";
		$score = "Delete from score";
		$points = "Update Equipe set points = 0";
		$pdo->exec( $score );
		$pdo->exec( $match );
		$pdo->exec( $points );
	}

	function getUserPoints( $idEquipe , $pdo ){
		$query = "Select Points from Equipe where idEquipe = '%s'";
		$query = sprintf( $query , $idEquipe );
		$query = $pdo->query( $query );
		$valiny = $query->fetchAll(PDO::FETCH_ASSOC);
		$valiny = $valiny[0]['Points'];
		$query->closeCursor();
		return $valiny;
	}

	function checkWinOrLose( $player1 , $player2 ){
		if( $player1 > $player2 ){
			return [ 3 , 0 ];
		}elseif ( $player1 == $player2 ) {
			return [ 1 , 1 ];
		}elseif( $player2 > $player1 ){
			return [ 0 , 3 ];
		}
	}

	function updatePoints( $idEquipe , $score , $pdo ){
		$query = " Update equipe set Points = %d where idEquipe = '%s'";
		$query = sprintf( $query , $score , $idEquipe );
		$pdo->exec( $query );
	}

	function insertMatch( $idEquipe1 , $idEquipe2 , $score , $pdo){
		$query = "insert into Exhibition( idEquipe1 , idEquipe2 , score ) values ( '%s' , '%s' ,'%s' )";
		$query = sprintf( $query , $idEquipe1 , $idEquipe2 , $score );
		$pdo->exec( $query );
	}

	function getLastMatchId( $pdo ){
		$query = "select idMatch from exhibition order by idMatch desc";
		$query = $pdo->query($query);
		$valiny = $query->fetchAll(PDO::FETCH_ASSOC);
		$valiny = $valiny[0]['idMatch'];
		$query->closeCursor();
		return $valiny;
	}

	function insertScore( $score1 , $score2 , $idMatch , $pdo){
		$query = "insert into score( score1 , score2 , idMatch ) values ( %d , %d , %d)";
		$query = sprintf( $query , $score1 , $score2 , $idMatch );
		$pdo->exec( $query );
	}

	function getSpecificPool($idPool , $pdo){
		$query = "select poolName from pool where idPool = '%s'";
		$query = sprintf($query,$idPool);
		$query = $pdo->query($query);
		$valiny = $query->fetchAll(PDO::FETCH_ASSOC);
		$valiny = $valiny[0]['poolName'];
		$query->closeCursor();
		return $valiny;		
	}

	function getMatchPerGroup( $idPool , $pdo ){
		$query = "Select * from matchperteam as m
					JOIN pool on
					m.idPool = pool.idPool
					where m.idPool = '%s'
					";
		$query = sprintf( $query, $idPool);
		$query = $pdo->query($query);
		$valiny = $query->fetchAll(PDO::FETCH_ASSOC);
		$query->closeCursor();
		return $valiny;
	}

	// mety ny maka an'ilay two best players
	function setNewClassement($pdo){
		$currClassement = getClassement($pdo);
		// azo ny classement de averina any daholo
		$newClassement = array();

		for( $i = 0 ; $i < count($currClassement) ; $i++ ){
			$bests = getTwoBestPlayer( $currClassement[$i] );
			$newClassement[] = $bests;
		}
		return $newClassement;
	}

	// rehefa mi init
	function initBlock( $pdo ){
		// $query = "Insert into blockWest values ( 'idEquipe' , 'date' , 8 )";
		// $query = "Insert into blockEast values ( 'idEquipe' , 'date' , 8 )";

		$classement = getClassement( $pdo );
		for( $i = 0 ; $i < count($classement) ; $i += 2 ){
			$bestCoup1 = getTwoBestPlayer( $classement[$i] );
			$bestCoup2 = getTwoBestPlayer( $classement[$i+1] );

			$insertWest = "Insert into BlockOuest values ( '%s' , 'Huitieme de finale : 3 et 5 decembre' , 8 )";
			$insertEast = "Insert into BlockEst values ( '%s' , 'Huitieme de finale : 4 et 6 decembre' , 8 )";

			$insert1 = sprintf( $insertWest , $bestCoup1[0]['idEquipe'] );
			$insert2 = sprintf( $insertWest , $bestCoup2[1]['idEquipe'] );
			
			$insert3 = sprintf( $insertEast , $bestCoup2[0]['idEquipe'] );
			$insert4 = sprintf( $insertEast , $bestCoup1[1]['idEquipe'] );

			$pdo->exec($insert1);
			$pdo->exec($insert2);

			$pdo->exec($insert3);
			$pdo->exec($insert4);

		}
	}

	// azoko amin'izay ny ao amin'ny block rehetra de afaka manao insert bbobaka be amzay

	function setChampionOuest( $pdo , $value , $type , $details , $index){
		$select = getFromBlockOuest( $pdo , $type );
		if( $type == 1 ) return;
		for( $i = 0 ; $i < count($select)-1; $i+=2 ){
			$score1 = randomScore( 0 , 7);
			$score2 = randomScore( 0 , 7 );
			$idGagnant = 0;
			$idEquipe1 = $select[$i]['idEquipe'];
			$idEquipe2 = $select[$i+1]['idEquipe'];
			// mila ampidirina anaty match aloha ianareo eh afahako manoratra ho anareo
			if( $score1 > $score2 ){
				$idGagnant = $idEquipe1;
			}elseif ($score1 < $score2) {
				$idGagnant = $idEquipe2;
			}elseif( $score1 == $score2 ){
				$idGagnant = $select[rand($i,$i+1)]['idEquipe'];
			}
			$insert = "insert into blockOuest values( '%s' , '%s' , %d)";
			$insert = sprintf($insert , $idGagnant , $details[$index] , $type / 2);
			$pdo->exec( $insert );
		}
		setChampionOuest( $pdo , $value , $type / 2 , $details,$index + 1 );
	}
	function setChampionEst( $pdo , $value , $type , $details , $index){
		$select = getFromBlockEst( $pdo , $type );
		if( $type == 1 ) return;
		for( $i = 0 ; $i < count($select)-1; $i+=2 ){
			$score1 = randomScore( 0 , 7);
			$score2 = randomScore( 0 , 7);
			$idGagnant = 0;
			$idEquipe1 = $select[$i]['idEquipe'];
			$idEquipe2 = $select[$i+1]['idEquipe'];
			if( $score1 > $score2 ){
				$idGagnant = $idEquipe1;
			}elseif ($score1 < $score2) {
				$idGagnant = $idEquipe2;
			}elseif( $score1 == $score2 ){
				$idGagnant = $select[rand($i,$i+1)]['idEquipe'];
			}
			$insert = "insert into blockEst values( '%s' , '%s',%d)";
			$insert = sprintf($insert , $idGagnant , $details[$index] , $type / 2);
			$pdo->exec( $insert );
		}
		setChampionEst( $pdo , $value , $type / 2 , $details ,$index + 1 );
	}
	// maka ny champion ao amin'ny Est
	function getEstChampion( $pdo ){
		$select = "Select * from blockEst as b join equipe on b.idEquipe = equipe.idEquipe join pool on pool.idPool = equipe.idPool where types = 1";
		$select = $pdo->query($select);
		$valiny	= $select->fetchAll(PDO::FETCH_ASSOC);
		$valiny = $valiny[0];
		return $valiny;
	}
	// maka ny champion ao amin'ny Ouest
	function getOuestChampion( $pdo ){
		$select = "Select * from blockOuest as b join equipe on b.idEquipe = equipe.idEquipe join pool on pool.idPool = equipe.idPool where types = 1";
		$select = $pdo->query($select);
		$valiny	= $select->fetchAll(PDO::FETCH_ASSOC);
		$valiny = $valiny[0];
		return $valiny;
	}

	function initMondiale( $pdo ){
		// $class = getClassement( $pdo );
		initBlock( $pdo );
		$events = ['Quarts de finale 9 decembre' , 'Demi finale 13 decembre' , 'Finale 18 decembre'];
		$events2 = ['Quarts de finale 10 decembre' , 'Demi finale 14 decembre' , 'Finale 18 decembre'];
		setChampionEst( $pdo , 0 , 8 , $events2 , 0 );
		setChampionOuest( $pdo , 0 , 8 , $events , 0 );

		// manao mle finale fotsiny amzay

		$finalistOuest = getOuestChampion($pdo); //objet no ato
		$finalistEst = getEstChampion($pdo); // objet no ato

		makeWinner( $pdo , $finalistOuest['idEquipe'] , $finalistEst['idEquipe'] );

	}

	function getMondialWinner( $pdo ){
		$query = "select * from cdmWinner join equipe on cdmWinner.idEquip = equipe.idEquipe";
		$query = $pdo->query($query);
		$valiny = $query->fetchAll(PDO::FETCH_ASSOC);
		$valiny = $valiny[0];
		$query->closeCursor();
		return $valiny;
	}

	// alaina ny score mondial farany

	function getFinalMatch( $pdo ){
		$query = "select * from finals";
		$query = $pdo->query($query);
		$valiny = $query->fetchAll(PDO::FETCH_ASSOC);
		$valiny = $valiny;
		$query->closeCursor();
		return $valiny;
	}



	function makeWinner($pdo , $id1 , $id2){
		$score1 = randomScore( 0 , 7);
		$score2 = randomScore( 0 , 7);
		$score = $score1." - ".$score2;
		$idGagnant = "";
		if( $score1 > $score2 ){
			$idGagnant = $id1;
		}elseif ($score1 < $score2) {
			$idGagnant = $id2;
		}elseif( $score1 == $score2 ){
			$tab = [ $id1 , $id2 ];
			$idGagnant = $tab[rand(0,1)] ;
		}
		// enregistrena amzay izy
		insertFinalMatch( $pdo , $id1 , $id2 , $score );
		insertWinner( $pdo , $idGagnant );

	}

	function insertFinalMatch($pdo , $idE1 , $idE2 , $score){
		$insert = "insert into finalMatch values ( '%s' , '%s' , '%s' )";
		$insert = sprintf($insert , $idE1 , $idE2 , $score);
		$pdo->exec( $insert );
	}
	function insertWinner( $pdo , $idWinner ){
		$insert = "insert into cdmWinner(idEquip) values ( '%s' )";
		$insert = sprintf( $insert , $idWinner );
		$pdo->exec( $insert );
	}

	function getFromBlockOuest( $pdo , $type ){
		$select = " Select DISTINCT * from blockOuest as b join equipe on b.idEquipe = equipe.idEquipe join pool on pool.idPool = equipe.idPool where types = %d";
		$select = sprintf( $select , $type );
		$select = $pdo->query( $select );
		$valiny = $select->fetchAll(PDO::FETCH_ASSOC);
		$select->closeCursor();
		return $valiny;
	}
	function getFromBlockEst( $pdo , $type ){
		$select = " Select DISTINCT * from blockEst as b join equipe on b.idEquipe = equipe.idEquipe join pool on pool.idPool = equipe.idPool where types = %d";
		$select = sprintf( $select , $type );
		$select = $pdo->query( $select );
		$valiny = $select->fetchAll(PDO::FETCH_ASSOC);
		$select->closeCursor();
		return $valiny;	
	}

	function getAllFromOuest($pdo){
		$select = " Select DISTINCT *  from blockOuest as b join equipe on b.idEquipe = equipe.idEquipe join pool on pool.idPool = equipe.idPool ";
		$select = $pdo->query( $select );
		$valiny = $select->fetchAll(PDO::FETCH_ASSOC);
		$select->closeCursor();
		return $valiny;	
	}
	function getAllFromEst($pdo){
		$select = " Select DISTINCT * from blockEst as b join equipe on b.idEquipe = equipe.idEquipe join pool on pool.idPool = equipe.idPool";
		$select = $pdo->query( $select );
		$valiny = $select->fetchAll(PDO::FETCH_ASSOC);
		$select->closeCursor();
		return $valiny;	
	}


	function getTwoBestPlayer( $pool ){
		$best = array();
		for( $j = 0 ;  $j < count($pool) ; $j++ ){
			$best[] = $pool[$j];
			if( count($best) == 2 ){
				return $best;
			}
		}
	}

	// rehefa avy migenerer anle Groupe de omena any izy igenerena match par equipe par pool

	function randomScore( $min , $max ){
		// ito no migenerer score de but hoe firy atramin'ny firy
		return rand( $min , $max );
	}

	function setThirdPlacesMatch( $pdo ){
		$est = getSecondEst($pdo);		
		$ouest = getSecondOuest($pdo);
		$score1 = randomScore( 0 , 7 );
		$score2 = randomScore( 0 , 7 );
		$idGagnant = 0;
		$idEquipe1 = $est['idEquipe'];
		$idEquipe2 = $ouest['idEquipe'];
		if( $score1 > $score2 ){
			$idGagnant = $idEquipe1;
		}elseif ($score1 < $score2) {
			$idGagnant = $idEquipe2;
		}elseif( $score1 == $score2 ){
			$select = [$idEquipe1 , $idEquipe2];
			$idGagnant = $select[rand(0,1)];
		}

		// insert into third places
		insertThird( $pdo , $idGagnant );

		// mila jerena amzay 
	}

	function getThirdPlaces( $pdo ){
			$third = " Select * from thirdplace as p join equipe e on e.idEquipe = p.idEquipe ";	
			$query = $pdo->query( $third );
			$valiny = $query->fetchAll(PDO::FETCH_ASSOC);
			$valiny = $valiny[0];
			$query->closeCursor();
			return $valiny;
	}

	function insertThird( $pdo , $idEquipe ){
		$insert = "insert into thirdplace(idEquipe) values( '%s' )";
		$insert = sprintf($insert , $idEquipe);
		$pdo->exec( $insert );
	}

	function getSecondEst( $pdo ){
		$thirdEst = " Select b.idEquipe as id, e.nomEquipe as nom from blockEst as b join Equipe as e on e.idEquipe = b.idEquipe where types = 2 order by types and idEquipe not in(Select idE from winnerest) ";
		$thirdEst = $pdo->query( $thirdEst );
		$valiny = $thirdEst->fetchAll(PDO::FETCH_ASSOC);
		$valiny = $valiny[0];
		return $valiny;

	}
	function getSecondOuest( $pdo ){
		$thirdOuest = " Select b.idEquipe as id, e.nomEquipe as nom from blockOuest as b join Equipe as e on e.idEquipe = b.idEquipe where types = 2 order by types and idEquipe not in(Select idE from winnerOuest) ";
		$thirdOuest = $pdo->query( $thirdOuest );
		$valiny = $thirdOuest->fetchAll(PDO::FETCH_ASSOC);
		$valiny = $valiny[0];
		return $valiny;

	}

	function resetss( $pdo){
		$query1 = "delete from blockOuest"; 
		$query2 = "delete from blockEst"; 
		$query3 = "delete from finalMatch"; 
		$query4 = "delete from cdmWinner";
		$pdo->exec($query1);
		$pdo->exec($query2);
		$pdo->exec($query3);
		$pdo->exec($query4);
	}


