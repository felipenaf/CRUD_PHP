<?php
	class Filme{

		private $id;
		private $tituloOr;
		private $tituloBr;
		private $ano;
		private $diretor;
		private $genero;

		function setId($id){
			$this->id = $id;
		}

		function getId(){
			return $this->id;
		}

		function setTituloOr($tituloOr){
			$this->tituloOr = $tituloOr;
		}

		function getTituloOr(){
			return $this->tituloOr;
		}

		function setTituloBr($tituloBr){
			$this->tituloBr = $tituloBr;
		}

		function getTituloBr(){
			return $this->tituloBr;
		}

		function setAno($ano){
			$this->ano = $ano;
		}

		function getAno(){
			return $this->ano;
		}

		function setDiretor($diretor){
			$this->diretor = $diretor;
		}

		function getDiretor(){
			return $this->diretor;
		}

		function setGenero($genero){
			$this->genero = $genero;
		}

		function getGenero(){
			return $this->genero;
		}
	}
?>