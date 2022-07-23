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



    /**
     * 
     * 
     * 
     * @return String
     * 
     * 
     */
    public static function getFormat();


    /**
     * 
     * 
     * 
     * @return String
     * 
     * 
     * 
     */
    public static function getFormatDetail();
}