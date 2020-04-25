<?php
/*!
 * OnBobba API
 * Programmer by OnBobba (www.onbobba.com.br)
 */

require_once('_class/OnBobba.php');

$OnBobba = new OnBobba;
$OnBobba->param('token', 'TOKEN'); // Token Access
$OnBobba->param('name', 'beatshabbo'); // Optional
$OnBobba->request('radios/status'); // Request
$res = $OnBobba->execute();

echo '<pre>';
var_dump($res);