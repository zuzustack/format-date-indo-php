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

    public static function formatCalendarDetail(string $format) // "dd/mm/yyyy_hh:ii:ss" format input
    {
        $temp = \explode('_', $format);

        $date = \explode('/', $temp[0]);
        $time = $temp[1];

        // check if user input > month error
        try{
            if ( \intval($date[1]) > 12) {
                throw new ErrorHandle('tooManyMonth');
            }
        }catch (ErrorHandle $e){
            return $e->errorMessage() . "\n";
        }

        // get data from $calendar
        $bulan = Format::$calendar[\intval($date[1]) - 1 ][0];
        $max_hari = Format::$calendar[\intval($date[1])][1];

        
        // check if user input > days error
        try{
            if ( $max_hari < \intval($date[0])) {
                throw new ErrorHandle('tooManyDays' , $max_hari);
            }
        }catch (ErrorHandle $e){
            return $e->errorMessage() . "\n";
        }


        // get timestamp from input user
        $timestamp = \mktime(0,0,0,\intval($date[1]),\intval($date[0]),\intval($date[2]));
        $tm_hari = \date('N', $timestamp) - 1;

        // create text to indonesian language
        return Format::$hari[$tm_hari] . ", " . $date[0] . " " . $bulan . " " . $date[2] . ". Waktu: " . $time; 
    }


    public static function formatNow(){
        $format = date("d/m/Y");
        return Format::formatCalendar($format);
    }


    public static function getFormat(){
        return date("d/m/Y");
    }

    public static function getFormatDetail(){
        return date("d/m/Y_H:i:s");
    }

}