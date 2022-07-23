<?php
namespace Zuzustack\FormatDateIndoPhp\Error;
use Exception;

class ErrorHandle extends Exception{
    protected static $errMsg;
    public function __construct(string $typeErr, $option = ""){
        if ($typeErr == "tooManyDays") {
            ErrorHandle::$errMsg = "[ERROR] Terlalu banyak nilai hari dimasukan, sesuaikan seharusnya tidak lebih dari " . $option;
        }else if ($typeErr == "tooManyMonth") {
            ErrorHandle::$errMsg = "[ERROR] Terlalu banyak nilai bulan dimasukan, seharusnya tidak lebih dari 12 bulan";
        }
    }

    public function errorMessage(){
        return ErrorHandle::$errMsg;
    }

}