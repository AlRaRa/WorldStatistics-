<?php


namespace controladorSQL;
class InfoLog
{

        public static function errorCrearTabla($localizacion, $errorConni){

            echo "Error al crear la tabla $localizacion, $errorConni";

        }

        public static function tablaCreada($localizacion){

            echo "La tabla $localizacion fue creada correctamente";

        }

        public static function  errorImportarDatos($localizacion, $errorConni){

            echo "error al introducir los datos en la tabla $localizacion, $errorConni";
        }

        public static function  datosIntroducidos($localizacion){

            echo "datos introducidos correctamente $localizacion";

        }


}