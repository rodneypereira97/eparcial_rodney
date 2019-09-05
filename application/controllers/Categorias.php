<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Categorias_Models");
	}

	public function index()
	{
		$data = array('categorias' =>  $this->Categorias_Models->getCategorias(), );
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('Productos/Categorias/list',$data);
		$this->load->view('plugins_footer');

	}
	public function add()
	{
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('Productos/Categorias/add');
		$this->load->view('plugins_footer');

	}
	public function store()//carga datos
	{
		$descripcion = $this->input->post("descripcion");
		$estado = $this->input->post("estado");
		//echo $descripcion_categoria." ".$estado_categoria;
		$data = array(
			'descripcion' => $descripcion,
			'estado' => "1",
		);

		if ($this->Categorias_Models->save($data)) {
			redirect(base_url()."Categorias");
		}
		else{
			$this->session->set_flashdata("Error","No se pudo guardar la información");
			redirect(base_url()."Categorias/add");
		}

	}
	public function edit($id_categoria){
		$data = array(
			'categoria' => $this->Categorias_Models->getCategoria($id_categoria), 
		);
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('Productos/Categorias/edit',$data);
		$this->load->view('plugins_footer');
	}
	public function update(){
		$idCategoria = $this->input->post("idCategoria");
		$descripcion = $this->input->post("descripcion");
		$estado= $this->input->post("estado");

		$data = array(
			'descripcion' => $descripcion,
			'estado' => "1",
		);
		if ($this->Categorias_Models->update($idCategoria,$data)) {
			redirect(base_url()."Categorias");
		}
		else{
			$this->session->set_flashdata("Error","No se pudo actualizar la información");
			redirect(base_url()."Categorias/edit/".$idCategoria);
		}
	}
	public function view($id_categoria){
		$data = array(
			'categoria' => $this->Categorias_Models->getCategoria($id_categoria), 
		);
		$this->load->view("Productos/Categorias/view",$data);
	}

	public function delete($id_categoria){
		$data = array(
			'estado' => "0" , 
		);
		$this->Categorias_Models->update($id_categoria,$data);
		echo "Categorias";
	}
}