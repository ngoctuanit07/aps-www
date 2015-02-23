<?php
	/**
	 * Boostrap du plugin Database.
	 *
	 * PHP 5.3
	 *
	 * @package Database
	 * @subpackage Config
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */

	if( !function_exists( 'cacheKey' ) ) {
		/**
		 * Retourne le nom de la clé de l'entrée de cache formée de l'assemblage des
		 * paramètres.
		 *
		 * @param array $params
		 * @param boolean $underscore
		 * @return string
		 */
		function cacheKey( array $params, $underscore = false ) {
			$cacheKey = implode( '_', $params );

			if( $underscore ) {
				$cacheKey = Inflector::underscore( $cacheKey );
			}

			return $cacheKey;
		}
	}

	if( !function_exists( 'preg_replace_array' ) ) {
		/**
		 * Effectue des remplacements d'expressions réulières d'un array, de
		 * manière récursive.
		 *
		 * @param array $array
		 * @param array $replacements Clés regexpes, valeurs chaînes de remplacement
		 * @return array
		 */
		function preg_replace_array( array $array, array $replacements ) {
			$newArray = array();
			foreach( $array as $key => $value ) {
				foreach( $replacements as $pattern => $replacement ) {
					$key = preg_replace( $pattern, $replacement, $key );
				}

				if( is_array( $value ) ) {
					$value = preg_replace_array( $value, $replacements );
				}
				else {
					foreach( $replacements as $pattern => $replacement ) {
						$value = preg_replace( $pattern, $replacement, $value );
					}
				}
				$newArray[$key] = $value;
			}
			return $newArray;
		}
	}

	if( !function_exists( 'alias_querydata' ) ) {
		/**
		 * Remplace des mots par d'autres dans un querydata ou une partie de
		 * celui-ci.
		 *
		 * Exemple:
		 * 	$subject = array( 'Foo.id' => array( 'Bar' => 1 ), 'Foobar' => array( 'Foo.bar = Bar.foo' ) );
		 * 	$replacement = array( 'Foo' => 'Baz' );
		 * 	Résultat: array( 'Baz.id' => array( 'Bar' => 1 ), 'Foobar' => array( 'Baz.bar = Bar.foo' ) );
		 *
		 * @param array $subject
		 * @param array $replacement
		 * @return array
		 */
		function alias_querydata( array $subject, array $replacement ) {
			$regexes = array( );
			foreach( $replacement as $key => $value ) {
				$key = "/(?<!\.)(?<!\w)({$key})(?!\w)/";
				$regexes[$key] = $value;
			}
			return preg_replace_array( $subject, $regexes );
		}
	}
?>
