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
     * 
     * @return String
     * 
     * 
     * 
     * */
    public static function getFormatNow();

    public static function formatCalendarDetail(string $format);

    public static function formatNowDetail();

    public static function formatDetail(string $format);
}