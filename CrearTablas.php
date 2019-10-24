<?php
require_once 'oConexion.class.php';
require_once 'config.php';

class CrearTablas
{

    public function __construct()
    {
        $this->oConexion = new oConexion("localhost", "COUNTRIESDATA", "root", "");
        $this->oConexion->abrir();
        $this->oConni = $this->oConexion->obtenerConexion();

       $this->Countries=["SPAIN", "ITALY", "EUROPE", "WORLD", "NEWZELAND", "FRANCE", "USA", "AUSTRALIA", "CHILE", "CHINA"];

       $this->Crear();
    }

    public function Crear(){

        foreach ($this->Countries as $localizacion){
           //this->borrarDB($pais);
            $this->crearTabla($localizacion);
           //this->crearDatos($pais);
        }

    }

    private function borrarDB($country){

        $this->oConni->query("DROP DATABASE IF EXISTS ${country}");

    }



    private function crearTabla($localizacion){

        $crearTabla="
        CREATE TABLE IF NOT EXISTS `$localizacion` (
    Country_Name varchar (20) NOT NULL,
            Country_Code varchar (5) NOT NULL, 
            Indicator_Name varchar (120) NOT NULL,
            Indicator_Code varchar (20) NOT NULL,
            Year_1997 float  NOT NULL,
            Year_1998 float  NOT NULL,
            Year_1999 float  NOT NULL,
            Year_2000 float  NOT NULL,
            Year_2001 float  NOT NULL,
            Year_2002 float  NOT NULL,
            Year_2003 float  NOT NULL,
            Year_2004 float  NOT NULL,
            Year_2005 float  NOT NULL,
            Year_2006 float  NOT NULL,
            Year_2007 float  NOT NULL,
            Year_2008 float  NOT NULL,
            Year_2009 float  NOT NULL,
            Year_2010 float  NOT NULL,
            Year_2011 float  NOT NULL,
            Year_2012 float  NOT NULL,
            Year_2013 float  NOT NULL,
            Year_2014 float  NOT NULL,
            Year_2015 float  NOT NULL,
            Year_2016 float  NOT NULL,
            Year_2017 float  NOT NULL,
            Year_2018 float  NOT NULL )ENGINE=InnoDB DEFAULT CHARSET=utf8 ";



        if ($this->oConni->query($crearTabla) === TRUE) {
            echo "Table MyGuests created successfully";
            $this->crearDatos($localizacion);
        } else {
            echo "Error creating table: " . $this->oConni->error;
        }
    }


        public function crearDatos($localizacion)
    {

        $consult = "LOAD DATA LOCAL INFILE '/var/www/html/dwes/WorldStatistics/datas/$localizacion.csv' INTO TABLE $localizacion
                    FIELDS TERMINATED BY ','
                    OPTIONALLY ENCLOSED BY '\"'
                    LINES TERMINATED BY '\n' IGNORE 1 LINES
                    (Country_Name, Country_Code, Indicator_Name, Indicator_Code, Year_1997, Year_1998, Year_1999, Year_2000,
                    Year_2001,Year_2002,Year_2003,Year_2004,Year_2005,Year_2006, Year_2007, Year_2008 , Year_2009 , Year_2010,
                    Year_2011, Year_2012,Year_2013,Year_2012,Year_2013,Year_2014,Year_2015,Year_2016,Year_2017,Year_2018)";





        if ($this->oConni->query($consult) === TRUE) {
            echo "Datos introducidos";
        } else {
            echo "Error introduciendo los datos: " . $this->oConni->error;
        }

    }


}