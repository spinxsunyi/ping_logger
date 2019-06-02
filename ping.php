<?php
include ("connection.php");

function pingDomain($domain){
    $starttime = microtime(true);
    $file      = fsockopen ($domain, 80, $errno, $errstr, 10);
    $stoptime  = microtime(true);
    $status    = 0;

    if (!$file) $status = -1;  // Site is down
    else {
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
}

function insert_to_database($data, $conn){
    $sql = "INSERT INTO `tb_ping` (`id`, `time_stamp`, `domain`, `time`) VALUES (NULL, NULL, '".$data['domain']."', '".$data['time']."')";
    $query  = mysqli_query($conn,$sql);
    // jika query gagal, maka print "insert failed";
    if (!$query){
        echo "insert failed";
    }else{
        // echo "insert success";
    }
    return;
}



//Main Program
$ping['domain'] = "google.com";
while(1){
    $ping['time'] = pingDomain($ping['domain']);
    if($ping == "-1"){
        echo "disconnected \n";
    }else{
        echo "ping google.com ".$ping['time']."\n";
    }
    insert_to_database($ping, $conn);
    sleep(2);    
}

?>