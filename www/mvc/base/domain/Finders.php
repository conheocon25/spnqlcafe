<?php
namespace MVC\Domain;

interface Finder {
    function find( $id );
    function findAll();

    function update( Object $object );
    function insert( Object $obj );
    //function delete();
}

interface UserFinder  extends Finder {}
interface ConfigFinder  extends Finder {}

interface BAlbumFinder  extends Finder {}
interface BImageFinder  extends Finder {}

interface NewsFinder  extends Finder {}
interface VideoFinder  extends Finder {}
interface TagFinder  extends Finder {}
interface CustomerFinder extends Finder {}

interface GuestFinder extends Finder {}

?>