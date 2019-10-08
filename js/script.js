function bloca(id){

	var div = document.getElementById(id);
	var divb = document.getElementById('formb');

	divb.style.display = 'none';
	if(div.style.display == 'none'){
		div.style.display = 'block';
		
	}
} 

function blocb(id){

	var div = document.getElementById(id);
	var divb = document.getElementById('forma');
	
	divb.style.display = 'none';
	if(div.style.display == 'none'){
		div.style.display = 'block';
		
	}
}