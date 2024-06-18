<?php
/*(echo "<pre>";
print_r($_POST);
exit;*/
//header('Content-Type: application/pdf');


require 'vendor/autoload.php'; 
//$(".genratepdf").html();
// reference the Dompdf namespace
use Dompdf\Dompdf;

$html_left = "<strong>Payslip Number       :</strong> " . (isset($_POST['payslip']) ? $_POST['payslip'] : "") . "<br>"; 
$html_left .= "<strong>Company Name        :</strong> " . (isset($_POST['companyName']) ? $_POST['companyName'] : "") . "<br>";
$html_left .= "<strong>Company Address     :</strong> " . (isset($_POST['companyAddress']) ? $_POST['companyAddress'] : "") . "<br>"; 

//$html_right = "<strong>Pay Date            :</strong> " . (isset($_POST['payDate']) ? $_POST['payDate'] : "") . "<br>"; 
$html_right = "<strong>Working Days        :</strong> " . (isset($_POST['workingDays']) ? $_POST['workingDays'] : "") . "<br>"; 
$html_right .= "<strong>Employee Name      :</strong> " . (isset($_POST['employeeName']) ? $_POST['employeeName'] : "") . "<br>"; 
$html_right .= "<strong>Employee ID        :</strong> " . (isset($_POST['employeeID']) ? $_POST['employeeID'] : "") . "<br>";   

$html = "<div style='width:50%; float:left;padding-bottom: 30px;'>$html_left</div>";
$html .= "<div style='width:50%; float:right;padding-bottom: 30px;'>$html_right</div>";


$html .= "<div style='width: 100%; text-align:center;'><strong><h2>Salary Details</h2></strong></div>";

$html .= "<div style='border-bottom: 1px solid black; margin-top: 10px;'></div>";
$html .= "<div style='margin-top: 30px;'></div>"; 
//$html.= "<div style='border-left: 2px solid black; height: 100px;'></div>";

$html .= "<table style='width:100%;'>";


// Table Row for Earnings
$html .= "<tr style='background-color: #90a4ae;'>";
$html .= "<td style='text-align:left;'><strong>Earnings</strong></td>";
$html .= "<td style='text-align:center;'>Basic Pay:" . (isset($_POST['basicPay']) ? $_POST['basicPay'] : "") . "</td>";
$html .= "<td style='text-align:center;'>Total Earnings:" . (isset($_POST['totalEarnings']) ? $_POST['totalEarnings'] : "") . "</td>";
$html .= "</tr>";
//$html .= "<div style='border-bottom: 1px solid black; margin-top: 10px;'></div>";


// Table Row for Deductions
$html .= "<tr style='background-color: #90a4ae;'>";
$html .= "<td style='text-align:left;'><strong>Deductions</strong></td>";
$html .= "<td style='text-align:center;'>Tax :" . (isset($_POST['tax']) ? $_POST['tax'] : "") . "</td>";
$html .= "<td style='text-align:center;'>Total Deductions  :" . (isset($_POST['totalDeductions']) ? $_POST['totalDeductions'] : "") . "</td>";
$html .= "</tr>";
//$html .= "<div style='border-bottom: 1px solid black; margin-top: 10px;'></div>";

// Table Row for Net Pay
$html .= "<tr style='background-color: #90a4ae;'>";
$html .= "<td style='text-align:left;'><strong>Net Pay</strong></td>";
$html .= "<td style='text-align:center;'>Net Pay  :" . (isset($_POST['netPay']) ? $_POST['netPay'] : "") . "</td>";
$html .= "<td style='text-align:center;'>Net Pay Amount  :" . (isset($_POST['netPayAmount']) ? $_POST['netPayAmount'] : "") . "</td>";
$html .= "</tr>";
//$html .= "<div style='border-bottom: 1px solid black; margin-top: 10px;'></div>";

$html .= "</table>";

$html .= "<div style='margin-top: 50px;'></div>"; 
$html .= "<div style='border-bottom: 1px solid black; margin-top: 10px;'></div>";
$html .= "<div style='margin-top: 50px;'></div>"; 
$html .= "<div style='text-align: left; margin-bottom: 50px;'><strong>Pay Date:</strong> " . (isset($_POST['payDate']) ? $_POST['payDate'] : "") . "</div>";

$html .= "<br>";
$html .= "<div class='form-group'> <strong style='font-weight: bold;'>Employer Signature</strong></div>";
$html .= "<div class='form-group'> _________________________________</div>";
$html .= "<br>";
$html .= "<div style='text-align: right; margin-bottom: 50px;'>";
$html .= "<div class='form-group'> <strong style='font-weight: bold;'>Employee Signature</strong></div>";
$html .= "<div class='form-group'> _________________________________</div>";
$html .= "<br>";
$html .= "<div style='position: absolute; bottom: 0; width: 100%; text-align: center; background-color: yellow; padding: 10px;'>";
$html .= "<div class='form-group' style='font-size: 20px; color: #333;'>This is system generated payslip</div>";
$html .= "</div>";


// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>