<?php

 
       $studentId = $_POST['SID'];
        $paymentType = $_POST['payment'];;
        $date =  $_POST['DOB'];
        $purpose =  $_POST['purpose'];;
    
    $data = array("studentId"=> $studentId,
        "paymentType"=> "$paymentType",
        "date"=> "$date",
        "purpose"=> "$purpose");                                                                    
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init('127.0.0.1:8070/kungfu/fee/');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
header('Location:../index.html');
?>
