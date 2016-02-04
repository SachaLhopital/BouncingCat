<?php

class Conf {

    private static $database = array(
        'hostname' => 'sql3',  // infolimon (ou localhost)
        'database' => 'axelsite', // votre login dans notre cas
        'login' => 'axelsite',
        'password' => ']hr[zRTcwn12'
    );
    
    private static $debug = true;


	private static $seed = 'ChatMania';
	
	static public function getSeed() {
		return self::$seed;
	}
    static public function getLogin() {
        return self::$database['login'];
    }

    static public function getHostname() {
        return self::$database['hostname'];
    }

    static public function getDatabase() {
        return self::$database['database'];
    }

    static public function getPassword() {
        return self::$database['password'];
    }
    
    static public function getDebug() {
        return self::$debug;
    }

}

?>
