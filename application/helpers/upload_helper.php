<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('upload_image')) {
    function upload_image($field_name, $upload_path, $allowed_types, $max_size)
    {
        $CI =& get_instance();
        $CI->load->library('upload');

        $config['upload_path']   = $upload_path;
        $config['allowed_types'] = $allowed_types;
        $config['max_size']      = $max_size;
        $config['file_name']     = time() . '_' . $_FILES[$field_name]['name'];

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        $CI->upload->initialize($config);

        if (!$CI->upload->do_upload($field_name)) {
            return array('error' => $CI->upload->display_errors());
        } else {
            return array('upload_data' => $CI->upload->data());
        }
    }
}
?>
