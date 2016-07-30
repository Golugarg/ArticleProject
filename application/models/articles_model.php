<?php

class Articles_model extends CI_Model
{
	
	public function article_list($limit,$offset)
	{
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->select(['title','id'])->from('articles')->where('user_id',$user_id)->limit($limit,$offset)->get();
	//	print_r($query->result()); exit;
		return($query->result());
		
	}
	public function add_article($array){
		return $this->db->insert('articles',$array);
	}
	public function find_article($article_id){
		$q=$this->db ->select(['id','title','body'])
				->where('id',$article_id)
				->get('articles');
				return $q->row();
	}		
	public function update_article($article_id,$article){
		return $this->db
					->where('id',$article_id)
					->update('articles',$article);

	}
	public function delete_article($article_id){
		return $this->db
					->where('id',$article_id)
					->delete('articles');
	}
	public function num_row()
	{
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->select(['title','id'])->from('articles')->where('user_id',$user_id)->get();
		return($query->num_rows());
	}
	public function article_num_row()
	{
		$query=$this->db->select(['title','id'])->from('articles')->get();
		return($query->num_rows());
	}
	public function total_article_list($limit,$offset)
	{
		$query=$this->db->select(['title','id'])->from('articles')->limit($limit,$offset)->get();
		return($query->result());
		
	}
	public function search($search)
	{
		$q=$this->db->from('articles')->like('title',$search)->get();
		return $q->result();
	}

}

?>