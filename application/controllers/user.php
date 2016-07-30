<?php
class User extends MY_Controller{
	public function index()
	{
	//	$this->load->helper('form');    already loaded in autoload
		$this->load->model('articles_model');
		$this->load->library('pagination');
		$config=[
					'base_url'=>base_url('index.php/user/index'),
					'per_page'=>5,
					'total_rows'=>$this->articles_model->article_num_row(),
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
		$this->pagination->initialize($config);

		$articles=$this->articles_model->total_article_list($config['per_page'],$this->uri->segment(3));
		$this->load->view('public/articles_list',['articles'=>$articles]);

	}
	public function search()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search','Search','required');
		if(!$this->form_validation->run()){
			$this->index();
		}
		else
		{
			$search=$this->input->post('search');
			$this->load->model('articles_model');
			$articles=$this->articles_model->search($search);
			$this->load->view('public/search_results',['articles'=>$articles]);
		}
	}
}
?>