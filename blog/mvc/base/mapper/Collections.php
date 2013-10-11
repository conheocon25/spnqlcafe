<?php
namespace MVC\Mapper;
require_once( "mvc/base/domain/Collections.php");
require_once( "mvc/base/mapper/Collection.php");

class CustomerCollection extends Collection implements \MVC\Domain\CustomerCollection{function targetClass(){return "\MVC\Domain\Customer";}}
class BConfigCollection extends Collection implements \MVC\Domain\BConfigCollection {function targetClass( ) {return "\MVC\Domain\BConfig";}}

class BAlbumCollection extends Collection implements \MVC\Domain\BAlbumCollection {function targetClass( ) {return "\MVC\Domain\BAlbum";}}
class BImageCollection extends Collection implements \MVC\Domain\BImageCollection {function targetClass( ) {return "\MVC\Domain\BImage";}}

class BTagCollection extends Collection implements \MVC\Domain\BTagCollection {function targetClass( ) {return "\MVC\Domain\BTag";}}
class BNewsCollection extends Collection implements \MVC\Domain\BNewsCollection {function targetClass( ) {return "\MVC\Domain\BNews";}}

class GuestCollection extends Collection implements \MVC\Domain\GuestCollection{function targetClass(){return "\MVC\Domain\Guest";}}
class PageCollection extends Collection implements \MVC\Domain\PageCollection{function targetClass(){return "\MVC\Domain\Page";}}

?>