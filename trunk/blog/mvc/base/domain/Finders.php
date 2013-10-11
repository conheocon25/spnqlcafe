<?php
namespace MVC\Domain;

interface Finder {
    function find( $id );
    function findAll();

    function update( Object $object );
    function insert( Object $obj );
    //function delete();
}

interface BConfigFinder  extends Finder {}

interface BAlbumFinder  extends Finder {}
interface BImageFinder  extends Finder {}

interface BTagFinder  extends Finder {}
interface BNewsFinder  extends Finder {}

interface CustomerFinder extends Finder {}
interface GuestFinder extends Finder {}

?>