<?php

/**
 * Gets IP address.
 */
function getIpAddress()
{
    $ipAddress = '';
    if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
        // to get shared ISP IP address
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check for IPs passing through proxy servers
        // check if multiple IP addresses are set and take the first one
        $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        foreach ($ipAddressList as $ip) {
            if (! empty($ip)) {
                // if you prefer, you can check for valid IP address here
                $ipAddress = $ip;
                break;
            }
        }
    } else if (! empty($_SERVER['HTTP_X_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
        $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    } else if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (! empty($_SERVER['HTTP_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED'];
    } else if (! empty($_SERVER['REMOTE_ADDR'])) {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
    }
    return $ipAddress;
}

// function ipaddress_to_ipnumber($ipaddress) {
// 	$pton = @inet_pton($ipaddress);
// 	if (!$pton) { return false; }
//   $number = '';
//   foreach (unpack('C*', $pton) as $byte) {
//       $number .= str_pad(decbin($byte), 8, '0', STR_PAD_LEFT);
//   }
//   return base_convert(ltrim($number, '0'), 2, 10);
// }

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
// echo "IP Address: " . getIpAddress();
//   echo("</br>");
   
   
//   echo "IP2 Address: " . getIp();
//   echo("</br>");
   
$myip = getIpAddress();
// echo ($myip);
//   echo("</br>");
// echo 'User IP Address : '. $_SERVER['REMOTE_ADDR'];

// if (filter_var($myip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
//     echo("</br>");
//     echo("is a valid IPv6 address");   echo("</br>");
//     $ipv4 = ipaddress_to_ipnumber($myip);
//       echo("</br>");   echo("</br>");
//     echp($ipv4);
    
    
// } else {
//       echo("</br>");
//     echo($myip+" is not a valid IPv6 address");
// }

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

<meta name="description" content="A free tool to check your current IP address. This is helpful if you have a dynamic IP address." />

<meta name="keywords" content="checkip, check ip, find ip, ip address, ip, dynamic ip, ip information, isp" />
    
<title>Check your Current IP address</title>
<link href="style.css" media="screen" rel="Stylesheet" type="text/css" />

</head>
<body>
<div>

<div id="hd">
<div id="branding">
<a href="/"><span id="logo">CheckIP.org</span></a>

</div>
<hr />
</div>



<div id="bd">

<div style="padding:5px">


</div>


<div id="yourip">
<h1>Your IP Address:  <span style="color: #5d9bD3;"><?php echo $myip;  ?></span></h1>

<!-- <h2>Find your current IP address.</h2> -->






<div class="clear">
<div class="description"><div class="indent">





</p>


</div></div>
<div class="screenshot"><br><br>
An IP address is a numerical label assigned to every device connected to a computer network that uses the Internet Protocol for communication. An IP address serves two main functions: host or network interface identification and location addressing.<br><br><br><br>
<h3>Other Useful Tools</h3>
<ul id="feature-list">
<li><a href="http://www.canyouseeme.org">Open Port Check Tool</a></li>
</ul>
</div>
<br />


</div>

</div>
<div id="ft">
<hr />



<p>&copy;Own Copyright 
2022

</div>
</div>


</body>
</html>

 


