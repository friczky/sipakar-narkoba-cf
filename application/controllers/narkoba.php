<?php

Class Narkoba extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session','form_validation'));
		$this->load->model(array('narkoba_model'));

		$this->load->library("UserLibrary");
		$this->userlibrary->authCheck();
	}

	function index()
	{
		$data["title"] = "";
		$data["sub_title"] = "";
		$rows = $this->narkoba_model->get_all();
		$data["row"] = $rows['data_arr'];
		$this->template->display('narkoba/narkoba_view', $data);
	}


	function add()
	{
		$data['row'] = $this->narkoba_model->get_by_id('');
		$data['post'] = 'save';
		$this->load->view('narkoba/narkoba_form',$data);
	}

	function save()
	{
		$this->form_validation->set_rules('kode', 'kode','required|strip_tags');
		$this->form_validation->set_rules('kode', 'nama','required|strip_tags');
		$this->form_validation->set_rules('keterangan', 'keterangan','required|strip_tags');

		if($this->form_validation->run() == TRUE){
			$kode=$this->input->post("kode");
			$nama=$this->input->post("nama");
			$keterangan=$this->input->post("keterangan");

			$data = array(
				'kode'=>$kode,
				'nama'=>$nama,
				'keterangan'=>$keterangan
			);
			$this->narkoba_model->save($data);

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
		$data['row'] = $this->narkoba_model->get_by_id($id);
		$data['post'] = 'update';
		$this->load->view('narkoba/narkoba_form',$data);
	}

	function update()
	{
		$this->form_validation->set_rules('kode', 'kode','required|strip_tags');
		$this->form_validation->set_rules('kode', 'nama','required|strip_tags');
		$this->form_validation->set_rules('keterangan', 'keterangan','required|strip_tags');

		if($this->form_validation->run() == TRUE){
			$id=$this->input->post("id");
			$kode=$this->input->post("kode");
			$nama=$this->input->post("nama");
			$keterangan=$this->input->post("keterangan");

			$data = array(
				'kode'=>$kode,
				'nama'=>$nama,
				'keterangan'=>$keterangan
			);

			$this->narkoba_model->update($data,$id);
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
		$this->narkoba_model->delete($id);
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

		// run query to get narkoba listing
		$query = $this->narkoba_model->get_search($start, $rows, $search);
		$iFilteredTotal = $query->num_rows();

		$iTotal=$this->narkoba_model->get_search_count($search)->row()->hasil;

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
			$record[] = $temp->kode;
			$record[] = $temp->nama;
			$record[] = $temp->keterangan;
			$record[] = "<a href=\"#\" class=\"text-yellow\" onclick=\"javascript:window_edit('".$temp->id."');\">Edit</a>&nbsp;|&nbsp;
                         <a href=\"#\"class=\"text-yellow\" onclick=\"javascript:delete_narkoba('".$temp->id."');\">Delete</a>";
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
