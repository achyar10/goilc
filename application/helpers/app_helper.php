<?php

if (!function_exists('pretty_date')) {

    function pretty_date($date = '', $format = '', $timezone = TRUE) {
        $date_str = strtotime($date);

        if (empty($format)) {
            $date_pretty = date('l, d/m/Y H:i', $date_str);
        } else {
            $date_pretty = date($format, $date_str);
        }

        if ($timezone) {
            $date_pretty .= ' WIB';
        }

        $date_pretty = str_replace('Sunday', 'Minggu', $date_pretty);
        $date_pretty = str_replace('Monday', 'Senin', $date_pretty);
        $date_pretty = str_replace('Tuesday', 'Selasa', $date_pretty);
        $date_pretty = str_replace('Wednesday', 'Rabu', $date_pretty);
        $date_pretty = str_replace('Thursday', 'Kamis', $date_pretty);
        $date_pretty = str_replace('Friday', 'Jumat', $date_pretty);
        $date_pretty = str_replace('Saturday', 'Sabtu', $date_pretty);

        $date_pretty = str_replace('January', 'Januari', $date_pretty);
        $date_pretty = str_replace('February', 'Februari', $date_pretty);
        $date_pretty = str_replace('March', 'Maret', $date_pretty);
        $date_pretty = str_replace('April', 'April', $date_pretty);
        $date_pretty = str_replace('May', 'Mei', $date_pretty);
        $date_pretty = str_replace('June', 'Juni', $date_pretty);
        $date_pretty = str_replace('July', 'Juli', $date_pretty);
        $date_pretty = str_replace('August', 'Agustus', $date_pretty);
        $date_pretty = str_replace('September', 'September', $date_pretty);
        $date_pretty = str_replace('October', 'Oktober', $date_pretty);
        $date_pretty = str_replace('November', 'November', $date_pretty);
        $date_pretty = str_replace('December', 'Desember', $date_pretty);

        return $date_pretty;
    }

    if (!function_exists('template_media_url')) {

        function template_media_url($name = '') {
            return base_url('media/templates/' . config_item('template') . '/' . $name);
        }

    }

    if (!function_exists('upload_url')) {

        function upload_url($name = '') {
            if (stristr($name, '://') !== FALSE) {
                return $name;
            } else {
                return base_url('uploads/' . $name);
            }
        }

    }

    if (!function_exists('media_url')) {

        function media_url($name = '') {
            return base_url('media/' . $name);
        }

    }
}

if (! function_exists('idr_format'))
{
    function idr_format($param = '')
    {
        return 'Rp. ' . number_format($param, 0, '.', '.') . ',-';
    }
}

if ( ! function_exists('posts_url'))
{
    function posts_url($posts = array())
    {
            return site_url('posts/detail/'.$posts['posts_id'].'/'.url_title($posts['posts_title'], '-', TRUE).'.html');
    }
}

function getCell($cell) {
    $letters = array_combine(range(1,26), range('a', 'z'));
    $result = $letters[$cell]; 
    return $result;
}

function name_of_pt() {
    $CI = & get_instance();
    $CI->load->model('setting/Setting_model');
    $result = $CI->Setting_model->get(array('id' => 1));
    return $result['setting_value'];
}

function address() {
    $CI = & get_instance();
    $CI->load->model('setting/Setting_model');
    $result = $CI->Setting_model->get(array('id' => 2));
    return $result['setting_value'];
}

function phone() {
    $CI = & get_instance();
    $CI->load->model('setting/Setting_model');
    $result = $CI->Setting_model->get(array('id' => 3));
    return $result['setting_value'];
}

function fax() {
    $CI = & get_instance();
    $CI->load->model('setting/Setting_model');
    $result = $CI->Setting_model->get(array('id' => 4));
    return $result['setting_value'];
}

function email() {
    $CI = & get_instance();
    $CI->load->model('setting/Setting_model');
    $result = $CI->Setting_model->get(array('id' => 5));
    return $result['setting_value'];
}

function linkedin() {
    $CI = & get_instance();
    $CI->load->model('setting/Setting_model');
    $result = $CI->Setting_model->get(array('id' => 6));
    return $result['setting_value'];
}

function facebook() {
    $CI = & get_instance();
    $CI->load->model('setting/Setting_model');
    $result = $CI->Setting_model->get(array('id' => 7));
    return $result['setting_value'];
}

function twitter() {
    $CI = & get_instance();
    $CI->load->model('setting/Setting_model');
    $result = $CI->Setting_model->get(array('id' => 8));
    return $result['setting_value'];
}

function instagram() {
    $CI = & get_instance();
    $CI->load->model('setting/Setting_model');
    $result = $CI->Setting_model->get(array('id' => 9));
    return $result['setting_value'];
}

if ( ! function_exists('visualisation_url'))
{
    function visualisation_url($visualisation = array())
    {
            return site_url('visualisation/detail/'.$visualisation['visualisation_id'].'/'.url_title($visualisation['visualisation_name'], '-', TRUE));
    }
}

if ( ! function_exists('infografis_url'))
{
    function infografis_url($infografis = array())
    {
            return site_url('infografis/detail/'.$infografis['infografis_id'].'/'.url_title($infografis['infografis_name'], '-', TRUE));
    }
}

function notif_reg() {
    $CI = & get_instance();
    $CI->load->model('register/Register_model');
    $result = count($CI->Register_model->get_reg(array('status' => 0)));
    return $result;
}

function notif_mail() {
    $CI = & get_instance();
    $CI->load->model('mailbox/Mailbox_model');
    $result = count($CI->Mailbox_model->get(array('status' => 0)));
    return $result;
}

function notif_blast() {
    $CI = & get_instance();
    $CI->load->model('blasting/Blasting_model');
    $result = count($CI->Blasting_model->get(array('status' => 0)));
    return $result;
}


?>
