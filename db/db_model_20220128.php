<?php

include 'dbapi/api_model.php'; 
include 'dbapi/api_model_categoria.php'; 
include 'dbapi/api_model_marca.php'; 
include 'dbapi/api_model_subcategoria.php'; 
include 'dbapi/api_model_tipocom.php'; 
include 'dbapi/api_model_tipodoc.php'; 

include 'dbapi/api_model_usuario.php'; 

include 'dbapi/api_model_cliente.php'; 
include 'dbapi/api_model_proveedor.php'; 


include 'dbapi/api_model_producto.php'; 
include 'dbapi/api_model_compra.php'; 

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
}

?>