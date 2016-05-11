<?php

class ext_update {

	/**
 	 * The entry function
 	 * Return : TRUE: updatescript im Extension Manager verfügbar
 	 * FALSE: updatescript nicht verfügbar
 	 * Damit kann z.B. eine Funktion geschrieben werden die nur ein einmaliges Ausführen
 	 * des Scriptes erlaubt.
 	 */
	public function access() 
	{
		return FALSE;
	}
	
	/**
	 * Main function, returning the HTML content
	 *
	 * @return string HTML
	 */
	function main()	
	{
		$content = 'test';
		
		$flashMessage = t3lib_div::makeInstance('t3lib_FlashMessage',$content);
				
		return $flashMessage->render();
		
		
		
		
		
		
		
		//return $content;
	}
	
} //end of class ext_update
?>