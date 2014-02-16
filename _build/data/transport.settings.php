<?php
/**
 * System settings
 *
 * @package cybershop-site
 * @subpackage build
 */
$settings = array();

$settings['callme_mail_from']= $modx->newObject('modSystemSetting');
$settings['callme_mail_from']->fromArray(array(
    'key' => 'callme.mail_from',
    'value' => 'andreyzagorets@gmail.com',
    'xtype' => 'textfield',
    'namespace' => 'call_me',
    'area' => 'site',
),'',true,true);

$settings['callme_mail_from_name']= $modx->newObject('modSystemSetting');
$settings['callme_mail_from_name']->fromArray(array(
    'key' => 'callme.mail_from_name',
    'value' => 'Интерент сайт',
    'xtype' => 'textfield',
    'namespace' => 'call_me',
    'area' => 'site',
),'',true,true);

$settings['callme_mail_subject']= $modx->newObject('modSystemSetting');
$settings['callme_mail_subject']->fromArray(array(
    'key' => 'callme.mail_subject',
    'value' => 'Перезвоните пожалуйста',
    'xtype' => 'textfield',
    'namespace' => 'call_me',
    'area' => 'site',
),'',true,true);

$settings['callme_mail_to']= $modx->newObject('modSystemSetting');
$settings['callme_mail_to']->fromArray(array(
    'key' => 'callme.mail_to',
    'value' => 'andreyzagorets@gmail.com',
    'xtype' => 'textfield',
    'namespace' => 'call_me',
    'area' => 'site',
),'',true,true);

return $settings;