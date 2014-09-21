<?php

/**
 * Class admin
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class test extends Controller{
	public function setVerified(){
		$_SESSION['verified']=true;
	}
	public function unsetVerified(){
		$_SESSION=[];
	}
}
