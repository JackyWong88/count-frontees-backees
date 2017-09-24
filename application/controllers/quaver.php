<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Quaver extends CI_Controller {
	/**
	 * When a POST comes, it triggers the primary function.
	 * Loads default page.
	 * 
	 */
	public function index()
	{
    	if($_POST) {
    		$result = $this->count_frontees_backees($_POST['text']);
    	}
    	$this->load->view('quaver');
	}

	/**
	 * Uses regular expressions to find all matches starting by grouping
	 * words starting with 't' and ending with 'e', then by grouping words
	 * that start with 't', and lastly grouping words ending with 'e'.
	 * Then echos a message using javascript with the counts.
	 * 
	 * @param string $string The text to parse
	 */
	private function count_frontees_backees($string) {
		$regex = '/(\bt.?e\b)|(\bt)|(e\b)/i';
		preg_match_all($regex, $string, $matches);
		$te = count(array_filter($matches[1]));
		$t = count(array_filter($matches[2])) + $te;
		$e = count(array_filter($matches[3])) + $te;

		echo "<script type='text/javascript'>alert('"
		.$t." words start with the letter \"t\"\\n"
		.$e." words end with the letter \"e\"\\n"
		.$te." words start with the letter \"t\" and end with the letter \"e\""
		."');</script>";
		return;
	}
}
