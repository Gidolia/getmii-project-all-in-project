<?php
$suggestions 	= ['India', 'Pakistan', 'Nepal', 'UAE', 'Iran', 'Bangladesh'];
$data 			= [];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	foreach($suggestions as $suggestion)
	{
		if(strpos(strtolower($suggestion), strtolower($_POST['term'])) !== false)
		{
			$data[] = $suggestion;	
		}
	}
}
else
{
	foreach($suggestions as $suggestion)
	{
		if(strpos(strtolower($suggestion), strtolower($_GET['term'])) !== false)
		{
			$data[] = $suggestion;	
		}
	}	
}


header('Content-Type: application/json');
echo json_encode(['suggestions' => $data]);