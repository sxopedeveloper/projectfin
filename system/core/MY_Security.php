<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Security extends CI_Security {
    function __construct()
    {
      parent::__construct();
		}

	// --------------------------------------------------------------------
	
	/*
		* Modified for cb_cms
	 */
	protected function _remove_evil_attributes($str, $is_image)
	{
		// All javascript event handlers (e.g. onload, onclick, onmouseover), style, and xmlns
		$allowed = array("your allowed url's without domain like '/admin/edittext/'");
		if(in_array($_SERVER['REQUEST_URI'],$allowed)){
			$evil_attributes = array('on\w*', 'xmlns');
		}else{
			$evil_attributes = array('on\w*', 'style', 'xmlns');
		}
		
		if ($is_image === TRUE)
		{
			/*
			 * Adobe Photoshop puts XML metadata into JFIF images, 
			 * including namespacing, so we have to allow this for images.
			 */
			unset($evil_attributes[array_search('xmlns', $evil_attributes)]);
		}
		
		do {
			$str = preg_replace(
				"#<(/?[^><]+?)([^A-Za-z\-])(".implode('|', $evil_attributes).")(\s*=\s*)([\"][^>]*?[\"]|[\'][^>]*?[\']|[^>]*?)([\s><])([><]*)#i",
				"<$1$6",
				$str, -1, $count
			);
		} while ($count);
		
		return $str;
	}

		
} 

?>