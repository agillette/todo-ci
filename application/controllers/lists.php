<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Lists_model', 'lists');
		$this->load->model('Items_model', 'items');
	}
	
	public function index()
	{
		$vars['lists'] = $this->lists->list_all();
		$vars['content'] = 'lists_multi';
		$this->load->view('main', $vars);
	}
	
	public function view($id)
	{
		$vars['list'] = $this->lists->get($id);
		$vars['items'] = $this->items->list_all('parent', $id);
		$vars['content'] = 'lists_single';
		$this->load->view('main', $vars);
	}
	
	public function add()
	{
		$vars['content'] = 'lists_add';
		$this->load->view('main', $vars);
	}
	
	public function insert()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'slug' => url_title($this->input->post('title'))
		);
		$id = $this->lists->insert($data);
		if($id)
		{
			redirect('lists/view/'.$id);
		}
		else
		{
			redirect('lists');
		}
	}
	
}