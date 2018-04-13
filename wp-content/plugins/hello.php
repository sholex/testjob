<?php
// TODO: Change the header to match your details
/**
 * Plugin Name: Plugin Hello world
 * Description: Displaying hello world by shortcode [simple_shortcode]
 * Version: 1.0
 * Author: Alexey Sholomitski
 */


class HelloWorld {


    public function __construct() 
	{
		add_shortcode('simple_shortcode', array($this, 'test_shortcode')) ;

    }

	/*
	* Register custom shortcode 
	*/
	public function test_shortcode()
	{
		$color = $this->get_colortime();
		return "<div style=\"   ".$color['color']."  \" class=\"test-shortcode\">". date('H:i')." ".$color['time']." Hello Wordl! </div>";
	}
	
	/*
	* Get textcolor
	* depending on current time
	*/
	public function get_colortime()
	{

		if(date("H") < 12){
			
			return [
				'time'	=> 'Доброе утро!',
				'color' => "color:#d58512;background-color:#2e6da4;"
			];			

		}
		elseif(date("H") > 11 && date("H") < 18){
			
			return [
				'time'	=> 'Добрый день',
				'color' => "color:#ffff00;background-color:#23527c;"
			];
			
		}
		elseif(date("H") > 17){
			
			return [
				'time'	=> 'Добрый вечер',
				'color' => "color:#ffffff;background-color:#761c19;"
			];
			
		}
		elseif(date("H") > 23 ){
			
			return [
				'time'	=> 'Доброй ночи',
				'color' => "color:#ffffff;background-color:#1a1a1a;"
			];			

		}
		
	}
	
	
}


$HelloWorld = new HelloWorld();