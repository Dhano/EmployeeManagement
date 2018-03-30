<?php
require_once ("../classes/database.php");
require_once ("../classes/events.php");
$event = new Events();
$event->deleteEventInAjax();
?>
