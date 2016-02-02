<?php
class GDXImage {

	private $path;
	private $name;
	private $size;
	private $type;
	private $exts;

	public function setPath($path){$this->path = $path;}
	public function setName($name){$this->name = $name;}
	public function setSize($size){$this->size = $size;}
	public function setType($type){$this->type = $type;}
	public function setExts($exts){$this->exts = $exts;}

	public function getPath(){ return $this->path; }
	public function getName(){ return $this->name; }
	public function getSize(){ return $this->size; }
	public function getType(){ return $this->type; }
	public function getExts(){ return $this->exts; }

}