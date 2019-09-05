<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Clientes_Models");
	}

	public function index()
	{
		$data = array('clientes' =>  $this->Clientes_Models->getClientes(), );
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('Clientes/list',$data);
		$this->load->view('plugins_footer');

	}
	/*Para agregar atender a la hora de copiar las rutas*/
	public function add()
	{
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('Clientes/add');
		$this->load->view('plugins_footer');

	}
	/*Para guardar*/
	public function store()
	{
		$id_cliente = $this->input->post("id_cliente");
		$razon_social = $this->input->post("razon_social");
		$direccion = $this->input->post("direccion");
		$nro_documento = $this->input->post("nro_documento");
		$telefono_cliente = $this->input->post("telefono_cliente");
		$estado_cliente = $this->input->post("estado_cliente");

		//echo $descripcion_categoria." ".$estado_categoria;
		$data = array(
			'razon_social' => $razon_social,
			'direccion' => $direccion,
			'nro_documento' => $nro_documento,
			'telefono_cliente' => $telefono_cliente,
			'estado_cliente' => "1",

		);

		if ($this->Clientes_Models->save($data)) {
			redirect(base_url()."Clientes");
		}
		else{
			$this->session->set_flashdata("Error","No se pudo guardar la información");
			redirect(base_url()."Clientes/add");
		}

	}
	/*Para editar*/
	public function edit($id_cliente){
		$data = array(
			'cliente' => $this->Clientes_Models->getCliente($id_cliente), 
		);
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('Clientes/edit',$data);
		$this->load->view('plugins_footer');
	}
	/*Para actualizar*/
	public function update(){
		$idCliente = $this->input->post("idCliente");
		$razon_social = $this->input->post("razon_social");
		$direccion = $this->input->post("direccion");
		$nro_documento = $this->input->post("nro_documento");
		$telefono_cliente = $this->input->post("telefono_cliente");
		$estado_cliente = $this->input->post("estado_cliente");

		$data = array(
			'razon_social' => $razon_social,
			'direccion' => $direccion,
			'nro_documento' => $nro_documento,
			'telefono_cliente' => $telefono_cliente,
			'estado_cliente' => "1",

		);
		if ($this->Clientes_Models->update($idCliente,$data)) {
			redirect(base_url()."Clientes");
		}
		else{
			$this->session->set_flashdata("Error","No se pudo actualizar la información");
			redirect(base_url()."Clientes/edit/".$idCliente);
		}
	}
	/*Para visualizar*/
	public function view($id_cliente){
		$data = array(
			'cliente' => $this->Clientes_Models->getCliente($id_cliente), 
		);
		$this->load->view("Clientes/view",$data);
	}
	/*Para eliminar*/
	public function delete($id_cliente){
		$data = array(
			'estado_cliente' => "0" , 
		);
		$this->Clientes_Models->update($id_cliente,$data);
		echo "Clientes";
	}
}