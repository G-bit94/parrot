<?php
header("Content-Type:application/json");

$content = file_get_contents('php://input'); //Recieves the response from MPESA as a string

$res = json_decode($content, false); //Converts the response string to an object

$dataToLog = array(
    date("Y-m-d H:i:s"), //Date and time
    $res
); //Sets up the log format: Date, time and the response
$data = implode(" - ", $dataToLog);

$data .= PHP_EOL; //Add an end of line to the transaction log

file_put_contents('transaction_log', $data, FILE_APPEND); // Appends the response to the log file transaction_log

$con = mysqli_connect("localhost","root","","mpesa"); //Connets to the dashboard

$sql = "INSERT INTO `responses` (`Response`) VALUES ('$content')";
$rs = mysqli_query($con, $sql); //Record the response to the database
if($rs)
{
    echo "Records Inserted";
}
