<?php

class Form_data_model extends CI_Model{
    
    public function select($table){
        switch ($table){
            case "subject":
                $res = $this->getAllRecords('Sleas_Subject');
                break;
            case "workplace":
                $res = $this->getAllRecords('Work_Place');
                break;
            case "release_type":
                $res = $this->getAllRecords('Releasement_Type');
                break;
        }
        
        return $res;
    }
    
    public function get_province_offices($work_place_id){
        $result = $this->searchdb('Province_Offices', 'work_place_id', $work_place_id);
        
        return $result;  
    }
    
    public function get_main_division($work_place_id){
        $result = $this->searchdb('Main_Office_Divisions', 'work_place_id', $work_place_id);
        
        return $result;
    }
    
    public function get_main_branch($work_place_id){
        $result = $this->searchdb('Main_Office_Branches', 'work_place_id', $work_place_id);
        
        return $result;
    }
    
    public function get_rel_place($rel_type_id){
        $result = $this->searchdb('Releasement_Place', 'rel_type_id', $rel_type_id);
        
        return $result;
    }
    
    public function searchdb($table, $field, $value){
        $array = array($field => $value);
		$this->db->where($array);
		$query = $this->db->get($table);
        /*$query = $this->db->query("SELECT * FROM $table WHERE $field=5 ;" );*/

		if ($query->num_rows() >= 1) {
			$res  = $query->result_array();
			return $res;
		} else{
			return 0;
		}
    }
    
    public function getAllRecords($table){
        
		$this->db->select('*');
		$query = $this->db->get($table);

		if ($query->num_rows() >= 1) {
			$res  = $query->result_array();
			return $res;
		} else{
			return 0;
		}
    }
}
?>
