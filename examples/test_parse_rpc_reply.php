<?php
include('netconf/Device.php');

//creating a new device and establishing netconf session
$d= new Device("hostname", "username", "passwd");
$d->connect();
echo "connected to device";

// getting system information from server by using execute_rpc()
try
{
$inven=$d->execute_rpc("get-system-information");

//rpc reply from server is in xml form, so convert xml into string and print  
$str=$inven->to_string();
echo $str;

//one way is by using xml method find_value()
$list = array('system-information','os-name');
$val=$inven->find_value($list);
echo "\n\nvalue is".$val ."\n";

//other is by using php classes for XML
//get the owner document from xml object 
$xmldoc = $inven->get_owner_document();

//define DOMXPath object and use query() to parse rpc-reply
$xpathvar = new Domxpath($xmldoc);

//use local-name() to match on element name with or without namespaces
$queryResult = $xpathvar->query('/*[local-name()="rpc-reply"]/*[local-name()="system-information"]/*[local-name()="os-name"]');
echo "\n node value  : ";
foreach($queryResult as $result){
                echo $result->textContent;
       }
}

catch(Exception $e)
{
echo 'exception', $e->getMessage(), "\n";
}

//closing device
$d->close();
echo "device closed";
?>

