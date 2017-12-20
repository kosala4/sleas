<?php

class User_model extends CI_Model
{

	public function get_a_record($field,$value)
	{
		$array = array($field => $value);
		$this->db->where($array);
		$query = $this->db->get('User');
		//SELECT * FROM user

		$data  = $query->result_array();
		return $data;
	}

	public function login($uname, $pwd){
		$this->db->where('LOWER(user_name)', strtolower($uname));
		//$this->db->where('passwd', $pwd);
		$query = $this->db->get('User');

		$data  = $query->result_array();

		if ($query->num_rows() == 1) {
            if(password_verify($pwd, $data['0']['passwd'])){

			return 1;
            }
		}
	}

	public function insert($data)
	{
		$this->db->insert('User', $data);

		if( $this->db->affected_rows() > 0)
		{
			return 1;
		} else
		{
			return 0;
		}
	}

	public function select($data)
	{
		$this->db->select($data);
		$query = $this->db->get('User');

		if ($query->num_rows() >= 1) {
			$res  = $query->result_array();
			return $res;
		} else{
			return 0;
		}
	}

    public function check_username($username)
    {
		$this->db->select('user_name');
        $this->db->where('user_name', $username);
		$query = $this->db->get('User');

        if ($query->num_rows() >= 1) {
			return 1;
		} else{
			return 0;
		}
    }

	public function update()
	{}

	public function delete()
	{}
}


?>
