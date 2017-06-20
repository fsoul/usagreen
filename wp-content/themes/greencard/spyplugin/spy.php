<?php
if($_POST['spy'] == 'nonspam'){
    $subj = $_POST['spy'] == 'leave' ? 'Незаполненная заявка' : 'Новый лид';
    $mail = $_POST['lead_email'];
    $subject = "{$subj} с сайта usagreenc.com";
    $domain = "usagreenc.com";
    $from = "no-reply@". $domain;
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: ". $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $template_data = '';
    unset($_POST['spy']);
    unset($_POST['lead_email']);
    unset($_POST['spy']);

    foreach ($_POST as $key => $val){
        $val = htmlentities($val);
        $template_data .= "<tr><td>{$key}:</td><td>$val</td></tr>";
    }
    $template_mail = "<html><body><table>$template_data</table></body></html>";
    $result = mail($mail, $subject, $template_mail, $headers);

    /*
    $fp = fopen('/logs/lead.txt', 'a');
    fwrite($fp, $template_mail);
    fclose($fp);*/
}
