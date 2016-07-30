<?php
class Loginmodel extends CI_Model{

	public function login_valid($username,$password)
	{
//		$password = md5($password);
	//		$q=$this->db->query('SELECT * FROM users WHERE ...')
		$q=$this->db->where(['uname'=>$username,'password'=>$password])
					->get('users');

		if($q->num_rows()){
			return $q->row()->id;
		}			
		else
			return false;
	}
}
?>
mysql_query("SELECT zw_id, name, zw_price, MinValue, MaxValue
						FROM map
						CROSS APPLY(SELECT MIN(d) MinValue, MAX(d) MaxValue FROM (
										VALUES (msp_price), (spx_price), (sdid_price)) AS a(d)) A");