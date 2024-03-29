<?php
namespace MVC\Domain;
if ( ! isset( $EG_DISABLE_INCLUDES ) ){
	require_once( "mvc/mapper/Tag.php");
	require_once( "mvc/mapper/User.php");
	require_once( "mvc/mapper/UserRole.php");
	require_once( "mvc/mapper/Config.php");
	require_once( "mvc/mapper/Album.php");
	require_once( "mvc/mapper/Image.php");
	
	require_once( "mvc/mapper/Feature.php");
	
	require_once( "mvc/mapper/Post.php" );	
	require_once( "mvc/mapper/Video.php" );
	require_once( "mvc/mapper/Guest.php");
	
	require_once( "mvc/mapper/Store.php");
	require_once( "mvc/mapper/StoreLocation.php");
	require_once( "mvc/mapper/StoreFeature.php");
	require_once( "mvc/mapper/StoreUser.php");
	
	require_once( "mvc/mapper/Province.php");
	require_once( "mvc/mapper/District.php");
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

    static function getCollection( $type ) {
        $type = preg_replace( "/^.*_/", "", $type );
        $collection = "\\MVC\\Mapper\\{$type}Collection";
        if ( class_exists( $collection ) ) {
            return new $collection();
        }
        throw new \MVC\Base\AppException( "Không biết: $collection" );
    }
	
	static function getModel( $model ) {
        $model = preg_replace( "/^.*_/", "", $model );
        $model = "\\MVC\\Domain\\{$model}";
        if ( class_exists( $model ) ){
            return new $model();
        }
        throw new \MVC\Base\AppException( "Không biết: $model" );
    }
}
?>