<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Files management class created by CodexWorld
 */
class Files extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function upload(){
        $data = array();
        
        //load form validation library
        $this->load->library('form_validation');
        
        //load file helper
        $this->load->helper('file');
        
        if($this->input->post('uploadFile')){
            $this->form_validation->set_rules('file', '', 'callback_file_check');

            if($this->form_validation->run() == true){
                //upload configuration
                $config['upload_path']   = 'uploads/files/';
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = 1024;
                $this->load->library('upload', $config);
                //upload file to directory
                if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $uploadedFile = $uploadData['file_name'];
                    
                    /*
                     *insert file information into the database
                     *.......
                     */
                    
                    $data['success_msg'] = 'File has been uploaded successfully.';
                }else{
                    $data['error_msg'] = $this->upload->display_errors();
                }
            }
        }
        
        //load the view
        $this->load->view('upload', $data);
    }
    
    /*
     * file value and type check during validation
     */
    public function file_check($str){
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }
}