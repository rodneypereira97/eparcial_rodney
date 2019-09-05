<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Ventas_Models");
		$this->load->model("Clientes_Models");
		$this->load->model("Productos_models");

	}
/*=============================================
	Vista de la list         
=============================================*/
	public function index()
	{
		$data  = array(
			'ventas' => $this->Ventas_Models->getVentas(), 
		);
		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('Ventas/list',$data);
		$this->load->view('plugins_footer');
		//$this->load->view('welcome_message');
	}
	/*=============================================
	FUNCION AGRTEGAR        
	=============================================*/

	public function add(){
		$data = array(
			"tipocomprobantes" => $this->Ventas_Models->getComprobantes(),
			"clientes" => $this->Clientes_Models->getClientes(),
			"productos" => $this->Productos_models->getProductos()
		);

		$this->load->view('head');
		$this->load->view('menu_head');
		$this->load->view('menu_costado');
		$this->load->view('Ventas/add',$data);
		$this->load->view('plugins_footer');

	}
	
	



	/*=============================================
	funcion de Guaedar en la base de datos          
	=============================================*/
	
	public function store(){
		$fecha = $this->input->post("fecha");
		$subtotal = $this->input->post("subtotal");
		$igv = $this->input->post("igv");
		$total = $this->input->post("total");
		$idcomprobante = $this->input->post("idcomprobante");
		$idcliente = $this->input->post("idcliente");
		//$idusuario = $this->session->userdata("id");
		$numero = $this->input->post("numero");
		$serie_comprobante = $this->input->post("serie_comprobante");

		$idproductos = $this->input->post("idproductos");
		$precios = $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importes");

		$data = array(
			'fecha' => $fecha,
			'subtotal' => $subtotal,
			'igv' => $igv,
			'total' => $total,
			'tipo_comprobante' => $idcomprobante,
			'id_cliente' => $idcliente,
			//'usuario_id' => $idusuario,
			'num_documento' => $numero,
			'serie_comprobante' => $serie_comprobante,
			'estado' => "1"
		);

		if ($this->Ventas_Models->save($data)) {
			$idventa = $this->Ventas_Models->lastID();
			$this->updateComprobante($idcomprobante);
			$this->save_detalle($idproductos,$idventa,$precios,$cantidades,$importes);
			redirect(base_url()."ventas");

		}else{
			redirect(base_url()."ventas/add");
		}
	}
	/*=============================================
	FUNCION  ACTUALIZAR TIPOCOMPROBANTE         
	=============================================*/
	protected function updateComprobante($idcomprobante){
		$comprobanteActual = $this->Ventas_Models->getComprobante($idcomprobante);
		$data  = array(
			'cantidad' => $comprobanteActual->cantidad + 1, 
		);
		$this->Ventas_Models->updateComprobante($idcomprobante,$data);
	}
/*=============================================
	FUNCION  GUARDAR EN LA TABLA DETALLEVENTA        
=============================================*/
	protected function save_detalle($productos,$idventa,$precios,$cantidades,$importes){
		for ($i=0; $i < count($productos); $i++) { 
			$data  = array(
				'id_producto' => $productos[$i], 
				'id_venta' => $idventa,
				'precio_unitario' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'importe'=> $importes[$i],
				'estado' => "1"
			);

			$this->Ventas_Models->save_detalle($data);
			$this->updateProducto($productos[$i],$cantidades[$i]);

		}
	}
/*=============================================
	FUNCION  ACTUALIZAR LA CANTIDAD DEL STOCK       
=============================================*/
	protected function updateProducto($idproducto,$cantidad){
		$productoActual = $this->Productos_models->getProducto($idproducto);
		$data = array(
			'stock' => $productoActual->stock - $cantidad, 
		);
		$this->Productos_models->update($idproducto,$data);
	}
/*=============================================
	funcion view venta      
=============================================*/

	public function view(){
		$idventa = $this->input->post("id");
		$data = array(
			"venta" => $this->Ventas_Models->getVenta($idventa),
			"detalles" =>$this->Ventas_Models->getDetalle($idventa)
		);
		$this->load->view("ventas/view",$data);
	}
	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Ventas_Models->update($id,$data);
	
		echo "Ventas";
		}

}