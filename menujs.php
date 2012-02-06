<?php
echo '
<script type="text/javascript">
	function mostrarppal(){		
		console.log(\'llamada al mostrarppal\');
		$("#bhome").hide(10);	
		$("#menuser").hide(300);
		$("#menupines").hide(10);
		$("#menumatr").hide(10);
		$("#menuppal").show(200);

	}

	//menu de usuarios
	function mostrarUser(){		
		console.log(\'llamada al mostrarUser\');
		$("#bhome").toggle(10);
		$("#menuppal").hide(200);
		$("#menuser").show(300);
	}
	function nuevouser(){
		console.log(\'creando nuevo usuario\');
		$("#menunuser").toggle(100);
	}
	function alluser(){
		console.log(\'cargando todos los usuarios\');
		$("#menutuser").toggle(200);
	}

	//menu de pines
	function mostrarPin(){
		console.log(\'cargando menus del pin\');
		$("#menuppal").hide(200);
		$("#bhome").toggle(10);		
		$("#menupines").show(200);
	}
	function nuevoPin(){
		console.log(\'creando nuevo pin\');
		$("#menunupin").toggle(100);
	}
	function allPines(){
		console.log(\'cargando todos los pines\');
		$("#menutpin").toggle(200);
	}

	//menu de matriculas
	function mostrarMatr(){
		console.log(\'cargando menus de matricula\');		
		$("#menuppal").hide(200);
		$("#bhome").toggle(10);		
		$("#menumatr").show(200);
	}
	function nuevaMatr(){
		console.log(\'creando nueva matricula\');
		$("#menunumatr").toggle(100);
	}
	function allMatr(){
		console.log(\'cargando todos las matriculas\');
		$("#menutmatr").toggle(200);
	}



	//
	function validar(){	
		var user = document.querySelectorAll(\'#menunuser input\');
		if(validateUsername(user))
			return true;
		else
			return false;
	}
	function validateUsername(data){
			console.log(\'validar ape\');
		//NO cumple longitud minima
		if(data[\'apellidos\'].value.length < 4){
			//reqUsername.addClass("error");
			data[\'apellidos\'].addClass("validate_error");
			console.log(\'error al validar ape\');
			return false;
		}/*
		//SI longitud pero NO solo caracteres A-z
		else if(!inputUsername.val().match(/^[a-zA-Z]+$/)){
			reqUsername.addClass("error");
			inputUsername.addClass("error");
			return false;
		}
		// SI longitud, SI caracteres A-z
		else{
			reqUsername.removeClass("error");
			inputUsername.removeClass("error");
			return true;
		}*/
	}/*
	function validatePassword1(){
		//NO tiene minimo de 5 caracteres o mas de 12 caracteres
		if(inputPassword1.val().length < 5 || inputPassword1.val().length > 12){
			reqPassword1.addClass("error");
			inputPassword1.addClass("error");
			return false;
		}
		// SI longitud, NO VALIDO numeros y letras
		else if(!inputPassword1.val().match(/^[0-9a-zA-Z]+$/)){
			reqPassword1.addClass("error");
			inputPassword1.addClass("error");
			return false;
		}
		// SI rellenado, SI email valido
		else{
			reqPassword1.removeClass("error");
			inputPassword1.removeClass("error");
			return true;
		}
	}
	function validatePassword2(){
		//NO son iguales las password
		if(inputPassword1.val() != inputPassword2.val()){
			reqPassword2.addClass("error");
			inputPassword2.addClass("error");
			return false;
		}
		// SI son iguales
		else{
			reqPassword2.removeClass("error");
			inputPassword2.removeClass("error");
			return true;
		}
	}
	function validateEmail(){
		//NO hay nada escrito
		if(inputEmail.val().length == 0){
			reqEmail.addClass("error");
			inputEmail.addClass("error");
			return false;
		}
		// SI escrito, NO VALIDO email
		else if(!inputEmail.val().match(/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i)){
			reqEmail.addClass("error");
			inputEmail.addClass("error");
			return false;
		}
		// SI rellenado, SI email valido
		else{
			reqEmail.removeClass("error");
			inputEmail.removeClass("error");
			return true;
		}
	}*/	
//ready
</script>
'; 
?>