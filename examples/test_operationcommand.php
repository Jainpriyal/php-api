<?php
include('netconf/Device.php');

//creating a new device and establishing NETCONF session
$d= new Device("hostname", "username", "passwd");
$d->connect();
echo "connected to device";

//getting reply from server using execute_rpc() method
try
{
$reply=$d->execute_rpc("get-system-information");
//converting xml reply to string and printing it
echo $reply->to_string();
}

catch(Exception $e)
{
echo 'exception', $e->getMessage(), "\n";
}

//closing device
$d->close();
echo "device closed";
?>

