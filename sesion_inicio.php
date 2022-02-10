<?php
						
        //primer envio de session

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        $_SESSION['mont_nombreusuario'] 	= $registro[2];
        $_SESSION['mont_perfil'] 		=  $registro[3]; //"0001";
        $_SESSION['mont_nombreperfil'] 	= $registro[4];
        $_SESSION['mont_login'] 			= $username;
        $_SESSION['mont_anexo'] 			= $anexo;
        $_SESSION['mont_tiempo'] = time();
	
?>
