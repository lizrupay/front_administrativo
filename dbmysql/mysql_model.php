<?php

class mysql_model
{

        
        private $db_host   = '';
        private $db_hostip = '';
        
        private $db_name = '';
        private $db_user = '';
        private $db_pass = '';
    
        private $db_tipo ='mssql';
        


                                // $db_version ='5';  //$conectID = mysqli_connect($db_host, $db_user, $db_pass);
        private $db_version ='5';  //$conectID = mysql_connect($db_host, $db_user, $db_pass);



        public function __construct() {
            $this->db_model = 'API';

            $this->db_host   = '172.96.143.27';
            $this->db_hostip = '172.96.143.27';
            
            $this->db_name = 'tecnomarket';
            $this->db_user = 'lrupay';
            $this->db_pass = 'Rupay..2021';
        
            $this->db_tipo ='mssql';
            
            $this->db_tipo ='mysql';
    
            //$this->db_version ='5';  //$conectID = mysqli_connect($db_host, $db_user, $db_pass);
            $this->db_version ='4';  //$conectID = mysql_connect($db_host, $db_user, $db_pass);            
        }

		//-------- Procedimiento Conexion BD        --------
		//--------------------------------------------------		
 		function conectar_BD()
		{
			//$db_version = '5';
			//global $db_version;
			if ($this->db_version =='5')
			{			
				$conectID = mysqli_connect($this->db_host, $this->db_user, $this->db_pass);
			}else
			{
				$conectID = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
			}
			
			//echo "informacion....".$db_host."--".$db_user."--".$db_pass."<br>";
			//echo "resultado....".$conectID."<br>";
			return $conectID;
			
		}

 		function seleccionar_BD($conectID)
		{
			//$db_version = '5';
			//global $db_version;

			if ($this->db_version =='5')
			{			
				mysqli_select_db($conectID, $this->db_name);
			}else
			{
				mysql_select_db($this->db_name , $conectID);
			}

			
		}
		
        /*
        $conexion=mysqli_connect($host,$user,$pass) or die ("conexion fallida");
        mysqli_select_db($conexion,$database) or 
        die ("Error al conectarse con la Base de Datos".mysqli_error($conexion));
        */


 		function consultar_sql_BD($sentencialMYSQL, $conectID)
		{
			//$db_version = '5';
			//global $db_version;

			if ($this->db_version =='5')
			{			
				$consulta_sql=mysqli_query($conectID, $sentencialMYSQL);
			}else
			{
				$consulta_sql=mysql_query($sentencialMYSQL, $conectID);
			}

			return $consulta_sql;
		}

		
 		function consultar_cargar_arreglo_BD($consulta_sql)
		{
			//$db_version = '5';
			//global $db_version;

			if ($this->db_version =='5')
			{			
				$Arrayregistros = mysqli_fetch_array($consulta_sql);
			}else
			{
				$Arrayregistros = mysql_fetch_array($consulta_sql);
			}
			
			return $Arrayregistros;
		}

 		function consultar_contar_filas_BD($consulta_sql)
		{
			//$db_version = '5';
			//global $db_version;

			if ($this->db_version =='5')
			{			
				$Cantidaregistros = mysqli_num_rows($consulta_sql);
			}else
			{
				$Cantidaregistros = mysql_num_rows($consulta_sql);
			}
			
			return $Cantidaregistros;
		}


		function cerrar_BD($conectID)
		{
			//$db_version = '5';
			//global $db_version;

			if ($this->db_version =='5')
			{						
				mysqli_close($conectID);
			}else
			{
				mysql_close($conectID);
			}
		
			//mysqli_close($conectID);
			
		}

				

		
		
		//Registro de Seguimiento o Bitacora
		//----------------------------------

 		function Sp_GuardarLogMysql($pcadena)
		{

		
			//se abre el fichero en modo lectura y escritura.
			//$archivo = fopen("/var/www/html/powercall/tempo/mysql-log.txt","a+");
			//$archivo = fopen("/var/www/html/bio2016/tempo/mysql-log.txt","a+");
			$p_nombrearchivo = '/var/www/html/callcenter-actel/tempo/mysql_log_'.date("Ymd").'.txt';
			$archivo = fopen($p_nombrearchivo,"a+");
			$cadena = date("Y-m-d H:i:s"); 
			$cadena = $cadena." ".$pcadena."\r\n";
			fputs($archivo,$cadena);
			fclose($archivo);
		
		
		

	    }

