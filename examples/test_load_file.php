<?php
include('netconf/Device.php');

//creating a new device and establishing NETCONF session
$d=new Device("hostname","username","passwd");
$d->connect();

//locking device
$islocked=$d->lock_config();

//if successfully locked than loading the configuration from file and commiting changes
if($islocked)
{
//for loading xml file
$d->load_xml_file("/path/to/file","merge");

//for loading text file
//$d->load_text_file("/path/to/file","merge");

//for loading set file
//$d->load_set_file("/path/to/file");
$d->commit();
}

//if not successfully locked then exit from the function
else
{
echo "device can not be locked";
exit(1);
}

//unlocking and closing device
$d->unlock();
$d->close();
?>

