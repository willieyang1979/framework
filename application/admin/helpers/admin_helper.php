<?php
    /*this function is using in the model to inser new record to the database*/
	function insert_row($table = null,$data = null,$fields = null)
	{
		if (!$table || !is_array($data))
			return false;
			
		$CI =& get_instance();
			
		if (is_array($fields))
		{
			$row = array();
			foreach ($fields as $field)
			{
				if (isset($data[$field]))
				{
					$row[$field] = $data[$field];
				}
				
				/*this is special for the integer fields, the empty integer has to be null when updating the row in the database*/
				if($data[$field] == '' )
				{
					$row[$field] = null;
				}
			}
		}
		else
		{
			$row = $data;
		}
		
		/* at this point we have an array called $row containing only fields from the fields array */
		$success = $CI->db->insert($table,$row);
		
		if ($success)
		{
			return $CI->db->insert_id();
		}
		else
		{
			return false;
		}
	}
	/*this function is using in the model to updating  records to the database*/
	function update_row($table = null,$id = null,$data = null,$fields = null)
	{	
		if (!$table || !is_array($data) || !$id)
			return false;
		//fb($data);	
		$CI =& get_instance();
		
		if (is_array($fields))
		{
			$row = array();
			foreach ($fields as $field)
			{
				if (isset($data[$field])) 
				{
					/*this is special for the date, the empty dates has to be null when updating the row in the database*/
					/*this is special for the integer fields, the empty integer has to be null when updating the row in the database*/
					if ($data[$field] === null || $data[$field] == '')
						$row[$field] = null;
					else
						$row[$field] = $data[$field];
				}
			}
		}
		else
		{
			$row = $data;
		}
		/* at this point we have an array called $row containing only fields from the fields array */
		$success = $CI->db->update($table,$row,"id = $id");
		
		if ($success)
		{
			return $id;
		}
		else
		{
			return false;
		}
	}
    
    function output_json($input = NULL)
	{
		if (!$input)
			$input = Array("result"=>'error','message'=>'unknown error');
		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($input);
	}
?>