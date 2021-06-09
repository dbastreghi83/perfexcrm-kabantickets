<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kabantickets extends AdminController {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function check_permission(){
        if (!has_permission('settings','','edit')) exit("You can't performe this action. No user rights.");
    }
    
    public function kanban(){
        $this -> check_permission();
        
        $CI = &get_instance();
        
        $sql = "SELECT 
        tbltickets.ticketid,
        tbltickets.status,
        tbltickets.contactid,
        tbltickets.name,
        tbltickets.subject,
        tbltickets.date,
        tbltickets.priority,
        tbltickets.lastreply,
        tbltickets.assigned as assigned_id,
        CONCAT(tblstaff.firstname, ' ', tblstaff.lastname) as assigned,
        tblstaff.profile_image,
        tblclients.company as client,
        tblclients.userid as client_id,
        CONCAT(tblcontacts.firstname, ' ', tblcontacts.lastname) as contact
        FROM tbltickets
        LEFT JOIN tblstaff ON tblstaff.staffid = tbltickets.assigned
        LEFT JOIN tblcontacts ON tblcontacts.id = tbltickets.contactid
        LEFT JOIN tblclients ON tblclients.userid = tblcontacts.userid
        ORDER BY tbltickets.priority DESC, tbltickets.date ASC";

        $sql = str_replace("tbl",db_prefix(), $sql);
        
        $rs = $CI->db->query($sql);
        $tickets = $rs -> result_array();
        

        $sql = "SELECT 	ticketstatusid, name, statuscolor FROM tbltickets_status ORDER BY statusorder ASC";
        $sql = str_replace("tbl",db_prefix(), $sql);
        $rsStatus = $CI->db->query($sql);
        $status = $rsStatus -> result_array();
        
        $data = array(
            'tickets' => $tickets,
            'status' => $status
            );
            
        $this->load->view('kanban', $data);
    }

}