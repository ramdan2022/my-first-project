<?php

namespace App\Helpers;

class Functions {



     public  static  function dnb($item,$die=true){

            echo "<pre>";
            var_dump($item);
            echo "</pre>";


            if($die){
                die($item);
            }

        }

}