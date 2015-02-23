<?php
	/**
	 * Code source de la classe DatabaseDictionaryShell.
	 *
	 * PHP 5.3
	 *
	 * @package Database
	 * @subpackage Console.Command
	 * @license CeCiLL V2 (http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html)
	 */
	App::uses( 'Shell', 'Console' );
	App::uses( 'ConnectionManager', 'Model' );

	/**
	 * La classe DatabaseDictionaryShell ...
	 *
	 * @package Database
	 * @subpackage Console.Command
	 */
	class DatabaseDictionaryShell extends AppShell
	{
		/**
		 * Les Tasks utilisées.
		 *
		 * @var array
		 */
		public $tasks = array(
			'Database.DatabaseTables'
		);


		/**
		 * Main function.
		 *
		 * @return void
		 */
		public function main() {
			$tables = $this->DatabaseTables->read( explode( ', ', $this->params['connection'] ) );
			$output = $this->DatabaseTables->render( $tables );

			file_put_contents( $this->params['file'], $output );
		}

		/**
		 * get the option parser
		 *
		 * TODO: noms de tables en regexp
		 *
		 * @return void
		 */
		public function getOptionParser() {
			$Parser = parent::getOptionParser();

			$Parser/*->description( __d( 'cake_console', 'Bake a controller for a model. Using options you can bake public, admin or both.' ) )*/
				->addOption(
					'connection', array(
						'short' => 'c',
						'help' => 'connection',
						'default' => 'default',
						'choices' => array_keys( ConnectionManager::enumConnectionObjects() )
					)
				)
				->addOption(
					'file', array(
						'short' => 'f',
						'help' => 'file',
						'default' => 'dictionary.html'
					)
				)
				/*->epilog( __d( 'cake_console', 'Omitting all arguments and options will enter into an interactive mode.' ) )*/;

			return $Parser;
		}
	}
?>