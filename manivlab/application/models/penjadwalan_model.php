<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjadwalan_model extends CI_Model {
	
	// for get all event date in one month
	function getDateEvent($year, $month){
		$year  = ($month < 10 && strlen($month) == 1) ? "$year-0$month" : "$year-$month";
        
        
		$query = $this->db->select('event_date, total_events')->from('events')->like('event_date', $year, 'after')->get();
		if($query->num_rows() > 0){
			$data = array();
			foreach($query->result_array() as $row){
				$ddata = explode('-',$row['event_date']);
				$data[(int) end($ddata)] = $row['total_events'];
			}
			return $data;
		}else{
			return false;
		}
	}
	
  
    
	// get event detail for selected date
	function getEvent($year, $month, $day, $idlabkom){
		$day   = ($day < 10 && strlen($day) == 1)? "0$day" : $day;
		$year  = ($month < 10 && strlen($month) == 1) ? "$year-0$month-$day" : "$year-$month-$day";
        
        $where_array = array(
                'event_date' => $year,
                'idlabkom' => $idlabkom
        );
        
		$query = $this->db->select('idevent as id, event_time as time, event_time_to as time1, event, pjma, idlabkom')->order_by('event_time')->get_where('event_detail', $where_array);
		if($query->num_rows() > 0){
			return $query->result_array();
            
		}else{
			return null;
		}
	}
	
	// insert event
	function addEvent($year, $month, $day, $time, $time1, $event, $pjma, $idlabkom){	
		$day   = (strlen($day) == 1)? "0$day" : $day;
		$month = (strlen($month) == 1)? "0$month" : $month;   
        
        $this->db->where('event_date',"$year-$month-$day");
        $this->db->where('event_time',$time);
		$this->db->where('event_time_to',$time1);
		$this->db->where('idlabkom',$idlabkom);
		$query  = $this->db->get("event_detail");
		if($query->result()){
		return false;
		}
		else{
		$check = $this->db->get_where('events', array('event_date' => "$year-$month-$day"));
		if($check->num_rows() > 0){
			$this->db->query("UPDATE events SET total_events = total_events + 1 WHERE event_date = ?", array("$year-$month-$day"));
			$this->db->insert('event_detail', array('event_date' => "$year-$month-$day", 'event_time' => $time, 'event_time_to' => $time1, 'event' => $event, 'pjma' => $pjma, 'idlabkom' => $idlabkom));
		}else{
			$this->db->insert('events', array('event_date' => "$year-$month-$day", 'total_events' => 1));
		    $this->db->insert('event_detail', array('event_date' => "$year-$month-$day", 'event_time' => $time, 'event_time_to' => $time1, 'event' => $event, 'pjma' => $pjma,'idlabkom' => $idlabkom));
		}
		
	}}
	
	// delete event
	function deleteEvent($year, $month, $day, $id){
		$day   = (strlen($day) == 1)? "0$day" : $day;
		$month = (strlen($month) == 1)? "0$month" : $month;
		
		$this->db->delete("event_detail", array('idevent' => $id, 'event_date' => "$year-$month-$day"));
		$check = $this->db->query('SELECT count(*) as total FROM event_detail WHERE event_date = ?', array("$year-$month-$day"))->row();
		if($check->total > 0){
			$this->db->update('events', array('total_events' => $check->total), array('event_date' => "$year-$month-$day"));
		}else{
			$this->db->delete("events", array('event_date' => "$year-$month-$day"));
		}
		return $check->total;
	}
}