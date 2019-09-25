<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('set_msg_error')):
    function set_msg_error($msg=NULL){
        $ci = & get_instance();
        $ci->session->set_userdata('message_error', $msg);
    }
endif;

if(!function_exists('get_msg_error')):
    function get_msg_error($destroy=TRUE){
        $ci = & get_instance();
        $retorno = $ci->session->userdata('message_error');
        if($destroy) $ci->session->unset_userdata('message_error');
        return $retorno;
    }
endif;

if(!function_exists('set_msg_sucess')):
    function set_msg_sucess($msg=NULL){
        $ci = & get_instance();
        $ci->session->set_userdata('message_sucess', $msg);
    }
endif;

if(!function_exists('get_msg_sucess')):
    function get_msg_sucess($destroy=TRUE){
        $ci = & get_instance();
        $retorno = $ci->session->userdata('message_sucess');
        if($destroy) $ci->session->unset_userdata('message_sucess');
        return $retorno;
    }
endif;