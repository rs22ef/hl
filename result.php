<?php 

	class Result {
	
		public function Main() {

			function sortpl($pl1,$pl2) {
			
				$tempsort = 0;
				if ($pl1[1][9] < $pl2[1][9]) {$tempsort = 1;}
				if ($pl1[1][9] > $pl2[1][9]) {$tempsort = -1;}
				return $tempsort;
				
			}
		
			$rm = "";
			$playernum = 1;
			$pnstring = 'p' . $playernum;
			
			$output = array();
			
			$rm .= "<table border='1' width='800px'>
					<thead><tr>
					<th>Spelare</th>
					<th colspan='2'>1</th>
					<th colspan='2'>2</th>
					<th colspan='2'>3</th>
					<th colspan='2'>4</th>
					<th colspan='2'>5</th>
					<th colspan='2'>6</th>
					<th colspan='2'>7</th>
					<th colspan='2'>8</th>
					<th colspan='2'>9</th>
					<th colspan='3'>10</th>
			</tr></thead>
			<tbody>";
			
			while (isset($_GET[$pnstring])) {
			
				$player = $_GET[$pnstring];
				$score = array();
				$schar = array();
				$round = array();
				$total = array();
				
				for ($i=0;$i<21;$i++) {
				
					$ball = rand(-2,13);
					$bc = "";
					
					if ($ball < 0) {$ball = 0;}
					if ($ball > 10) {$ball = 10;}
					
					if ($i < 18 && $i % 2 == 1) {
						if ($ball + $score[$i - 1] >= 10) {$ball = 10 - $score[$i - 1]; $bc = "/";}
						if ($score[$i - 1] == 10) {$bc = " ";}
					}
					if ($i == 19) {
						if ($score[18] < 10) {
							if ($ball + $score[18] >= 10) {$ball = 10 - $score[18]; $bc = "/";}
						}
					}
					if ($i == 20) {
						if ($score[18] + $score[19] < 10) {$ball = 0; $bc = " ";}
						if ($score[18] == 10 && $score[19] < 10) {
							if ($ball + $score[19] >= 10) {$ball = 10 - $score[19]; $bc = "/";}
						}
					}
					
					if ($bc == "") {
						if ($ball == 10) {$bc = "X";}
						if ($ball == 0) {$bc = "-";}
					}
					if ($bc == "") {$bc = $ball;}
					
					array_push($score,$ball);
					array_push($schar,$bc);				
				}
				
				for ($i=0;$i<10;$i++) {
				
					$points = $score[$i*2] + $score[$i*2+1];
					
					if ($i < 9 && $points == 10) {
						if ($score[$i*2] < 10) {$points += $score[$i*2+2];}
						if ($score[$i*2] == 10) {
							$points += $score[$i*2+2];
							if ($score[$i*2+2] == 10 && $i < 8) {$points += $score[$i*2+4];}
															else{$points += $score[$i*2+3];}
						}
					}
					
					if ($i == 9) {$points += $score[20];}
					
					if ($i > 0) {$points += $round[$i - 1];}
					
					array_push($round,$points);

				}
					
				array_push($total,$schar);
				array_push($total,$round);
				array_push($total,$player);
				$output[$player] = $total;
				
				$playernum++;
				$pnstring = 'p' . $playernum;
				
			}
			
			uasort($output,"sortpl");
			
			foreach ($output as $pl) {
				
				$rm .= "<tr><td rowspan='2' style='width:86px'>" . $pl[2] . "</td>
				<td style='width:34px'>" . $pl[0][0] . "</td>
				<td style='width:34px'>" . $pl[0][1] . "</td>
				<td style='width:34px'>" . $pl[0][2] . "</td>
				<td style='width:34px'>" . $pl[0][3] . "</td>
				<td style='width:34px'>" . $pl[0][4] . "</td>
				<td style='width:34px'>" . $pl[0][5] . "</td>
				<td style='width:34px'>" . $pl[0][6] . "</td>
				<td style='width:34px'>" . $pl[0][7] . "</td>
				<td style='width:34px'>" . $pl[0][8] . "</td>
				<td style='width:34px'>" . $pl[0][9] . "</td>
				<td style='width:34px'>" . $pl[0][10] . "</td>
				<td style='width:34px'>" . $pl[0][11] . "</td>
				<td style='width:34px'>" . $pl[0][12] . "</td>
				<td style='width:34px'>" . $pl[0][13] . "</td>
				<td style='width:34px'>" . $pl[0][14] . "</td>
				<td style='width:34px'>" . $pl[0][15] . "</td>
				<td style='width:34px'>" . $pl[0][16] . "</td>
				<td style='width:34px'>" . $pl[0][17] . "</td>
				<td style='width:34px'>" . $pl[0][18] . "</td>
				<td style='width:34px'>" . $pl[0][19] . "</td>
				<td style='width:34px'>" . $pl[0][20] . "</td>
				</tr>
				<tr>
				<td colspan='2'>" . $pl[1][0] . "</td>
				<td colspan='2'>" . $pl[1][1] . "</td>
				<td colspan='2'>" . $pl[1][2] . "</td>
				<td colspan='2'>" . $pl[1][3] . "</td>
				<td colspan='2'>" . $pl[1][4] . "</td>
				<td colspan='2'>" . $pl[1][5] . "</td>
				<td colspan='2'>" . $pl[1][6] . "</td>
				<td colspan='2'>" . $pl[1][7] . "</td>
				<td colspan='2'>" . $pl[1][8] . "</td>
				<td colspan='3'>Slutpoäng:" . $pl[1][9] . "</td>
				</tr>";
			
			}
			
			$rm .= "</tbody>
					</table>";
			
			$rm .= "
					<p><a href='index.php'>Tillbaka</a></p>";
		
			return($rm);
		
		}
	
	}

?>