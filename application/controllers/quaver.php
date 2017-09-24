<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Quaver extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
    	$string = 'We the People of the United States, in Order to form a more perfect Union, establish Justice, insure domestic Tranquility, provide for the common defence, promote the general Welfare, and secure the Blessings of Liberty to ourselves and our Posterity, do ordain and establish this Constitution for the United States of America.';
    	count_frontees_backees($string);
	}

	/**
	 * 
	 *
	 *
	 *
	 */
	private function count_frontees_backees($string) {
		$regex = '/(t\B.e\b)|(\bt)|(e\b)/i';
		preg_match_all($regex, $string, $matches);
		$te = count(array_filter($matches[1]));
		$t = count(array_filter($matches[2])) + $te;
		$e = count(array_filter($matches[3])) + $te;
		echo $t."<br>";
		echo $e."<br>";
		echo $te."<br>";
		return;
	}
}
