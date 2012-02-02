
$(document).ready(function() {
	//clase para manejar desde CSS los divs ocultos	

	$("html").addClass("js");
	console.log('cargando clases js....');
	function inicio(){
		console.log('ocultando menus');
		$("#bhome").hide(10);
		$("#acordeon").hide(10);
		$("#ordenables").hide(10);
		$("#menunuser").hide(10);
		$("#menutuser").hide(10);
		$("#menupines").hide(10);
		$("#menunupin").hide(10);
		$("#menutpin").hide(10);
	}
	inicio();
});
