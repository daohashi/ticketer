<?php
class Helper{

    /**
     * load the helper with the given name
     * @param  string $helpername helper name
     */
    public function loadHelper($helpername){
        require "application/helpers/$helpername.php";
        return new $helpername;
    }
}