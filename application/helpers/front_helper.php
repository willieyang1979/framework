<?php
    /*返回json格式*/
    function output_json($input = NULL)
	{
		if (!$input)
			$input = Array("result"=>'empty','message'=>'空值');
		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($input);
	}

?>