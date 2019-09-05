<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_Models extends CI_Model {
	/*Para que aparezca visualizar o ver*/
	public function getProductos(){
		$this->db->select("p.*,c.descripcion as categoria");
		$this->db->from("productos p");
		$this->db->join("categorias c","p.id_categoria = c.id_categoria");
		$this->db->where("p.estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	
	public function save($data){
		return $this->db->insert("productos",$data);
	}

	/*Funcion para editar */
	public function getProducto($id_producto){
		$this->db->select("p.*,c.descripcion as categoria");
		$this->db->from("productos p");
		$this->db->join("categorias c","p.id_categoria = c.id_categoria");
		$this->db->where("p.estado","1");
	
		$this->db->where("id_producto",$id_producto);
		$resultado = $this->db->get();
		return $resultado->row();

	}

	/*Para actualizar*/
	public function update($id_producto,$data){
		$this->db->where("id_producto",$id_producto);
		return $this->db->update("productos",$data);
	}
}