<?php
/*!
 * OnBobba API
 * Supported by OnBobba (www.onbobba.com.br)
 */

require_once('../_class/OnBobba.php');

$OnBobba = new OnBobba;
$OnBobba->param('token', 'TOKEN'); // Token Access
$OnBobba->request('radios/ranking'); // Request
$res = $OnBobba->execute();

echo '<pre>';
var_dump($res);