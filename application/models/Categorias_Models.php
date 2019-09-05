<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_Models extends CI_Model {
	/*Para que aparezca visualizar o ver*/
	public function getCategorias(){
		$this->db->where("estado","1");
		$resultados = $this->db->get("categorias");
		return $resultados->result();
	}
	/*Para insertar o guardar*/
	public function save($data){
		return $this->db->insert("categorias",$data);
	}
	/*Funcion para editar */
	public function getCategoria($id_categoria){
		$this->db->where("id_categoria",$id_categoria);
		$resultado = $this->db->get("categorias");
		return $resultado->row();

	}
	/*Para actualizar*/
	public function update($id_categoria,$data){
		$this->db->where("id_categoria",$id_categoria);
		return $this->db->update("categorias",$data);
	}

	
}