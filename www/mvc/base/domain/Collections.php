<?php
namespace MVC\Domain;

interface UserCollection extends \Iterator {function add( Object $user );}
interface ConfigCollection extends \Iterator {function add( Object $Config );}

interface TagCollection extends \Iterator {function add( Object $Tag );}
interface StoreCollection extends \Iterator {function add( Object $Store);}
interface StoreLocationCollection extends \Iterator {function add( Object $StoreLocation);}

interface AlbumCollection extends \Iterator {function add( Object $Album );}
interface ImageCollection extends \Iterator {function add( Object $Image );}

interface NewsCollection extends \Iterator {function add( Object $News );}
interface VideoCollection extends \Iterator {function add( Object $Video );	}

interface ProvinceCollection extends \Iterator {function add( Object $Province );}
interface DistrictCollection extends \Iterator {function add( Object $District );}

interface GuestCollection extends \Iterator {function add( Object $Guest);}
interface PageCollection extends \Iterator {function add( Object $Page);}
?>