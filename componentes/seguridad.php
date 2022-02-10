<?php


        /*
        Encripta el contenido de la variable, enviada como parametro.
        */

        function encriptar_parametro($valor)
        {

                $output = false;
                //Configuración del algoritmo de encriptación
                //Debes cambiar esta cadena, debe ser larga y unica
                //nadie mas debe conocerla
                $secret_key  = 'los mejores sistemas se realizar en Actel Perú SAC 2013 (c)';
                //Metodo de encriptación
                $encrypt_method = "AES-256-CBC";
                $secret_key = 'los mejores sistemas se realizar en Actel Perú SAC 2013 (c)';
                $secret_iv = 'ACTEL-PERU-SAC';

                // Puedes generar una diferente usando la funcion $getIV()
                // hash
                $key = hash('sha256', $secret_key);
                // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                $iv = substr(hash('sha256', $secret_iv), 0, 16);

                $output = base64_encode(openssl_encrypt($valor, $encrypt_method, $key, 0, $iv));


                /*
                openssl_encrypt(
                        string $data,
                        string $method,
                        string $password,
                        int $options = 0,
                        string $iv = ""
                    ): string

                    */


                return $output;


        }
        /*
        Desencripta el texto recibido
        */
        function desencriptar_parametro($valor) 
        {

                $output = false;
                //Configuración del algoritmo de encriptación
                //Debes cambiar esta cadena, debe ser larga y unica
                //nadie mas debe conocerla

                //Metodo de encriptación
                $encrypt_method = "AES-256-CBC";
                $secret_key = 'los mejores sistemas se realizar en Actel Perú SAC 2013 (c)';
                $secret_iv = 'ACTEL-PERU-SAC';
                // Puedes generar una diferente usando la funcion $getIV()
                // hash
                $key = hash('sha256', $secret_key);
                // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                $iv = substr(hash('sha256', $secret_iv), 0, 16);

                $output = openssl_decrypt(base64_decode($valor), $encrypt_method, $key, 0, $iv);

                return $output;
        };
        /*
        Genera un valor para IV
        */
        /*
        $getIV = function () use ($method) 
        function getIV($valor) 
        {
            return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
        };
        */

?>