<?php
namespace Zuzustack\FormatDateIndoPhp;
require __DIR__ . "/Contracts/FormatContract.php";
require __DIR__ . "/Error/ErrorHandle.php";
use Zuzustack\FormatDateIndoPhp\Contracts\FormatContract;
use Zuzustack\FormatDateIndoPhp\Error\ErrorHandle;

class Format implements FormatContract{
    private static $calendar = [
        ['Januari', "31"], 
        ['Februari', "28"], 
        ['Maret', "31"], 
        ['April', "30"], 
        ['Mei', "31"], 
        ["Juni", "30"], 
        ["Juli", "31"], 
        ["Agustus", "31"], 
        ["September", "30"], 
        ["Oktober", "31"], 
        ["November", "30"], 
        ["Desember", "31"]
    ];
    
    public static function formatCalendar(string $format)  // "yyyy/mm/dd" format input
    {   
        $arr = explode("/",$format);
        $arr[1] = intval($arr[1]);

        $bulan = Format::$calendar[$arr[1] - 1][0];
        $max_hari = Format::$calendar[$arr[1] - 1][1];

        try{
            if ($max_hari < $arr[2] ) {
                throw new ErrorHandle("tooManyDays", $bulan , $max_hari );
                
            }
        }catch (ErrorHandle $e){
            echo $e->errorMessage() . "\n";
        }


    }
}