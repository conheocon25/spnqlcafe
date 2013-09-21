<?php
namespace MVC\Mapper;
require_once( "mvc/base/domain/Collections.php");
require_once( "mvc/base/mapper/Collection.php");

class AppCollection extends Collection implements \MVC\Domain\AppCollection {function targetClass( ) {return "\MVC\Domain\App";}}
class UserCollection extends Collection implements \MVC\Domain\UserCollection {function targetClass( ) {return "\MVC\Domain\User";}}
class ConfigCollection extends Collection implements \MVC\Domain\ConfigCollection {function targetClass( ) {return "\MVC\Domain\Config";}}

class CategoryAlbumCollection extends Collection implements \MVC\Domain\CategoryAlbumCollection {function targetClass( ) {return "\MVC\Domain\CategoryAlbum";}}
class AlbumCollection extends Collection implements \MVC\Domain\AlbumCollection {function targetClass( ) {return "\MVC\Domain\Album";}}

class CategoryNewsCollection extends Collection implements \MVC\Domain\CategoryNewsCollection {function targetClass( ) {return "\MVC\Domain\CategoryNews";}}
class NewsCollection extends Collection implements \MVC\Domain\NewsCollection {function targetClass( ) {return "\MVC\Domain\News";}}

class CategoryVideoCollection extends Collection implements \MVC\Domain\CategoryVideoCollection {function targetClass( ) {return "\MVC\Domain\CategoryVideo";}}
class VideoCollection extends Collection implements \MVC\Domain\VideoCollection {function targetClass( ) {return "\MVC\Domain\Video";}}

class GuestCollection extends Collection implements \MVC\Domain\GuestCollection{function targetClass(){return "\MVC\Domain\Guest";}}

class CategoryPackageCollection extends Collection implements \MVC\Domain\CategoryPackageCollection {function targetClass( ) {return "\MVC\Domain\CategoryPackage";}}
class CustomerCollection extends Collection implements \MVC\Domain\CustomerCollection{function targetClass(){return "\MVC\Domain\Customer";}}

class PageCollection extends Collection implements \MVC\Domain\PageCollection{function targetClass(){return "\MVC\Domain\Page";}}

?>