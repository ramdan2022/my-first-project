<?php

// third step

if(!function_exists('dnb')){

   function dnb($item,$die=true){

        echo "<pre>";
        var_dump($item);
        echo "</pre>";

    if($die){
            die($item);
    }

   } 


}
