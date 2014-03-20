<?php
//program to remotely upgrade Junos

include('netconf/Device.php');

//creating a new device and establishing NETCONF session
$d= new Device("hostname", "username", "Passwd");
$d->connect();

//creating rpc for upgrading Junos
 $rpc = "<rpc>";
 $rpc.="<request-package-add>";
 $rpc.= "<package-name>";
 $rpc.= "....path/of/package.......";
 $rpc.= "</package-name>";
 $rpc.= "<no-copy/>";
 $rpc.="<no-validate/>";
 $rpc.="</request-package-add>";
 $rpc.="</rpc>";
 $rpc.="]]>]]>\n";
echo "\nexecuting rpc \n\n";

//run the rpc from execute_rpc method
$reply=$d->execute_rpc($rpc);
echo $reply->to_string();

//reboot the system
echo"\n\nrebooting the system\n";
$d->reboot();

//close the device
echo"\nclosing\n";
 $d->close();
?>

