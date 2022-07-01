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

    private static $hari = [
        'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", "Sabtu", "Minggu"
    ];
    
    public static function formatCalendar(string $format)  // "dd/mm/yyyy" format input
    {   
        // Explode string to array with delimiter /
        $arr = \explode('/', $format);


        // check if user input > month error
        try{
            if ( \intval($arr[1]) > 12) {
                throw new ErrorHandle('tooManyMonth');
            }
        }catch (ErrorHandle $e){
            return $e->errorMessage() . "\n";
        }

        // get data from $calendar
        $bulan = Format::$calendar[\intval($arr[1]) - 1 ][0];
        $max_hari = Format::$calendar[\intval($arr[1])][1];

        
        // check if user input > days error
        try{
            if ( $max_hari < \intval($arr[0])) {
                throw new ErrorHandle('tooManyDays' , $max_hari);
            }
        }catch (ErrorHandle $e){
            return $e->errorMessage() . "\n";
        }


        // get timestamp from input user
        $timestamp = \mktime(0,0,0,\intval($arr[1]),\intval($arr[0]),\intval($arr[2]));
        $tm_hari = \date('N', $timestamp) - 1;

        // create text to indonesian language
        return Format::$hari[$tm_hari] . ", " . $arr[0] . " " . $bulan . " " . $arr[2]; 
    }





    public static function formatNow(){
        date_default_timezone_set("Asia/Jakarta");
        $format = date("Y/m/d");
        return Format::$hari[date('N')] . ', ' . Format::formatCalendar($format);
    }
}