<?php
class Words{
	//List of codewords to be used for tickets
	private $wordlist = ['apple','artsy','blame','brain','clock','clone','cloud','doors','dress','email','great','green','house','mouse','onion','sheep','wheel','white'];

	/**
	 * returns a random  5 letter word
	 * @return string 5 letter word
	 */
	public function getWord(){
		$rand = rand(0,sizeof($this->wordlist)-1);
		return $this->wordlist[$rand];
	}
}