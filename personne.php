<?php

class sav
{
	private $Name;
	private $Mail;
	private $Object;
    private $Message; 
    
    function __construct($Name,$Mail,$Object,$Message)
    {
    	
    	$this->Name=$Name;
        $this->Mail=$Mail;
    	$this->Object=$Object;
        $this->Message=$Message;
    }

    function getname() {return $this->Name ;}
    function getmail() {return $this->Mail ;}
    function getobject() {return $this->Object ;}
    function getmessage() {return $this->Message;}
    function setmail($Mail) {$this->Mail=$Mail ;}
}

class rate
{
    private $Mail; 
    private $name; 
    private $feedback; 
    
    function __construct($Mail,$name,$feedback)

    {
       $this->Mail=$Mail; 
       $this->name=$name; 
       $this->feedback=$feedback; 
    }
    function getmail() {return $this->Mail ;}
    function getname () { return  $this->name;}
    function getfeedback () { return $this->feedback; }
    function setmail($Mail){$this->Mail=$Mail;}
}

?>