		//-------- Mantenimiento de Categoria         --------
		//--------------------------------------------------
        public function categoria_listar(){

            
            $conectID = $this->conectar_BD();
            $this->seleccionar_BD($conectID); 

            $sentencialMYSQL =  $this->Sp_ListarCategoria();

           
            $consulta_sql = $this->consultar_sql_BD($sentencialMYSQL, $conectID); 

            

            $arrayR = array();
           
            while ($registro = $this->consultar_cargar_arreglo_BD($consulta_sql)) 
            {

                $postData = array(
                    'categoria_id' => $registro['categoria_id'],
                    'descripcion' => $registro['descripcion'],
                    'imagen' => $registro['imagen'],
                    'estado' => $registro['estado']
                    ); 

                $arrayR[] = $postData;
                


               // $fila          = $fila + 1;

            }            

            return json_encode($arrayR);

        }



        public function categoria_listar_porid($p_campo_dato){
           
            $conectID = $this->conectar_BD();
            $this->seleccionar_BD($conectID); 

            $sentencialMYSQL =  $this->Sp_ListarCategoriaID($p_campo_dato);
       
			
            $consulta_sql = $this->consultar_sql_BD($sentencialMYSQL, $conectID); 

            $arrayR = array();
          
            while ($registro = $this->consultar_cargar_arreglo_BD($consulta_sql)) 
            {

                $postData = array(
                    'categoria_id' => $registro['categoria_id'],
                    'descripcion' => $registro['descripcion'],
                    'imagen' => $registro['imagen'],
                    'estado' => $registro['estado']
                    ); 

                $arrayR[] = $postData;

            }
			
			return json_encode($arrayR);
		}            

		public function categoria_listar_pordescripcion($p_campo_dato){
           
				$conectID = $this->conectar_BD();
				$this->seleccionar_BD($conectID); 
	
				$sentencialMYSQL =  $this->Sp_ListarCategoriaDescripcion($p_campo_dato);
		   
				

				$consulta_sql = $this->consultar_sql_BD($sentencialMYSQL, $conectID); 
	
				$arrayR = array();
				$fila   = 0;
				while ($registro = $this->consultar_cargar_arreglo_BD($consulta_sql)) 
				{
	
					$postData = array(
						'categoria_id' => $registro['categoria_id'],
						'descripcion' => $registro['descripcion'],
						'imagen' => $registro['imagen'],
						'estado' => $registro['estado']
						); 
	
					$arrayR[] = $postData;
					
				   // $fila          = $fila + 1;
	
				} 

            return json_encode($arrayR);

        }



        public function categoria_buscar($p_codigo){

            
            $conectID = $this->conectar_BD();
            $this->seleccionar_BD($conectID); 

            $sentencialMYSQL    =  $this->Sp_ConsultaCategoria($p_codigo);


            $consulta_sqlbuscar = $this->consultar_sql_BD($sentencialMYSQL, $conectID); 

						
            $registro           = $this->consultar_cargar_arreglo_BD($consulta_sqlbuscar);  	


            $postData = array(
                'categoria_id' => $registro['categoria_id'],
                'descripcion' => $registro['descripcion'],
                'imagen' => $registro['imagen'],
                'estado' => $registro['estado']
                ); 
         

            return json_encode($postData);

        }

        public function categoria_editar($postData){


            $postMsg = array(
                'mensaje_id' => '0',
                'mensaje' => '¡registro exitoso!',
                ); 

            if (($postData['descripcion'] == "") || ($postData['estado'] == "")) 
            {
                $postMsg['mensaje_id'] = "2";
                $postMsg['mensaje'] = "¡algunos de los campos son obligatorias para el registro o actualizar de categoria(descripcion, estado)!";
            }else
            {

                $conectID = $this->conectar_BD();
                $this->seleccionar_BD($conectID); 

                $sentencialMYSQL    =  $this->Sp_ModificarCategoria($postData['categoria_id'], $postData['descripcion'], $postData['imagen'], $postData['estado']);


                $consulta_sql = $this->consultar_sql_BD($sentencialMYSQL, $conectID); 
            }   
						
    

            return json_encode($postMsg);

        }



        public function categoria_registrar($postData){


            $postMsg = array(
                'mensaje_id' => '0',
                'mensaje' => 'registro exitoso',
                ); 

            if (($postData['descripcion'] == "") || ($postData['estado'] == "")) 
            {
                $postMsg['mensaje_id'] = "2";
                $postMsg['mensaje'] = "campo obligatorio descripcion y estado..";
            }else
            {

                $conectID = $this->conectar_BD();
                $this->seleccionar_BD($conectID); 

                $sentencialMYSQL    =  $this->Sp_InsertarCategoria($postData['categoria_id'], $postData['descripcion'], $postData['imagen'], $postData['estado']);


                $consulta_sql = $this->consultar_sql_BD($sentencialMYSQL, $conectID); 
            }   
						
    

            return json_encode($postMsg);

        }
        
