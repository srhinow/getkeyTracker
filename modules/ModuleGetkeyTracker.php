<?php
/**
 * PHP version 5
 * Class ModuleGetkeyTracker
 *
 * @copyright  sr-tag 2015
 * @author     Sven Rhinow <support@sr-tag.de>

 */
class ModuleGetkeyTracker extends Module
{
	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->wildcard = sprintf('### GETKEY-TRACKER (%s) ###',$this->getkey);
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'typolight/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile()
	{
		if($_GET[$this->getkey]) $this->setBesucherzahl();
	}

	/**
	* zaehle die Besucherzahl eins hoch
	*/
	private function setBesucherzahl()
	{
		if($_GET[$this->getkey] == '') return;

		$getval = $_GET[$this->getkey];
		$trackfilePath = $GLOBALS['GETKEYTRACKER']['filepath'].$this->getkey.$GLOBALS['GETKEYTRACKER']['fileentity'];

		//Datei oeffnen/ anlegen
		$file = new File($trackfilePath);
		
		//alte Zahl holen
		$ca = $file->getContentAsArray();

		//JSONdaten falls vorhanden auslesen
		$trackArr = json_decode($ca[0],true);

		//wenn Datei neu erstellt wurde
		if(!is_array($trackArr)) $trackArr = array();
		$besucherzahl = (int) $trackArr[$getval];

		$trackArr[$getval] = $besucherzahl + 1;

		// neue Werte in Datei schreiben
		$file->write(json_encode($trackArr));
		$file->close();
	}
}
