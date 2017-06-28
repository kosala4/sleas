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
            case "province_list":
                $res = $this->getAllRecords('Province_List');
                break;
            case "designation":
                $res = $this->getAllRecords('Designation');
                break;
        }
        
        return $res;
    }
    
    public function get_province_offices($work_place_id){
        $search_array = array('work_place_id'=> $work_place_id);
        $result = $this->searchdb('Province_Offices', $search_array);
        
        return $result;  
    }
    
    public function get_main_division($work_place_id){
        $search_array = array('work_place_id'=> $work_place_id);
        $result = $this->searchdb('Main_Office_Divisions', $search_array);
        
        return $result;
    }
    
    public function get_main_branch($work_place_id){
        $search_array = array('work_place_id'=> $work_place_id);
        $result = $this->searchdb('Main_Office_Branches', $search_array);
        
        return $result;
    }
    
    public function get_rel_place($rel_type_id){
        $search_array = array('rel_type_id'=> $rel_type_id);
        $result = $this->searchdb('Releasement_Place', $search_array);
        
        return $result;
    }
    
    public function get_districts($province_id){
        $search_array = array('province_id'=> $province_id);
        $result = $this->searchdb('District_List', $search_array);
        
        return $result;
    }
    
    public function get_zones($district_id){
        $search_array = array('dist_id'=> $district_id);
        $result = $this->searchdb('Zone_List', $search_array);
        
        return $result;
    }
    
    public function get_zone_offices($district_id){
        $search_array = array('dist_id'=> $district_id);
        $result = $this->searchdb('Zonal_Offices', $search_array);
        
        return $result;
    }
    
    public function get_divisions($zone_id){
        $search_array = array('zone_id'=> $zone_id);
        $result = $this->searchdb('Division_List', $search_array);
        
        return $result;
    }
    
    public function get_divisional_offices($zone_id){
        $search_array = array('zone_id'=> $zone_id);
        $result = $this->searchdb('Divisional_Offices', $search_array);
        
        return $result;
    }
    
    public function get_institutes($workplace_id, $division_id){
        $search_array = array('div_id' => $division_id, 'workplace_id'=> $workplace_id);
        $result = $this->searchdb('Institute', $search_array);
        
        return $result;
    }
    
    public function searchdb($table, $search_array){
		$this->db->where($search_array);
		$query = $this->db->get($table);
        /*$query = $this->db->query("SELECT * FROM $table WHERE $field=5 ;" );*/

		if ($query->num_rows() >= 1) {
			$res  = $query->result_array();
			return $res;
		} else{
			return 0;
		}
    }
    
/*    public function searchdb($table, $field, $value){
        $array = array($field => $value);
		$this->db->where($array);
		$query = $this->db->get($table);
        $query = $this->db->query("SELECT * FROM $table WHERE $field=5 ;" );

		if ($query->num_rows() >= 1) {
			$res  = $query->result_array();
			return $res;
		} else{
			return 0;
		}
    }*/
    
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
    
    public function selectData(){
        $this->db->select('title');
        $this->db->where($search_array);
        $query = $this->db->get('mytable');
    }
}
?>
