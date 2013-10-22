<?php
namespace MVC\Mapper;
require_once( "mvc/base/domain/Collections.php");
require_once( "mvc/base/mapper/Collection.php");

class UserCollection extends Collection implements \MVC\Domain\UserCollection {function targetClass( ) {return "\MVC\Domain\User";}}
class UserRoleCollection extends Collection implements \MVC\Domain\UserRoleCollection {function targetClass( ) {return "\MVC\Domain\UserRole";}}
class ConfigCollection extends Collection implements \MVC\Domain\ConfigCollection {function targetClass( ) {return "\MVC\Domain\Config";}}

class AlbumCollection extends Collection implements \MVC\Domain\AlbumCollection {function targetClass( ) {return "\MVC\Domain\Album";}}
class ImageCollection extends Collection implements \MVC\Domain\ImageCollection {function targetClass( ) {return "\MVC\Domain\Image";}}

class TagCollection extends Collection implements \MVC\Domain\TagCollection {function targetClass( ) {return "\MVC\Domain\Tag";}}
class PostCollection extends Collection implements \MVC\Domain\PostCollection {function targetClass( ) {return "\MVC\Domain\Post";}}
class VideoCollection extends Collection implements \MVC\Domain\VideoCollection {function targetClass( ) {return "\MVC\Domain\Video";}}

class GuestCollection extends Collection implements \MVC\Domain\GuestCollection{function targetClass(){return "\MVC\Domain\Guest";}}
class StoreCollection extends Collection implements \MVC\Domain\StoreCollection{function targetClass(){return "\MVC\Domain\Store";}}
class StoreLocationCollection extends Collection implements \MVC\Domain\StoreLocationCollection{function targetClass(){return "\MVC\Domain\StoreLocation";}}
class StoreFeatureCollection extends Collection implements \MVC\Domain\StoreFeatureCollection{function targetClass(){return "\MVC\Domain\StoreFeature";}}

class FeatureCollection extends Collection implements \MVC\Domain\FeatureCollection {function targetClass( ) {return "\MVC\Domain\Feature";}}

class ProvinceCollection extends Collection implements \MVC\Domain\ProvinceCollection{function targetClass(){return "\MVC\Domain\Province";}}
class DistrictCollection extends Collection implements \MVC\Domain\DistrictCollection{function targetClass(){return "\MVC\Domain\District";}}

class PageCollection extends Collection implements \MVC\Domain\PageCollection{function targetClass(){return "\MVC\Domain\Page";}}

?>