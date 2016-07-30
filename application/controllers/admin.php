<?php
class Admin extends CI_Controller
{
	
	public function dashboard()
	{
		$config=[
					'base_url'=>base_url('index.php/admin/dashboard'),
					'per_page'=>5,
					'total_rows'=>$this->articles_model->num_row(),
					'full_tag_open'=>"<ul class='pagination'>",
					'full_tag_close'=>'</ul>',
					'first_tag_open'=>'<li>',
					'first_tag_close'=>'</li>',
					'last_tag_open'=>'<li>',
					'last_tag_close'=>'</li>',
					'next_tag_open'=>'<li>',
					'next_tag_close'=>'</li>',
					'prev_tag_open'=>'<li>',
					'prev_tag_close'=>'</li>',
					'num_tag_open'=>'<li>',
					'num_tag_close'=>'</li>',
					'cur_tag_open'=>"<li class='active'><a>",
					'cur_tag_close'=>'</a></li>',
		];

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$articles=$this->articles_model->article_list($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/dashboard',['arti'=>$articles]);
	}

	public function add_article()
	{
		$this->load->view('admin/add_article');
	}

	public function store_article()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_article_rules')){
			$post=$this->input->post();
			unset($post['submit']);
			if($this->articles_model->add_article($post)){
				$this->session->set_flashdata('feedback','succesfully added');
			}
			else{
				$this->session->set_flashdata('feedback','failed to add');
			}
			return redirect('admin/dashboard');
		}
		else
		{
			return redirect('admin/add_article');
		}
	}	
	
	public function edit_article($article_id)
	{
		$article=$this->articles_model->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=>$article]);
	}
	public function update_article($article_id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_article_rules')){
			$post=$this->input->post();
			unset($post['submit']);
			if($this->articles_model->update_article($article_id,$post)){
				$this->session->set_flashdata('feedback','succesfully updated');
			}
			else{
				$this->session->set_flashdata('feedback','failed to update');
			}
			return redirect('admin/dashboard');
		}
		else
		{
			return redirect('admin/edit_article');
		}

	}

	public function delete_article($article_id)
	{
			$post=$this->input->post();
			unset($post['submit']);
			if($this->articles_model->delete_article($article_id)){
				$this->session->set_flashdata('feedback','succesfully deleted');
			}
			else{
				$this->session->set_flashdata('feedback','failed to delete');
			}
			return redirect('admin/dashboard');
	}
	public function __construct(){
		parent::__construct();
		$this->load->model('articles_model');
		if(! $this->session->userdata('user_id'))
			return redirect('login');
	}
}
?>