<?php
namespace MVC\Mapper;
require_once( "mvc/base/domain/Collections.php");
require_once( "mvc/base/mapper/Collection.php");

class UserCollection extends Collection implements \MVC\Domain\UserCollection {function targetClass( ) {return "\MVC\Domain\User";}}
class ConfigCollection extends Collection implements \MVC\Domain\ConfigCollection {function targetClass( ) {return "\MVC\Domain\Config";}}

class BAlbumCollection extends Collection implements \MVC\Domain\BAlbumCollection {function targetClass( ) {return "\MVC\Domain\BAlbum";}}
class BImageCollection extends Collection implements \MVC\Domain\BImageCollection {function targetClass( ) {return "\MVC\Domain\BImage";}}

class TagCollection extends Collection implements \MVC\Domain\TagCollection {function targetClass( ) {return "\MVC\Domain\Tag";}}
class NewsCollection extends Collection implements \MVC\Domain\NewsCollection {function targetClass( ) {return "\MVC\Domain\News";}}
class VideoCollection extends Collection implements \MVC\Domain\VideoCollection {function targetClass( ) {return "\MVC\Domain\Video";}}

class GuestCollection extends Collection implements \MVC\Domain\GuestCollection{function targetClass(){return "\MVC\Domain\Guest";}}
class CustomerCollection extends Collection implements \MVC\Domain\CustomerCollection{function targetClass(){return "\MVC\Domain\Customer";}}

class PageCollection extends Collection implements \MVC\Domain\PageCollection{function targetClass(){return "\MVC\Domain\Page";}}

?>