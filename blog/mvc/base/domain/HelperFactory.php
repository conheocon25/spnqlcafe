<?php
namespace MVC\Domain;
if ( ! isset( $EG_DISABLE_INCLUDES ) ) {
	require_once( "mvc/mapper/App.php" );
	require_once( "mvc/mapper/User.php" );
	require_once( "mvc/mapper/Config.php" );	
	require_once( "mvc/mapper/BAlbum.php" );
	require_once( "mvc/mapper/BImage.php" );
	require_once( "mvc/mapper/CategoryNews.php" );
	require_once( "mvc/mapper/News.php" );
	require_once( "mvc/mapper/CategoryVideo.php" );
	require_once( "mvc/mapper/Video.php" );
	require_once( "mvc/mapper/Guest.php");
	require_once( "mvc/mapper/CategoryPackage.php" );
	require_once( "mvc/mapper/Customer.php");
}

class HelperFactory {
    static function getFinder( $type ) {
        $type = preg_replace( "/^.*_/", "", $type );
        $mapper = "\\MVC\\Mapper\\{$type}";
        if ( class_exists( $mapper ) ) {
            return new $mapper();
        }
        throw new \MVC\Base\AppException( "Không biết: $mapper" );
    }

	static function getModel( $model ) {
        $model = preg_replace( "/^.*_/", "", $model );
        $model = "\\MVC\\Domain\\{$model}";
        if ( class_exists( $model ) ) {
            return new $model();
        }
        throw new \MVC\Base\AppException( "Không biết: $model" );
    }
	
    static function getCollection( $type ) {
        $type = preg_replace( "/^.*_/", "", $type );
        $collection = "\\MVC\\Mapper\\{$type}Collection";
        if ( class_exists( $collection ) ) {
            return new $collection();
        }
        throw new \MVC\Base\AppException( "Không biết: $collection" );
    }
	
}
?>
