<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['Sandbox'] = TRUE;
$config['APIVersion'] = '85.0';
$config['APIUsername'] = $config['Sandbox'] ? 'seller_1349585412_biz_api1.gmail.com' : 'PRODUCTION_USERNAME_GOES_HERE';
$config['APIPassword'] = $config['Sandbox'] ? '1349585437' : 'PRODUCTION_PASSWORD_GOES_HERE';
$config['APISignature'] = $config['Sandbox'] ? 'ABj4QoCxJlkXbZGummqAwTVSQG6.AISwiZzxThiwK4l17p5wujPJj.7j' : 'PRODUCTION_SIGNATURE_GOES_HERE';
$config['DeviceID'] = $config['Sandbox'] ? '' : 'PRODUCTION_DEVICE_ID_GOES_HERE';
$config['ApplicationID'] = $config['Sandbox'] ? 'APP-80W284485P519543T' : 'PRODUCTION_APP_ID_GOES_HERE';
$config['DeveloperEmailAccount'] = $config['Sandbox'] ? 'angeline.e.tran@gmail.com' : 'PRODUCTION_DEV_EMAIL_GOES_HERE';

/* End of file paypal.php */
/* Location: ./system/application/config/paypal.php */