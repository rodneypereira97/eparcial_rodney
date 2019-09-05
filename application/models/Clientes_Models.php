<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_Models extends CI_Model {
	/*Para que aparezca visualizar o ver*/
	public function getClientes(){
		$this->db->where("estado_cliente","1");
		$resultados = $this->db->get("clientes");
		return $resultados->result();
	}
	/*Para insertar o guardar*/
	public function save($data){
		return $this->db->insert("clientes",$data);
	}
	/*Funcion para editar */
	public function getCliente($id_cliente){
		$this->db->where("id_cliente",$id_cliente);
		$resultado = $this->db->get("clientes");
		return $resultado->row();

	}
	/*Para actualizar*/
	public function update($id_cliente,$data){
		$this->db->where("id_cliente",$id_cliente);
		return $this->db->update("clientes",$data);
	}

	
}