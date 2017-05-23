<?php
if($_POST['spy'] == 'myplug'){
    $mail = 'grytsenkomarketing@gmail.com';
    $subject = "Незаполненная заявка с сайта usagreenc.com";
    $domain = "usagreenc.com";
    $from = "no-reply@". $domain;
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: ". $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $template_data = '';
    foreach ($_POST as $key => $val){        
        if($key!='spy'){
            $val = htmlentities($val);
            $template_data .= "<tr><td>$key</td><td>$val</td></tr>";
        }
    }
    $template_mail = "<html><body><table>$template_data</table></body></html>";
    $result = mail($mail, $subject, $template_mail, $headers);
    /*$fp = fopen('data.txt', 'w');
    fwrite($fp, $template_mail);
    //fwrite($fp, '23');
    fclose($fp);*/
    
}


?>