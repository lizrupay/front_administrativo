
<?php
	
	//esto se usa en todas las ventanas

	
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    $gg_pp_mensaje_error          =  $_SESSION['mensaje'];
    $gg_pp_mensaje_id_error       =  $_SESSION['mensaje_id'];


    $gg_pp_codigo_usuario          =  $_SESSION['usuario_id'];
    $gg_pp_nombreapellido_usuario  =  $_SESSION['nombreApellido'];
    $gg_pp_nombreperfil            =  $_SESSION['nombrePerfil'];

    $_SESSION['mensaje']        =   $gg_pp_mensaje_error;
    $_SESSION['mensaje_id']     =   $gg_pp_mensaje_id_error;

    $_SESSION['usuario_id']     =   $gg_pp_codigo_usuario;
    $_SESSION['nombreApellido'] =   $gg_pp_nombreapellido_usuario;
    $_SESSION['nombrePerfil']   =   $gg_pp_nombreperfil;


	
	
 	//se obtiene el tiempo

	$inactivo = 360000000;
	//$inactivo = 6;

	if(isset($_SESSION['tiempo_inicio']) ) {
	    $vida_session = time() - $_SESSION['tiempo_inicio'];
        if($vida_session > $inactivo)
        {
            //session_destroy();
            //header("Location: index.php");
            
            
            /*
			$pusuario =  '';
			$pperfil  = '';
			$pnperfil = '';
			$plogin   = '';
			$panexo   = '';


			$_SESSION['mont_nombreusuario'] 	= $pusuario;
			$_SESSION['mont_perfil']			= $pperfil;
			$_SESSION['mont_nombreperfil']	    = $pnperfil;
			$_SESSION['mont_login']			    = $plogin;
			$_SESSION['mont_anexo'] 			= $panexo;
			

            header("Location: img_cerrar_session.php");
            */


        }
    }

	$_SESSION['tiempo_inicio'] = time();

	




?>
