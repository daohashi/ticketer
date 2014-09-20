<?php
class Words{
	//List of codewords to be used for tickets
	private $wordlist = ['apple','clock','clone','cloud','house','mouse','onion','sheep','wheel'];

	/**
	 * returns a random  5 letter word
	 * @return string 5 letter word
	 */
	public function getWord(){
		$rand = rand(0,sizeof($this->wordlist)-1);
		return $this->wordlist[$rand];
	}
}