<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


$config['from'] = 'noreply@goilc.co.id';
$config['from_name'] = 'iLC Learning Center';
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://mail.goilc.co.id';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'noreply@goilc.co.id';
$config['smtp_pass'] = '@admin234#';
$config['smtp_timeout'] = 30;
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['crlf'] = "\r\n";
/* End of file email.php */
/* Location: ./application/config/email.php */
?>