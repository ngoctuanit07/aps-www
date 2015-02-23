<?php
	/**
	 * Code source de la classe DatabaseCheckRelationsShell.
	 *
	 * PHP 5.3
	 *
	 * @package Database
	 * @subpackage Console.Command
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */
	App::uses( 'DatabaseRelations', 'Database.Utility' );

	/**
	 * La classe DatabaseCheckRelationsShell ...
	 *
	 * @package app.Console.Command
	 */
	class DatabaseCheckRelationsShell extends AppShell
	{
		/**
		 * La constante à utiliser dans la méthode _stop() en cas de succès.
		 */
		const SUCCESS = 0;

		/**
		 * La constante à utiliser dans la méthode _stop() en cas d'erreur.
		 */
		const ERROR = 1;

		/**
		 * Démarrage du shell
		 */
		public function startup() {
			parent::startup();
		}

		/**
		 * Lignes de bienvenue.
		 */
		protected function _welcome() {
			parent::_welcome();
		}

		/**
		 * Méthode principale.
		 */
		public function main() {
			$relations = array();

			$modelNames = App::objects( 'model' );
			foreach( $modelNames as $modelName ) {
				$model = ClassRegistry::init( $modelName );
				$relations[$modelName] = DatabaseRelations::relations( $model );
			}

			$missing = DatabaseRelations::missing( $relations );

			// Affichage des relations manquantes
			$errors = array();
			$msgstr = "Relation non définie: <error>%s</error> -> <error>%s</error>";

			if( isset( $missing['from'] ) && !empty( $missing['from'] ) ) {
				foreach( $missing['from'] as $from => $to ) {
					$errors[] = sprintf( $msgstr, $from, $to );
				}
			}

			if( isset( $missing['to'] ) && !empty( $missing['to'] ) ) {
				foreach( $missing['to'] as $from => $to ) {
					$errors[] = sprintf( $msgstr, $to, $from );
				}
			}

			if( !empty( $errors ) ) {
				sort( $errors );

				$this->err( sprintf( "<error>%d relation(s) non définie(s)</error>", count( $errors ) ) );

				foreach( $errors as $error ) {
					$this->err( "\t{$error}" );
				}

				$this->_stop( self::ERROR );
			}
			else {
				$this->out( "<success>Aucune relation manquante<success>" );
				$this->_stop( self::SUCCESS );
			}
		}

		/**
		 * Paramétrages et aides du shell.
		 */
		public function getOptionParser() {
			$Parser = parent::getOptionParser();
			return $Parser;
		}
	}
?>