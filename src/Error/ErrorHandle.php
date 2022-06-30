<?php
namespace Zuzustack\FormatDateIndoPhp\Error;
use Exception;

class ErrorHandle extends Exception{
    protected static $errMsg;
    public function __construct(string $typeErr, $bulan = "" , $max_hari = ""){
        if ($typeErr = "tooManyDays") {
            ErrorHandle::$errMsg = "[ERROR]  Terlalu banyak hari di masukan, bulan " . $bulan . " Seharusnya tidak lebih dari " . $max_hari . " hari"; 
        }
    }

    public function errorMessage(){
        return ErrorHandle::$errMsg;
    }

}