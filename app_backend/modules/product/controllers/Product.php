<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {


	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form' ,'url','fn'));
		$this->load->model('category/category_model');
		$this->load->model('product/product_model');

		$this->load->library('uploadfile_library');

		$this->class    = $this->router->fetch_class();
		$this->method   = $this->router->fetch_method();
	}

	public function index()
	{
		$data['products'] = $this->product_model->getProductAll();
		$this->load->view('product-browse',$data);
	}

	public function create()
	{
		$data['method'] = $this->method;
		$data['cat'] = $this->category_model->get_category();

		$this->load->view('product-edit-add',$data);
	}

	public function store()
	{
        //uploade cover
		$path = 'product';
		$upload_cover = $this->uploadfile_library->do_upload('cover',TRUE,$path);

		$cover ='';
		if(isset($upload_cover['index'])){
			$cover = 'uploads/'.$path.'/'.date('Y').'/'.date('m').'/'.$upload_cover['index']['file_name'];
		}


		$data = array(
			'name' => $this->input->post('product_name'),
			'details' => $this->input->post('des_product'),
			'price1' => $this->input->post('price1'),
			'price2' => $this->input->post('price2'),
			'category_id' => $this->input->post('category_id'),
			'status' => 0,
			'created' => date('Y-m-d H:i:s'),
			'cover'  => $cover,
		);

		$last_id = $this->product_model->insert($data);

		if($last_id){
			$this->session->set_flashdata('status' , 1);
			redirect(base_url('product/create'));
		}
	}

	//edit
	public function edit($id) {

		$data['cat'] = $this->category_model->get_category();
		$data['products'] = $this->product_model->get_ProductById($id);

		$data['method'] = $this->method;

		$this->load->view('product-edit-add',$data);		
	}	

	public function update($id)
	{

        //uploade cover
		$path = 'product';
		$upload_cover = $this->uploadfile_library->do_upload('cover',TRUE,$path);

		$cover =null;
		if(isset($upload_cover['index'])){
			$cover = 'uploads/'.$path.'/'.date('Y').'/'.date('m').'/'.$upload_cover['index']['file_name'];
			$outfile_cover = $this->input->post('outfile_cover');
			if(isset($outfile_cover)){
				$this->load->helper("file");
				unlink($outfile_cover);
			}
		}

		$data = array(
			'id' => $id,
			'name' => $this->input->post('product_name'),
			'details' => $this->input->post('des_product'),
			'price1' => $this->input->post('price1'),
			'price2' => $this->input->post('price2'),
			'category_id' => $this->input->post('category_id'),
			'status' => 0,
			'created' => date('Y-m-d H:i:s'),
			'cover'  => $cover,
		);

		$last_id = $this->product_model->update(array_to_obj($data));

		if($last_id){
			$this->session->set_flashdata('status' , 2);
			redirect(base_url('product/edit/'.$id));
		}

	} 

	public function destroy($id)
	{

		$data = $this->product_model->get_ProductById($id);

		if(!empty($data->cover)){
			$this->load->helper("file");
			unlink($data->cover);
		}
		
		$delete = $this->product_model->destroy($id);
		if($delete){
			//Log
			$messege = 'ลบข้อมูล สินค้า : '.$data->name; 

			$this->session->set_flashdata('status',3);
			redirect(base_url('product'));
		}
	}	
}