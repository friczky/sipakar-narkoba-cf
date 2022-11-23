<?php

Class Gejala_narkoba extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session','form_validation'));
		$this->load->model(array('gejala_narkoba_model','gejala_model','narkoba_model','kelompok_gejala_model'));

		$this->load->library("UserLibrary");
		$this->userlibrary->authCheck();
	}

	function index()
	{
		$data["title"] = "";
		$data["sub_title"] = "";
		$rows = $this->gejala_narkoba_model->get_all();
		$data["row"] = $rows['data_arr'];
		$this->template->display('gejala_narkoba/gejala_narkoba_view', $data);
	}


	function add()
	{
		$data['row'] = $this->gejala_narkoba_model->get_by_id('');
		$data['post'] = 'save';
		$data['listGejala'] = $this->gejala_model->get_list_data(); 
		$data['listnarkoba'] = $this->narkoba_model->get_list_data();
		$this->load->view('gejala_narkoba/gejala_narkoba_form',$data);
	}

	function save()
	{
		$this->form_validation->set_rules('gejala_id', 'gejala_id','required|strip_tags');
		$this->form_validation->set_rules('narkoba_id', 'narkoba_id','required|strip_tags');
		$this->form_validation->set_rules('md', 'md','required|strip_tags');
		$this->form_validation->set_rules('mb', 'mb','required|strip_tags');

		if($this->form_validation->run() == TRUE){
			$gejala_id=$this->input->post("gejala_id");
			$narkoba_id=$this->input->post("narkoba_id");
			$md=$this->input->post("md");
			$mb=$this->input->post("mb");

			$data = array(
				'gejala_id'=>$gejala_id,
				'narkoba_id'=>$narkoba_id,
				'md'=>$md,
				'mb'=>$mb
			);
			$this->gejala_narkoba_model->save($data);

			$msg_status['status'] = 1;
			$msg_status['error'] = 0;
		}
		else{
			$msg_status['status'] = 0;
			$msg_status['error'] = validation_errors();
		}
		echo json_encode($msg_status);
	}
	function edit()
	{
		$id = $this->input->post('id');
		$data['row'] = $this->gejala_narkoba_model->get_by_id($id);
		$data['post'] = 'update';
		$data['listGejala'] = $this->gejala_model->get_list_data(); 
		$data['listnarkoba'] = $this->narkoba_model->get_list_data();
		$this->load->view('gejala_narkoba/gejala_narkoba_form',$data);
	}

	function update()
	{
		$this->form_validation->set_rules('gejala_id', 'gejala_id','required|strip_tags');
		$this->form_validation->set_rules('narkoba_id', 'narkoba_id','required|strip_tags');
		$this->form_validation->set_rules('md', 'md','required|strip_tags');
		$this->form_validation->set_rules('mb', 'mb','required|strip_tags');

		if($this->form_validation->run() == TRUE){
			$id=$this->input->post("id");
			$gejala_id=$this->input->post("gejala_id");
			$narkoba_id=$this->input->post("narkoba_id");
			$md=$this->input->post("md");
			$mb=$this->input->post("mb");

			$data = array(
				'gejala_id'=>$gejala_id,
				'narkoba_id'=>$narkoba_id,
				'md'=>$md,
				'mb'=>$mb
			);

			$this->gejala_narkoba_model->update($data,$id);
			$msg_status['status'] = 1;
			$msg_status['error'] = 0;
		}
		else{
			$msg_status['status'] = 0;
			$msg_status['error'] = validation_errors();
		}
		echo json_encode($msg_status);
	}

	function delete()
	{
		$id = $this->input->post('id');
		$this->gejala_narkoba_model->delete($id);
		$msg_status['status'] = 1;
		$msg_status['error'] = 0;
		echo json_encode($msg_status);
	}

	function get_list(){
		// variable initialization
		$search = "";
		$start = 0;
		$rows = 10;

		// get search value (if any)
		if (isset($_GET['sSearch']) && $_GET['sSearch'] != "" ) {
			$search = $_GET['sSearch'];
		}

		// limit
		$start = $this->get_start();
		$rows = $this->get_rows();

		// run query to get gejala_narkoba listing
		$query = $this->gejala_narkoba_model->get_search($start, $rows, $search); 
		$iFilteredTotal = $query->num_rows();

		$iTotal=$this->gejala_narkoba_model->get_search_count($search)->row()->hasil;

		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iTotal,
			"aaData" => array()
	    );

	    // get result after running query and put it in array
		$i=$start;
		$rows = $query->result(); 
	    foreach ($rows as $temp) {
			$record = array();
			$record[] = ++$i;
			$record[] = $temp->gejala;
			$record[] = $temp->narkoba;
			$record[] = $temp->md;
			$record[] = $temp->mb;
			$record[] = "<a href=\"#\" class=\"text-yellow\" onclick=\"javascript:window_edit('".$temp->id."');\">Edit</a>&nbsp;|&nbsp;
                         <a href=\"#\"class=\"text-yellow\" onclick=\"javascript:delete_gejala_narkoba('".$temp->id."');\">Delete</a>";
			$output['aaData'][] = $record;
		}
		// format it to JSON, this output will be displayed in datatable
		echo json_encode($output);
	}

	function get_start() {
		$start = 0;
		if (isset($_GET['iDisplayStart'])) {
			$start = intval($_GET['iDisplayStart']);

			if ($start < 0)
				$start = 0;
		}
		return $start;
	}

	function get_rows() {
		$rows = 10;
		if (isset($_GET['iDisplayLength'])) {
			$rows = intval($_GET['iDisplayLength']);
			if ($rows < 5 || $rows > 500) {
				$rows = 10;
			}
		}
		return $rows;
	}
}
?>
