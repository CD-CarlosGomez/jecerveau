<?php
class PresetacionDatos{
	public $tablaCampos=Campos;
	public $tablaNombre="";
	public $tablaTamaņo=0;
	
	public function setTablaNombre($nombreTabla){
		$this->tablaNombre=$nombreTabla;
	}
	public function setTablaTamaņo($tamaņoTabla){
		$this->tablaTamaņo=$tamaņoTabla;
	}
	public function getTablaNombre(){
		return $this->tablaNombre;
	}
	Public function getTablaTamaņo(){
		return $this->tablaTamaņo;
	}
}
?>