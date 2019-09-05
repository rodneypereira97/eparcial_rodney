<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Productos_Models");
		$this->load->model("Categorias_Models");

	}
	public function index(){

		$data = array(
			'productos' =>  $this->Productos_Models->getProductos(),
		 );

		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('Productos/list',$data);
		$this->load->view('plugins_footer');

	}
	public function add(){
		$data =array(
			'categorias' => $this->Categorias_Models->getCategorias(),
			 );

		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('Productos/add',$data);
		$this->load->view('plugins_footer');

	}
	public function store()
	{
		$id_producto = $this->input->post("id_producto");
		$codigo = $this->input->post("codigo");
		$descripcion = $this->input->post("descripcion");
		$precio_venta = $this->input->post("precio_venta");
		$precio_compra = $this->input->post("precio_compra");
		$stock = $this->input->post("stock");
		$categoria = $this->input->post("categoria");
		//echo $descripcion_categoria." ".$estado_categoria;
		$data = array(
			'codigo' => $codigo,
			'descripcion' => $descripcion,
			'precio_venta' => $precio_venta,
			'precio_compra' => $precio_compra,
			'stock' => $stock,
			'estado' => "1",
			'id_categoria' => $categoria,

		);

		if ($this->Productos_Models->save($data)) {
			redirect(base_url()."Productos");
		}
		else{
			$this->session->set_flashdata("Error","No se pudo guardar la información");
			redirect(base_url()."Productos/add");
		}
	}

	public function edit($id_producto){
		$data = array(
			'producto' => $this->Productos_Models->getProducto($id_producto),
			'categorias' => $this->Categorias_Models->getCategorias(),


		);
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('Productos/edit',$data);
		$this->load->view('plugins_footer');
	}
	public function update(){
		$idproducto = $this->input->post("idproducto");
		$codigo = $this->input->post("codigo");
		$descripcion= $this->input->post("descripcion");
		$precio_venta = $this->input->post("precio_venta");
		$precio_compra = $this->input->post("precio_compra");
		$stock = $this->input->post("stock");
		$categoria = $this->input->post("categoria");


		$data = array(
			'descripcion' => $descripcion,
			'precio_venta' => $precio_venta,
			'precio_compra' => $precio_compra,
			'stock' => $stock,
			'id_categoria' => $categoria,

		);
		if ($this->Productos_Models->update($idproducto,$data)) {
			redirect(base_url()."Productos");
		}
		else{
			$this->session->set_flashdata("Error","No se pudo actualizar la información");
			redirect(base_url()."Productos/edit/".$idproducto);
		}
	}
	public function view($id_producto){
		$data = array(
			'producto' => $this->Productos_Models->getProducto($id_producto), 

		);
		$this->load->view("Productos/view",$data);
	}
	public function delete($id_producto){
		$data = array(
			'estado' => "0" , 
		);
		$this->Productos_Models->update($id_producto,$data);
		echo "Productos";
	}
}