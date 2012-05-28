<?php 

	class Form {
	
		public function Main() {
		
			$fm = "";
			
			$fm .= "<form id='form' action='" . htmlentities($_SERVER['PHP_SELF']) . "' method='get'>
			<div id='spelare'>Spelare: <input type='text' name='p1' /><br /></div>
			<div><p id='nojs'>Du måste aktivera Javascript för att lägga till fler spelare.</p></div>
			<input type='submit' value='Submit' />
			</form>";
		
			return($fm);
		
		}
	
	}

?>