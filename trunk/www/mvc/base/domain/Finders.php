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

interface AlbumFinder  extends Finder {}
interface ImageFinder  extends Finder {}

interface NewsFinder  extends Finder {}
interface VideoFinder  extends Finder {}
interface TagFinder  extends Finder {}
interface StoreFinder extends Finder {}

interface GuestFinder extends Finder {}
?>