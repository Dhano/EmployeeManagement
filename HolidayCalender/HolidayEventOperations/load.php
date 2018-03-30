<?php
	require_once ("../classes/database.php");
	require_once ("../classes/events.php");
	$event = new Events();
	$result_set = $event->viewEvents();
	$data = array();
	foreach($result_set as $row)
	{
	 $data[] = array(
	  'id'   => $row["id"],
	  'title'   => $row["title"],
	  'start'   => $row["start_event"],
	  'end'   => $row["end_event"]
	 );
	}

	echo json_encode($data);
?>
