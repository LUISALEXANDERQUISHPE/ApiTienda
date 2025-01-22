<?php
class Conexion
{
        public static function conectar(): PDO {
            // Definir los parámetros de conexión
            $host = 'ep-cool-breeze-a5cb9to7.us-east-2.aws.neon.tech';
            $dbname = 'neondb';
            $user = 'neondb_owner';
            $password = 'W5vL8CxVAqiQ';
    
            try {
                // Cadena de conexión en formato PDO para PostgreSQL con SSL activado
                $dsn = "pgsql:host=$host;dbname=$dbname;sslmode=require";
                
                // Crear la conexión PDO
                $conn = new PDO($dsn, $user, $password);
                
                // Configurar el modo de error de PDO para excepciones
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Retornar la conexión
                return $conn;
    
            } catch (PDOException $e) {
                die("Error al conectar: " . $e->getMessage());
            }
        }
    
}
