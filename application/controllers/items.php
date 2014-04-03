<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Lists_model', 'lists');
		$this->load->model('Items_model', 'items');
	}
	
	public function insert()
	{
		$data = array(
			'type' => $this->input->post('type'),
			'title' => $this->input->post('title'),
			'slug' => url_title($this->input->post('title')),
			'parent' => $this->input->post('pid'),
			'notes' => $this->input->post('notes')
		);
		$id = $this->items->insert($data);
		if($id)
		{
			redirect('lists/view/'.$this->input->post('pid'));
		}
		else
		{
			redirect('lists');
		}
	}
	
}