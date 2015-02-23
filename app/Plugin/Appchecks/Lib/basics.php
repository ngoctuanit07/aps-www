<?php
	/**
	 * Fonctions utilitaires pour le plugin Appchecks.
	 *
	 * PHP 5.3
	 *
	 * @package Appchecks
	 * @subpackage Lib
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */

	/**
	 * Retourne un nombre qui sera plus grand pour une version plus élevée.
	 *
	 * @see http://az.php.net/manual/en/function.phpversion.php (Exemple 2: PHP_VERSION_ID)
	 *
	 * @param string $version
	 * @return integer
	 */
	function version_id( $version ) {
		$version = explode( '.', $version );
		return ( @$version[0] * 1000000 + @$version[1] * 10000 + @$version[2] * 100 + @$version[3] );
	}

	/**
	 *
	 * @param string $actual
	 * @param string $low
	 * @param string $high
	 * @return boolean
	 */
	function version_difference( $actual, $low, $high = null ) {
		$actual = version_id( $actual );
		$low = version_id( $low );
		$high = ( is_null( $high ) ? null : version_id( $high ) );

		$success = ( $actual >= $low );

		if( !is_null( $high ) ) {
			$success = ( $actual < $high );
		}

		return $success;
	}
        
        
        /**
	 * Retourne le numéro de version Apache utilisé, que l'on soit en mode CGI
	 * ou mod_php (dans ce cas, on se sert de la fonction apache_get_version()).
	 *
	 * @return string
	 */
	function apache_version() {
		if( function_exists( 'apache_get_version' ) ) {
			$rawVersion = apache_get_version();
		}
		else {
			$rawVersion = 'Apache/0';
			$output = array();
			@exec( apache_bin().' -v', $output );
			if( !empty( $output ) ) {
				$rawVersion = $output[0];
			}
		}

		return preg_replace( '/^.*Apache\/([^ ]+) .*$/', '\1', $rawVersion );
	}
        
        /**
	 * Retourne la liste des modules chargés par Apache, que l'on soit en mode CGI
	 * ou mod_php (dans ce cas, on se sert de la fonction apache_get_modules()).
	 *
	 * @return array
	 */
	function apache_modules() {
		if( function_exists( 'apache_get_modules' ) ) {
			return apache_get_modules();
		}
		else {
			$return = array();
			$output = array();
			@exec( apache_bin().' -M', $output );
			if( !empty( $output ) ) {
				foreach( $output as $module ) {
					$return[] = 'mod_'.trim( preg_replace( '/^(.*)_module.*$/', '\1', $module ) );
				}
			}
			return $return;
		}
	}
?>
