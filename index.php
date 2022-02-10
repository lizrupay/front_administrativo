<?php

		function checkLogin()
		{
		
      
      include 'db/db_model.php';

      
		    if($_POST){
      			$_SESSION['username']=stripslashes($_POST["username"]);
      			$_SESSION['passwort']=stripslashes($_POST["passwort"]); 
      			
      			      			
    		} 
        

    		$username = stripslashes($_POST["username"]);
    		$passwort = stripslashes($_POST["passwort"]); 


        //Consulta este lo puede jalar de alguna forma el cliente
        $postData = array(

          'usuario' => $username,
          'clave' => $passwort

          ); 

        // echo "dato json".json_encode($postData)."<br>";
        
        $objDB = new db_model();

        $p_rptJson = $objDB->usuario_validarlogin($postData);



        $p_usuarioLogin = json_decode($p_rptJson, true);

        if (isset($p_usuarioLogin['usuario_id']) == null)
        {

          // echo "MALLLLLL"."<br>";

          session_start();
          // Error en la validacion
          $_SESSION['mensaje']        = $p_usuarioLogin['mensaje'];
          $_SESSION['mensaje_id']     = $p_usuarioLogin['mensaje_id'];

          $_SESSION['usuario_id']     = "";
          $_SESSION['nombreApellido'] = "";
          $_SESSION['nombrePerfil']   = "";

          $_SESSION['tiempo_inicio']  = time();          

        }else
        {
          // Usuario logeado correctamente

         // echo "BIENNN"."<br>";

          session_start();

          $_SESSION['mensaje']        = "";
          $_SESSION['mensaje_id']     = "0";

          $_SESSION['usuario_id']     = $p_usuarioLogin['usuario_id'];
          $_SESSION['nombreApellido'] = $p_usuarioLogin['nombres']." ".$p_usuarioLogin['apellidos'];
          $_SESSION['nombrePerfil']   = "Administrador";

          $_SESSION['tiempo_inicio']  = time();

        }


    		
	}
			

	function getRealIP()
	{
	   
	   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
	   {
	      $client_ip =
	         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
	            $_SERVER['REMOTE_ADDR']
	            :
	            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
	               $_ENV['REMOTE_ADDR']
	               :
	               "unknown" );
	   
	      // los proxys van añadiendo al final de esta cabecera
	      // las direcciones ip que van "ocultando". Para localizar la ip real
	      // del usuario se comienza a mirar por el principio hasta encontrar
	      // una dirección ip que no sea del rango privado. En caso de no
	      // encontrarse ninguna se toma como valor el REMOTE_ADDR
	   
	      $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
	   
	      reset($entries);
	      while (list(, $entry) = each($entries))
	      {
	         $entry = trim($entry);
	         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
	         {
	            // http://www.faqs.org/rfcs/rfc1918.html
	            $private_ip = array(
	                  '/^0\./',
	                  '/^127\.0\.0\.1/',
	                  '/^192\.168\..*/',
	                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
	                  '/^10\..*/');
	   
	            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
	   
	            if ($client_ip != $found_ip)
	            {
	               $client_ip = $found_ip;
	               break;
	            }
	         }
	      }
	   }
	   else
	   {
	      $client_ip =
	         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
	            $_SERVER['REMOTE_ADDR']
	            :
	            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
	               $_ENV['REMOTE_ADDR']
	               :
	               "unknown" );
	   }
	   
	   return $client_ip;
	   
	}
				
	?>


	<?php
		//$ipcliente = getRealIP();
		
    $pboton = isset($_POST['btn_ingresa']) ? $_POST['btn_ingresa'] : '';
	

    If ($pboton)
		{

     // echo "inicio verificacion de login"."<br>";
      // Presiono iniciar sesión.hay que verificar.
			checkLogin(); 
     
								
		}			

    

    if (isset($_SESSION['mensaje_id']) == null)
    {
     // echo "primera vez Index.php"."<br>";
      include 'login.php';
    }else
    {

      // echo "ya ingresoo enter codigo de error".$_SESSION['mensaje_id']." y mensaje es : ".$_SESSION['mensaje'] ."<br>";
        if ($_SESSION['mensaje_id']=="0")
        {
          //echo "bien";

         // echo "llamar a sistema"."<br>";
         include 'sistema.php';

        }else
        {
          //echo "mal";
          //include 'login.html';
          include 'login.php';
        
        }	 
    }


?>