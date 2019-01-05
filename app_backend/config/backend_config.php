<?php

$CI = &get_instance();

$config['root_url'] = str_replace( 'backend/', '', $CI->config->base_url() );

$config['public'] = $config['root_url'] . 'public/';
$config['vali'] = $config['public'] . 'vali-admin-master/';
$config['validate'] = $config['public'] . 'jquery-validation-1.19.0/';
$config['confirm'] = $config['public'] . 'jquery-confirm-master/';
$config['custom'] = $config['public'] . 'mycustom/';
