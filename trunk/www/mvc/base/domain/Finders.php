<?php
namespace MVC\Domain;

interface Finder {
    function find( $id );
    function findAll();

    function update( Object $object );
    function insert( Object $obj );
    //function delete();
}

interface UserFinder  			extends Finder {}
interface UserRoleFinder  		extends Finder {}
interface ConfigFinder  		extends Finder {}

interface AlbumFinder  			extends Finder {}
interface ImageFinder  			extends Finder {}

interface FeatureFinder  		extends Finder {}

interface PostFinder  			extends Finder {}
interface VideoFinder  			extends Finder {}
interface TagFinder  			extends Finder {}

interface StoreFinder 			extends Finder {}
interface StoreLocationFinder 	extends Finder {}
interface StoreFeatureFinder 	extends Finder {}
interface StoreUserFinder 		extends Finder {}

interface ProvinceFinder 		extends Finder {}
interface DistrictFinder 		extends Finder {}

interface GuestFinder 			extends Finder {}
?>