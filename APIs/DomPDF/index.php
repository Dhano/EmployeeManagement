<?php
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml("<table style='width:100%'>
				  <tr>
				    <th>Firstname</th>
				    <th>Lastname</th> 
				    <th>Age</th>
				  </tr>
				  <tr>
				    <td>Jill</td>
				    <td>Smith</td> 
				    <td>50</td>
				  </tr>
				  <tr>
				    <td>Eve</td>
				    <td>Jackson</td> 
				    <td>94</td>
				  </tr>
				</table>"
			);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("dompdf.pdf" , array("Attachment" => 0));
?> 