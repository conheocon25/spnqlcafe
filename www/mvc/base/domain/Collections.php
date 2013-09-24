<?php
namespace MVC\Domain;

interface AppCollection extends \Iterator {function add( Object $App );}
interface UserCollection extends \Iterator {function add( Object $user );}
interface ConfigCollection extends \Iterator {function add( Object $Config );}

interface BAlbumCollection extends \Iterator {function add( Object $BAlbum );}
interface BImageCollection extends \Iterator {function add( Object $BImage );}

interface CategoryNewsCollection extends \Iterator {function add( Object $CategoryNews );	}
interface NewsCollection extends \Iterator {function add( Object $News );}

interface CategoryVideoCollection extends \Iterator {function add( Object $CategoryVideo );	}
interface VideoCollection extends \Iterator {function add( Object $Video );	}

interface GuestCollection extends \Iterator {function add( Object $Guest);}

interface CategoryPackageCollection extends \Iterator {function add( Object $CategoryPackage);}
interface CustomerCollection extends \Iterator {function add( Object $Customer);}

interface PageCollection extends \Iterator {function add( Object $Page);}

?>
