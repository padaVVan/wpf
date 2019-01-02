<?php
namespace wpf\app\observers;

use \ReflectionClass;
use \InvalidArgumentException;
use \wpf\App;
use \wpf\app\Observer;
use \wpf\base\ConfigException;
use \wpf\base\FileNotFoundException;
use \wpf\helpers\WP;

/**
 * Class EntityDefiner
 * @package wpf\app\observers
 */
class EntityDefiner
	extends Observer {
<<<<<<< HEAD

    /**
     * @param App $app
     * @return bool|mixed
     * @throws FileNotFoundException
=======
    /**
     * @param App $app
     * @return bool|mixed
     * @throws ConfigException
     * @throws FileNotFoundException
     * @throws \ReflectionException
>>>>>>> 45ad725afa87de9646ccbe2af980aaf9dd8ffa18
     */
	public function doUpdate( App $app ) {
		if ( ! $app->entities ) {
			return FALSE;
		} elseif ( ! $app->entities_dir ) {
			throw new InvalidArgumentException( __("Parameter 'entities_dir' must have been defined in '/wpf/wpf.config.json' file.") );
		} elseif ( ! is_dir( WP::path( $app->entities_dir ) ) ) {
			throw new FileNotFoundException( __("Parameter 'entities_dir' in '/wpf/wpf.config.json' file must be correct path to folder.") );
		}
<<<<<<< HEAD

        $update = function() use ( $app ) {
            foreach ( $app->entities as $entity ) {
                $class   = str_replace( '/', '\\', "{$app->entities_dir}/{$entity}" );
                $reflect = new ReflectionClass( $class );
                if ( ! $reflect->implementsInterface( '\wpf\base\IEntity' ) ) {
                    throw new ConfigException( __( "Class '{$reflect->getName()}' must implement IEntity interface." ) );
                }
                $entity = new $class();
                $entity->register();
            }
        };

        add_action('init', $update );
=======
		
		$update = function () use ( $app ) {
			foreach ( $app->entities as $entity ) {
				$class   = str_replace('/', '\\', "{$app->entities_dir}/{$entity}");
				$reflect = new ReflectionClass( $class );
				if ( ! $reflect->implementsInterface('\wpf\base\IEntity') ) {
					throw new ConfigException( __("Class '{$reflect->getName()}' must implement IEntity interface.") );
				}
				$entity = new $class();
				$entity->register();
			}
		};
		
		add_action('init', $update );
>>>>>>> 531b9511917f0adb16dc9d9a6c3b8d82bd43a0c3
	}
}
