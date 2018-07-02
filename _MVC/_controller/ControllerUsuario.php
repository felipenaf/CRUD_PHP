<?php
	
	include_once '.\_model/FilmeDao.php';
	include_once '.\_bean/Filme.php';
	
	class ControllerUsuario{
		

		public function index(){
			require_once '_view/login.php';
		}
		
		
	}
?>