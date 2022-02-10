<?php

include 'dbapi/api_model.php'; 
include 'dbapi/api_model_categoria.php'; 
include 'dbapi/api_model_marca.php'; 
include 'dbapi/api_model_subcategoria.php'; 
include 'dbapi/api_model_tipocom.php'; 
include 'dbapi/api_model_tipodoc.php'; 

include 'dbapi/api_model_usuario.php'; 
include 'dbapi/api_model_roles.php';

include 'dbapi/api_model_cliente.php'; 
include 'dbapi/api_model_proveedor.php'; 


include 'dbapi/api_model_producto.php'; 
include 'dbapi/api_model_compra.php'; 

include 'dbapi/api_model_compracarrito.php'; 
include 'dbapi/api_model_compradetallecarrito.php'; 

include 'dbmysql/mysql_model.php'; 

class db_model
{

        
        private $db_model   = 'API';  // tenemos  API - DBMYSQL  - DBSQLSERVER


        public function __construct() {
            $this->db_model = 'API';
          //  $this->db_model = 'DBMYSQL';
        }


		//-------- Tabla Categoria       --------
		//--------------------------------------------------		
        public function categoria_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_categoria();

                $p_rptJson = $objapi->categoria_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->categoria_listar();


			}
			
			return $p_rptJson;
			
		}




        public function categoria_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_categoria();
				
                $p_rptJson = $objapi->categoria_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->categoria_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function categoria_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_categoria();

                $p_rptJson = $objapi->categoria_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->categoria_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function categoria_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_categoria();

                $p_rptJson = $objapi->categoria_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->categoria_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
        
        public function categoria_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_categoria();

                $p_rptJson = $objapi->categoria_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->categoria_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function categoria_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_categoria();

                $p_rptJson = $objapi->categoria_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->categoria_registrar($postData);


			}
			
			return $p_rptJson;
			
		}     
		

        public function categoria_eliminar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_categoria();

                $p_rptJson = $objapi->categoria_eliminar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->categoria_eliminar($p_codigo);


			}
			
			return $p_rptJson;
			
		}  		

		//-------- Tabla Marca       --------
		//--------------------------------------------------		
        public function marca_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_marca();

                $p_rptJson = $objapi->marca_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->marca_listar();


			}
			
			return $p_rptJson;
			
		}



        public function marca_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_marca();
				
                $p_rptJson = $objapi->marca_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->marca_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function marca_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_marca();

                $p_rptJson = $objapi->marca_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->marca_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function marca_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_marca();

                $p_rptJson = $objapi->marca_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->marca_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
        
        public function marca_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_marca();

                $p_rptJson = $objapi->marca_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->marca_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function marca_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_marca();

                $p_rptJson = $objapi->marca_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->marca_registrar($postData);


			}
			
			return $p_rptJson;
			
		}   


        public function marca_eliminar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_marca();

                $p_rptJson = $objapi->marca_eliminar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->marca_eliminar($p_codigo);


			}
			
			return $p_rptJson;
			
		}  		
	
		//-------- Tabla Sub Categoria       --------
		//--------------------------------------------------		
        public function subcategoria_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_subcategoria();

                $p_rptJson = $objapi->subcategoria_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->subcategoria_listar();


			}
			
			return $p_rptJson;
			
		}



        public function subcategoria_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_subcategoria();
				
                $p_rptJson = $objapi->subcategoria_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->subcategoria_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function subcategoria_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_subcategoria();

                $p_rptJson = $objapi->subcategoria_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->subcategoria_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function subcategoria_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_subcategoria();

                $p_rptJson = $objapi->subcategoria_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->subcategoria_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
        
        public function subcategoria_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_subcategoria();

                $p_rptJson = $objapi->subcategoria_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->subcategoria_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function subcategoria_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_subcategoria();

                $p_rptJson = $objapi->subcategoria_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->subcategoria_registrar($postData);


			}
			
			return $p_rptJson;
			
		}   
	
		
        public function subcategoria_eliminar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_subcategoria();

                $p_rptJson = $objapi->subcategoria_eliminar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->subcategoria_eliminar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
		
		//-------- Tabla tipo comprobante       --------
		//--------------------------------------------------		
        public function tipocom_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipocom();

                $p_rptJson = $objapi->tipocom_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipocom_listar();


			}
			
			return $p_rptJson;
			
		}



        public function tipocom_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipocom();
				
                $p_rptJson = $objapi->tipocom_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipocom_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function tipocom_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipocom();

                $p_rptJson = $objapi->tipocom_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipocom_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function tipocom_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipocom();

                $p_rptJson = $objapi->tipocom_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipocom_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
        
        public function tipocom_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipocom();

                $p_rptJson = $objapi->tipocom_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipocom_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function tipocom_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipocom();

                $p_rptJson = $objapi->tipocom_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipocom_registrar($postData);


			}
			
			return $p_rptJson;
			
		}  

		
        public function tipocom_eliminar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipocom();

                $p_rptJson = $objapi->tipocom_eliminar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipocom_eliminar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    

		//-------- Tabla tipo documento       --------
		//--------------------------------------------------		
        public function tipodoc_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipodoc();

                $p_rptJson = $objapi->tipodoc_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipodoc_listar();


			}
			
			return $p_rptJson;
			
		}



        public function tipodoc_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipodoc();
				
                $p_rptJson = $objapi->tipodoc_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipodoc_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function tipodoc_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipodoc();

                $p_rptJson = $objapi->tipodoc_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipodoc_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function tipodoc_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipodoc();

                $p_rptJson = $objapi->tipodoc_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipodoc_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
        
        public function tipodoc_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipodoc();

                $p_rptJson = $objapi->tipodoc_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipodoc_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function tipodoc_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipodoc();

                $p_rptJson = $objapi->tipodoc_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipodoc_registrar($postData);


			}
			
			return $p_rptJson;
			
		}   
				 		

        public function tipodoc_eliminar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_tipodoc();

                $p_rptJson = $objapi->tipodoc_eliminar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->tipodoc_eliminar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
		//-------- Tabla Usuario             --------
		//--------------------------------------------------		
        public function usuario_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_usuario();

                $p_rptJson = $objapi->usuario_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->usuario_listar();


			}
			
			return $p_rptJson;
			
		}




        public function usuario_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_usuario();
				
                $p_rptJson = $objapi->usuario_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->usuario_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function usuario_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_usuario();

                $p_rptJson = $objapi->usuario_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->usuario_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function usuario_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_usuario();

                $p_rptJson = $objapi->usuario_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->usuario_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        

        public function usuario_validarlogin($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_usuario();

                $p_rptJson = $objapi->usuario_validarlogin($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->usuario_validarlogin($postData);


			}
			
			return $p_rptJson;
			
		}  
        		
        
        public function usuario_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_usuario();

                $p_rptJson = $objapi->usuario_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->usuario_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function usuario_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_usuario();

                $p_rptJson = $objapi->usuario_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->usuario_registrar($postData);


			}
			
			return $p_rptJson;
			
		} 



        public function usuario_eliminar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_usuario();

                $p_rptJson = $objapi->usuario_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->usuario_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    

		//-------- Tabla Roles       --------
		//--------------------------------------------------		
        public function roles_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_roles();

                $p_rptJson = $objapi->roles_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->roles_listar();


			}
			
			return $p_rptJson;
			
		}



        public function roles_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_roles();
				
                $p_rptJson = $objapi->roles_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->roles_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function roles_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_roles();

                $p_rptJson = $objapi->roles_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->roles_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function roles_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_roles();

                $p_rptJson = $objapi->roles_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->roles_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
        
        public function roles_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_roles();

                $p_rptJson = $objapi->roles_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->roles_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function roles_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_roles();

                $p_rptJson = $objapi->roles_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->roles_registrar($postData);


			}
			
			return $p_rptJson;
			
		}   


        public function roles_eliminar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_roles();

                $p_rptJson = $objapi->roles_eliminar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->roles_eliminar($p_codigo);


			}
			
			return $p_rptJson;
			
		}  		



		//-------- Tabla producto        --------
		//--------------------------------------------------		
        public function producto_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_producto();

                $p_rptJson = $objapi->producto_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->producto_listar();


			}
			
			return $p_rptJson;
			
		}



        public function producto_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_producto();
				
                $p_rptJson = $objapi->producto_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->producto_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function producto_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_producto();

                $p_rptJson = $objapi->producto_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->producto_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function producto_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_producto();

                $p_rptJson = $objapi->producto_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->producto_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
        
        public function producto_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_producto();

                $p_rptJson = $objapi->producto_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->producto_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function producto_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_producto();

                $p_rptJson = $objapi->producto_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->producto_registrar($postData);


			}
			
			return $p_rptJson;
			
		}  
		public function producto_eliminar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_producto();

                $p_rptJson = $objapi->producto_eliminar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->producto_eliminar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        

		//-------- Tabla Compra        --------
		//--------------------------------------------------		
        public function compra_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compra();

                $p_rptJson = $objapi->compra_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compra_listar();


			}
			
			return $p_rptJson;
			
		}



        public function compra_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compra();
				
                $p_rptJson = $objapi->compra_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compra_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function compra_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compra();

                $p_rptJson = $objapi->compra_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compra_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function compra_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compra();

                $p_rptJson = $objapi->compra_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compra_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
        
        public function compra_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compra();

                $p_rptJson = $objapi->compra_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compra_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function compra_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compra();

                $p_rptJson = $objapi->compra_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compra_registrar($postData);


			}
			
			return $p_rptJson;
			
	}  

	public function compra_eliminar($p_codigo)
	{

	   // echo "el modelo a trabajae es : ".$this->db_model;
		$p_rptJson = null;
		if ($this->db_model =='API')
		{		
			
			$objapi = new api_model_compra();

			$p_rptJson = $objapi->compra_eliminar($p_codigo);


		}else
		{

			
			$objmysql = new mysql_model();

			$p_rptJson = $objmysql->compra_eliminar($p_codigo);


		}
		
		return $p_rptJson;
		
	}    
	



		//-------- Tabla CompraCarrito        --------
		//--------------------------------------------------		
        public function compracarrito_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compracarrito();

                $p_rptJson = $objapi->compracarrito_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compracarrito_listar();


			}
			
			return $p_rptJson;
			
		}



        public function compracarrito_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compracarrito();
				
                $p_rptJson = $objapi->compracarrito_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compracarrito_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function compracarrito_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compracarrito();

                $p_rptJson = $objapi->compracarrito_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compracarrito_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function compracarrito_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compracarrito();

                $p_rptJson = $objapi->compracarrito_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compracarrito_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
    
        public function compracarrito_buscar_ultimacompra($p_usuario)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compracarrito();

                $p_rptJson = $objapi->compracarrito_buscar_ultimacompra($p_usuario);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compracarrito_buscar_ultimacompra($p_usuario);


			}
			
			return $p_rptJson;
			
		}  


        public function compracarrito_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compracarrito();

                $p_rptJson = $objapi->compracarrito_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compracarrito_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function compracarrito_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compracarrito();

                $p_rptJson = $objapi->compracarrito_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compracarrito_registrar($postData);


			}
			
			return $p_rptJson;
			
	}  

	public function compracarrito_eliminar($p_codigo)
	{

	   // echo "el modelo a trabajae es : ".$this->db_model;
		$p_rptJson = null;
		if ($this->db_model =='API')
		{		
			
			$objapi = new api_model_compracarrito();

			$p_rptJson = $objapi->compracarrito_eliminar($p_codigo);


		}else
		{

			
			$objmysql = new mysql_model();

			$p_rptJson = $objmysql->compracarrito_eliminar($p_codigo);


		}
		
		return $p_rptJson;
		
	}    
	

		//-------- Tabla CompraDetalleCarrito        --------
		//--------------------------------------------------		
        public function compradetallecarrito_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compradetallecarrito();

                $p_rptJson = $objapi->compradetallecarrito_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compradetallecarrito_listar();


			}
			
			return $p_rptJson;
			
		}



        public function compradetallecarrito_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compradetallecarrito();
				
                $p_rptJson = $objapi->compradetallecarrito_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compradetallecarrito_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function compradetallecarrito_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compradetallecarrito();

                $p_rptJson = $objapi->compradetallecarrito_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compradetallecarrito_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function compradetallecarrito_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compradetallecarrito();

                $p_rptJson = $objapi->compradetallecarrito_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compradetallecarrito_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
    

        public function compradetallecarrito_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compradetallecarrito();

                $p_rptJson = $objapi->compradetallecarrito_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compradetallecarrito_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function compradetallecarrito_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_compradetallecarrito();

                $p_rptJson = $objapi->compradetallecarrito_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->compradetallecarrito_registrar($postData);


			}
			
			return $p_rptJson;
			
	}  

	public function compradetallecarrito_eliminar($p_codigo)
	{

	   // echo "el modelo a trabajae es : ".$this->db_model;
		$p_rptJson = null;
		if ($this->db_model =='API')
		{		
			
			$objapi = new api_model_compradetallecarrito();

			$p_rptJson = $objapi->compradetallecarrito_eliminar($p_codigo);


		}else
		{

			
			$objmysql = new mysql_model();

			$p_rptJson = $objmysql->compradetallecarrito_eliminar($p_codigo);


		}
		
		return $p_rptJson;
		
	}    
	





		//-------- Tabla cliente       --------
		//--------------------------------------------------		
        public function cliente_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente();

                $p_rptJson = $objapi->cliente_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->cliente_listar();


			}
			
			return $p_rptJson;
			
		}



        public function cliente_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente();
				
                $p_rptJson = $objapi->cliente_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->cliente_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function cliente_listar_pordni($p_campo_dni)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente();

                $p_rptJson = $objapi->cliente_listar_pordni($p_campo_dni);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->cliente_listar_pordni($p_campo_dni);


			}
			
			return $p_rptJson;
			
		}

        public function cliente_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente();

                $p_rptJson = $objapi->cliente_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->cliente_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function cliente_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente();

                $p_rptJson = $objapi->cliente_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->cliente_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
        
        public function cliente_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente();

                $p_rptJson = $objapi->cliente_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->cliente_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function cliente_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente();

                $p_rptJson = $objapi->cliente_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->cliente_registrar($postData);


			}
			
			return $p_rptJson;
			
		}   

		
        public function cliente_eliminar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente();

                $p_rptJson = $objapi->cliente_eliminar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->cliente_eliminar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    

		
		//-------- Tabla proveedor       --------
		//--------------------------------------------------		
        public function proveedor_listar()
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_proveedor();

                $p_rptJson = $objapi->proveedor_listar();


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->proveedor_listar();


			}
			
			return $p_rptJson;
			
		}



        public function proveedor_listar_porid($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_proveedor();
				
                $p_rptJson = $objapi->proveedor_listar_porid($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->proveedor_listar_porid($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function proveedor_listar_pordescripcion($p_campo_dato)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_proveedor();

                $p_rptJson = $objapi->proveedor_listar_pordescripcion($p_campo_dato);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->proveedor_listar_pordescripcion($p_campo_dato);


			}
			
			return $p_rptJson;
			
		}


        public function proveedor_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_proveedor();

                $p_rptJson = $objapi->proveedor_buscar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->proveedor_buscar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
        
        public function proveedor_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_proveedor();

                $p_rptJson = $objapi->proveedor_editar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->proveedor_editar($postData);


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function proveedor_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_proveedor();

                $p_rptJson = $objapi->proveedor_registrar($postData);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->proveedor_registrar($postData);


			}
			
			return $p_rptJson;
			
		}   
		
		
        public function proveedor_eliminar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_proveedor();

                $p_rptJson = $objapi->proveedor_eliminar($p_codigo);


			}else
			{

                
                $objmysql = new mysql_model();

                $p_rptJson = $objmysql->proveedor_eliminar($p_codigo);


			}
			
			return $p_rptJson;
			
		}    
        
				 		
				 		

}

?>