<?php
namespace MVC\Domain;

interface CustomerCollection extends \Iterator {function add( Object $Customer);}

interface BConfigCollection extends \Iterator {function add( Object $BConfig );}

interface BAlbumCollection extends \Iterator {function add( Object $BAlbum );}
interface BImageCollection extends \Iterator {function add( Object $BImage );}

interface BTagCollection extends \Iterator {function add( Object $BTag );}
interface BNewsCollection extends \Iterator {function add( Object $BNews );}

interface GuestCollection extends \Iterator {function add( Object $Guest);}
interface PageCollection extends \Iterator {function add( Object $Page);}

?>