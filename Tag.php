<?php
/**
* Tag, simple PHP interface for HTML
*
* @license		https://github.com/colgatto/RWTFPL/blob/master/RawLicense.txt Recursive Do What The Fuck You Want To Public License
* @version		1.0
* @since		1.0
*/
class Tag{
	private $oneLineTag = array('link','br','hr','img','input','meta','base','embed','spacer');
	private $name;
	private $textContains='';
	private $textToTopContains='';
	private $content=array();
	private $attr=array();

	public function __construct($name,$class='',$content=array()){
		$this->name = explode(' ',$name);
		if($class!='')$this->addClass($class);
		if(is_array($content))
			forEach($content as $k => $v)
				$this->append($v,$k);
	}
	
	public function attr($name,$value){
		$this->attr[$name]=$value;
		return $this;
	}
	public function addClass($className){
		if(isset($this->attr['class']))
			$this->attr['class'].=' '.$className;
		else
			$this->attr['class']=$className;
		return $this;
	}

	public function text($text){
		$this->textContains = $text;
		return $this;
	}
	public function textToTop($text){
		$this->textToTopContains = $text;
		return $this;
	}

	public function append(&$content,$k=''){
		if($k=='') array_push($this->content,$content);
		else $this->content[$k]=$content;
		return $this;
	}
	public function appendToTop(&$content,$k=''){
		if($k=='')array_unshift($this->content,$content);
		else $this->content = array($k => $content) + $this->content;
		return $this;
	}

	public function clearText(){
		$this->text='';
		return $this;
	}
	public function clearContent(){
		$this->content=array();
		return $this;
	}
	public function clear(){
		$this->clearText();
		$this->clearContent();
		return $this;
	}
	
	/*Find*
	public function find($tagName,$start=0){
		$finded=array();
		for($i=$start;$i<count($this->content);$i++)
			if($this->content[$i]->name[0]==$tagName)
				array_push($finded,$this->content[$i]);
		return $finded;
	}
	/**/
	
	public function f($contentName){
		return isset($this->content[$contentName]) ? $this->content[$contentName] : null;
	}

	public function __toString(){
        $str='<'.$this->name[0].' ';
		foreach($this->attr as $attName => $value){
			$str.=$attName.'="'.$value.'" ';
		}
		$names=$this->name;
		array_shift($names);
		$str.= implode(' ',$names)
			.(in_array($this->name[0],$this->oneLineTag) ?
				"/>\n" : ">\n".$this->textToTopContains
				.implode("\n",$this->content).$this->textContains
				."\n</".$this->name[0].'>');
		return $str;
	}
}

?>