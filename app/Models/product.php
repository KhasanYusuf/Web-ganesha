<?php

namespace App\Models;
class product
{

    private static $products = [
        [
            "name" => "product 1",
            "id" => "1",
            "description" => "lorem"
        ],
        [
            "name" => "product 2",
            "id" => "2",
            "description" => "lorem"
        ]
        ];
 
    public static function all(){
        return collect(self::$products);
    }
    public static function find($name){
        $products = static::all();
        return $products ->firstWhere('id',$id);
    }
}