 		function Sp_ListarCategoria()
		{

		
				$sentencialMYSQL = 	"	select ";

				$sentencialMYSQL .= "				categoria_id 	, ";
				$sentencialMYSQL .= "				descripcion 	, ";
				$sentencialMYSQL .= "				imagen 	        , ";
				$sentencialMYSQL .= "				estado 		      ";

				
				$sentencialMYSQL .= "			from 	categorias	 ";
				$sentencialMYSQL .= "			order by  	categoria_id	 ";
				//echo $sentencialMYSQL;

				return $sentencialMYSQL;	
	    }	


		

		function Sp_ListarCategoriaID($p_campo_dato)
		{

		
				$sentencialMYSQL = 	"	select ";

				$sentencialMYSQL .= "				categoria_id 	, ";
				$sentencialMYSQL .= "				descripcion 	, ";
				$sentencialMYSQL .= "				imagen 	        , ";
				$sentencialMYSQL .= "				estado 		      ";

				
				$sentencialMYSQL .= "			from 	categorias	 ";
				$sentencialMYSQL .= "			where categoria_id  like '%".$p_campo_dato."%'   ";
				$sentencialMYSQL .= "			order by  	categoria_id	 ";
				//echo $sentencialMYSQL;

				return $sentencialMYSQL;	
	    }		

		function Sp_ListarCategoriaDescripcion($p_campo_dato)
		{

		
				$sentencialMYSQL = 	"	select ";

				$sentencialMYSQL .= "				categoria_id 	, ";
				$sentencialMYSQL .= "				descripcion 	, ";
				$sentencialMYSQL .= "				imagen 	        , ";
				$sentencialMYSQL .= "				estado 		      ";

				
				$sentencialMYSQL .= "			from 	categorias	 ";
				$sentencialMYSQL .= "			where descripcion like '%".$p_campo_dato."%'   ";
				$sentencialMYSQL .= "			order by  	categoria_id	 ";
				//echo $sentencialMYSQL;

				return $sentencialMYSQL;	
	    }		
		
 		function Sp_ConsultaCategoria($p_codigo)
		{

                $sentencialMYSQL = 	"	select ";

                $sentencialMYSQL .= "				categoria_id 	, ";
                $sentencialMYSQL .= "				descripcion 	, ";
                $sentencialMYSQL .= "				imagen 	        , ";
                $sentencialMYSQL .= "				estado 		      ";

                
                $sentencialMYSQL .= "			from 	categorias	 ";
	
				$sentencialMYSQL .= "			where categoria_id= '".$p_codigo."'   ";
				
				return $sentencialMYSQL;	
	    }			
		



		
 		function Sp_InsertarCategoria($p_codigo, $p_descripcion, $p_imagen, $p_estado)
		{

				$sentencialMYSQL = 	"	insert into categorias ";
				$sentencialMYSQL .= "		( ";
				$sentencialMYSQL .= "				descripcion 	, ";
				$sentencialMYSQL .= "				imagen 	        , ";
				$sentencialMYSQL .= "				estado 	         ";
				
				$sentencialMYSQL .= "		) Values ";
				$sentencialMYSQL .= "		( ";
				
				$sentencialMYSQL .= "		'".$p_descripcion."'    , ";
				$sentencialMYSQL .= "		'".$p_imagen."'       	, ";
				$sentencialMYSQL .= "		'".$p_estado."'       	  ";

				
				$sentencialMYSQL .= "		) ";
				//echo $sentencialMYSQL;

				return $sentencialMYSQL;	
	    }		
		
		

 		function Sp_ModificarCategoria($p_codigo, $p_descripcion, $p_imagen, $p_estado)
				
		{

				$sentencialMYSQL = 	"	update categorias set ";
				$sentencialMYSQL .= "		descripcion 			= '".$p_descripcion."'    		, ";
				$sentencialMYSQL .= "		imagen 				    =  '".$p_imagen."'    		, ";

				$sentencialMYSQL .= "		estado 					= '".$p_estado."'    			 ";


				$sentencialMYSQL .= "			  where categoria_id= '".$p_codigo."'   ";
				
				return $sentencialMYSQL;	
	    }
		


 		function Sp_EliminarCategoria($p_codigo)
		
		{

				$sentencialMYSQL = 	"	delete from  categorias  ";

				$sentencialMYSQL .= "			 where categoria_id= '".$p_codigo."'   ";
				
				return $sentencialMYSQL;	
	    }		
		
		
    }
?>