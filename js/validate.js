$(document).ready(function(){
	
	function mostrarUser(){
		console.log('llamada al mostrarUser');
		$("#menuppal").hide(200);
		$("#menuser").show(300);
	}
	function mostrarppal(){
		console.log('llamada al mostrarppal');
		$("#menuser").hide(300);
		$("#menuppal").show(200);
		
	}
	function nuevouser(){
		console.log('creando nuevo usuario');
		//$("#menuser").hide(300);
		$("#menunuser").toggle(100);
	}
	function validar(){	
		var user = document.querySelectorAll('#menunuser input');
		if(validateUsername(user) & validatePassword1() & validatePassword2() & validateEmail())
			return true;
		else
			return false;
	}
	function validateUsername(data){
		//NO cumple longitud minima
		if(data['apellidos'].value.length < 4){
			//reqUsername.addClass("error");
			data['apellidos'].addClass("validate_error");
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
});//ready