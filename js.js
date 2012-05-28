function addOption() {
	
	player = 1;
	
	var x = document.getElementById('nojs');
	var xp = x.parentNode;
	xp.removeChild(x);
	xp.innerHTML = "<p id='lt' onclick=addPlayer() >Lägg till spelare</p>";
	
}

function addPlayer() {
	
	player++;
	
	var nodestr = "Spelare: <input type='text' name='p" + player +  "' /><br />";
	var f = document.getElementById('spelare');
	f.innerHTML += nodestr;
	
}

window.onload = addOption;