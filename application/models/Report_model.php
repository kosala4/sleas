<?php

class Report_model extends CI_Model{
    
    
    public function countOfficers($array){
        /*$this->db->where($array);
        $query = $this->db->get('General_Service');*/
        
        $this->db->select('*');
        $this->db->from('Personal_Details');
        $this->db->join('Service s1', 'Personal_Details.ID = s1.person_id');
        $this->db->join('General_Service g', 'Personal_Details.ID = g.person_id');
        $this->db->join('Designation', 'Designation.ID = s1.designation_id');
        $this->db->join('Work_Place', 'Work_Place.ID = s1.work_place_id');
        
        $this->db->join('Province_Offices po', 's1.sub_location_id = po.ID', 'left');
        $this->db->join('Zonal_Offices zn1', 's1.sub_location_id = zn1.ID', 'left');
        $this->db->join('Divisional_Offices dof', 's1.sub_location_id = dof.ID', 'left');
        $this->db->join('Institute ins', 's1.sub_location_id = ins.ID', 'left');
        $this->db->join('Division_List div1', 'div1 ON div1.div_id IN (ins.div_id)', 'left');
        $this->db->join('Zone_List z1', 'z1.zone_id IN (dof.zone_id, div1.zone_id)', 'left');
        $this->db->join('District_List dl1', 'dl1.dist_id IN (z1.dist_id, zn1.dist_id)', 'left');
        $this->db->join('Province_List pl1', 'pl1.province_id IN (po.province_id, dl1.province_id)', 'left');
        
        $this->db->join('Service s2', 'Personal_Details.ID = s2.person_id AND 
        (s1.time_updated < s2.time_updated OR s1.time_updated = s2.time_updated AND s1.time_updated < s2.time_updated)', 'left outer');
        $this->db->where('s2.person_id is NULL');
        $this->db->where($array);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            $count  = $query->num_rows();
            return $count;
        } else{
            return 0;
        }
    }

    
    
}

?>

<?php
/*
    

SELECT LOWER(p.NIC) column1, p.in_name, w.work_place, s1.work_place_id, desig.designation, g.grade, g.date_join, pl1.province
FROM  Personal_Details p
JOIN Service s1 ON p.ID = s1.person_id
JOIN Work_Place w ON w.ID = s1.work_place_id
JOIN General_Service g ON p.ID = g.person_id
JOIN Designation desig ON s1.designation_id = desig.ID
LEFT JOIN Province_Offices po ON s1.sub_location_id = po.ID
LEFT JOIN Zonal_Offices zn1 ON s1.sub_location_id = zn1.ID
LEFT JOIN Divisional_Offices dof ON s1.sub_location_id = dof.ID
LEFT JOIN Institute ins ON s1.sub_location_id = ins.ID
LEFT JOIN Division_List div1 ON div1.div_id IN (ins.div_id)
LEFT JOIN Zone_List z1 ON z1.zone_id IN (dof.zone_id, div1.zone_id)
LEFT JOIN District_List dl1 ON dl1.dist_id IN (z1.dist_id, zn1.dist_id)
LEFT JOIN Province_List pl1 ON pl1.province_id IN (po.province_id, dl1.province_id)
LEFT OUTER JOIN Service s2 ON p.ID = s2.person_id AND (s1.time_updated < s2.time_updated OR s1.time_updated = s2.time_updated AND s1.time_updated < s2.time_updated)
WHERE s2.NIC is NULL

ORDER BY p.NIC, g.date_join


