<?php
namespace MVC\Domain;

interface UserCollection extends \Iterator {function add( Object $user );}
interface UserRoleCollection extends \Iterator {function add( Object $UserRole );}
interface ConfigCollection extends \Iterator {function add( Object $Config );}

interface TagCollection extends \Iterator {function add( Object $Tag );}
interface StoreCollection extends \Iterator {function add( Object $Store);}
interface StoreLocationCollection extends \Iterator {function add( Object $StoreLocation);}
interface StoreFeatureCollection extends \Iterator {function add( Object $StoreFeature);}
interface StoreUserCollection extends \Iterator {function add( Object $StoreUser);}

interface FeatureCollection extends \Iterator {function add( Object $Feature );}

interface AlbumCollection extends \Iterator {function add( Object $Album );}
interface ImageCollection extends \Iterator {function add( Object $Image );}

interface PostCollection extends \Iterator {function add( Object $Post );}
interface VideoCollection extends \Iterator {function add( Object $Video );	}

interface ProvinceCollection extends \Iterator {function add( Object $Province );}
interface DistrictCollection extends \Iterator {function add( Object $District );}

interface GuestCollection extends \Iterator {function add( Object $Guest);}
interface PageCollection extends \Iterator {function add( Object $Page);}
?>