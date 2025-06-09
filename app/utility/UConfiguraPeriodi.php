<?php
//variabili per il db
class UConfiguraPeriodi{
	public static $list;
	public function __construct(){}

	public static function inizializzaPeriodi(){
		self::$list = array([new DateTime("01-06-2025"), new DateTime("31-08-2025")],[new DateTime("01-12-2025"), new DateTime("31-03-2026")]);
	}
}
