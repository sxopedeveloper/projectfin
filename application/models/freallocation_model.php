<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Freallocation_Model extends CI_Model {

	function insert_lead_reallocation ($lead_id, $user_id_from, $user_id_to, $details)
	{
		$now = date("Y-m-d g:i:s");
		
		$query = "
		INSERT INTO `finance_lead_reallocations`
		(fk_lead, fk_user_from, fk_user_to, details, created_at)
		VALUES (".$lead_id.", ".$user_id_from.", ".$user_id_to.", '".$this->db->escape_str($details)."', '".$now."')";
		$sql = $this->db->query($query);		
	}
	
	function get_reallocations ($params, $my_id, $admin_type, $start, $limit)
	{
		$r_status = isset($params['r_status']) ? $params['r_status'] : '';
		$l_status = isset($params['l_status']) ? $params['l_status'] : '';

		$where = "";			
		if ($r_status <> "") { $where .= " AND r.status = '".$this->db->escape_str($r_status)."' "; }
		if ($l_status <> "") { $where .= " AND l.status = '".$this->db->escape_str($l_status)."' "; }

		if ($admin_type == 2)
		{ 

		}		
		else
		{ 
			$where .= " AND (r.fk_user_from = ".$my_id." OR r.fk_user_to = ".$my_id.") ";
		}

		$query = "
		SELECT l.id_lead, l.fk_user, 
		CONCAT('QM', LPAD(l.id_lead, 5, '0')) AS `cq_number`,
		l.status as `lead_status`,
		CASE (l.status)
			WHEN 0 THEN 'Unallocated'
			WHEN 1 THEN 'Allocated'
			WHEN 2 THEN 'Attempted'
			WHEN 100 THEN 'Deleted'
		END `lead_status_text`,
		r.id_lead_reallocation,
		r.status as `reallocation_status`,
		CASE (r.status)
			WHEN 0 THEN 'Pending'
			WHEN 1 THEN 'Approved'
		END `reallocation_status_text`,
		r.created_at as `r_created_at`,
		a_from.id_user AS `lead_from_id`, a_from.name AS `lead_from`,
		a_to.id_user AS `lead_to_id`, a_to.name AS `lead_to`,
		a_approver.id_user AS `lead_approver_id`, a_approver.name AS `lead_approver`,
		l.name, l.email, l.phone, l.mobile, l.state, l.created_at, l.last_updated
		FROM finance_lead_reallocations r
		JOIN finance_leads l ON r.fk_lead = l.id_lead
		JOIN users a_from ON r.fk_user_from = a_from.id_user
		JOIN users a_to ON r.fk_user_to = a_to.id_user
		LEFT JOIN users a_approver ON r.fk_user_to = a_approver.id_user
		WHERE l.deprecated <> 1 AND r.deprecated <> 1 ".$where."
		ORDER BY r.status ASC, l.id_lead DESC LIMIT ".$start.", ".$limit;
		$sql = $this->db->query($query);
		return $sql->result();
	}

	function get_reallocations_count ($params, $my_id, $admin_type)
	{
		$r_status = isset($params['r_status']) ? $params['r_status'] : '';
		$l_status = isset($params['l_status']) ? $params['l_status'] : '';

		$where = "";
		if ($r_status <> "") { $where .= " AND r.status = '".$this->db->escape_str($r_status)."' "; }
		if ($l_status <> "") { $where .= " AND l.status = '".$this->db->escape_str($l_status)."' "; }

		if ($admin_type == 2)
		{
		
		}
		else
		{
			$where .= " AND (r.fk_user_from = ".$my_id." OR r.fk_user_to = ".$my_id.") ";
		}
	
		$query = "
		SELECT COUNT(1) AS cnt 
		FROM finance_lead_reallocations r
		JOIN finance_leads l ON r.fk_lead = l.id_lead
		WHERE l.deprecated <> 1 AND r.deprecated <> 1 ".$where."";
		return $this->db->query($query)->row_array();
	}
	
	function update_reallocation_status ($reallocation_ids, $approver_id, $status)
	{
		$query = "UPDATE `finance_lead_reallocations` SET `status` = ".$status.", `fk_user_approver` = ".$approver_id." WHERE `id_lead_reallocation` IN (".$reallocation_ids.")";
		$sql = $this->db->query($query);	
	}
}