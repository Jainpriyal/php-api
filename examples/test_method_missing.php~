<?php
include('netconf/Device.php');

//creating a new device and establishing NETCONF session
$d= new Device("hostname", "username", "passwd");
$d->connect();
echo "connected to device";

//getting alarm information without calling execute_rpc method
$inven=$d->get_alarm_information();
echo $inven->to_string();

//closing device
$d->close();
echo "device closed";
?>

