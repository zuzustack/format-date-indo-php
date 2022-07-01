<?php
namespace Zuzustack\FormatDateIndoPhp\Contracts;


interface FormatContract{
    /** 
     * 
     * 
     * @param String $format
     * 
     * @return String
     * 
     * 
     *
     * */
    public static function formatCalendar(string $format) ;


    /** 
     * 
     * 
     * 
     * 
     * @return String
     * 
     * 
     * 
     * */
    public static function formatNow();
}