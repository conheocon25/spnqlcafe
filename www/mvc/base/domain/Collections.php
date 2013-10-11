<?php
namespace MVC\Domain;

interface UserCollection extends \Iterator {function add( Object $user );}
interface ConfigCollection extends \Iterator {function add( Object $Config );}

interface TagCollection extends \Iterator {function add( Object $Tag );}
interface CustomerCollection extends \Iterator {function add( Object $Customer);}

interface BAlbumCollection extends \Iterator {function add( Object $BAlbum );}
interface BImageCollection extends \Iterator {function add( Object $BImage );}

interface NewsCollection extends \Iterator {function add( Object $News );}
interface VideoCollection extends \Iterator {function add( Object $Video );	}

interface GuestCollection extends \Iterator {function add( Object $Guest);}
interface PageCollection extends \Iterator {function add( Object $Page);}
?>
