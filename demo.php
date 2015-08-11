<?php
 	require_once( "img.class.php" );
    $t = new thumbhandler( );
    $t->setsrcimg( "../".$file_url );
    $t->setdstimg( "../".$file_url );
    $t->createimg( 600, 600 );
?>