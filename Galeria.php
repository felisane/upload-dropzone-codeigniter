<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Galeria extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url', 'file','text','string'));
		$this->load->library('session');
	}

	public function upload() {
		$this->load->library('upload');
		$album_id = $_POST['album'];
		  if (!empty($_FILES)){
		    $config = array('upload_path'   =>    './uploads',
		                    'allowed_types' =>    'gif|jpg|jpeg|png',
		                    'encrypt_name'  =>    'TRUE',
		                    'remove_spaces' =>	  'TRUE'
		                  );
		           $this->upload->initialize($config);

		           //Dropzone uses 'file' as name of uploaded file so we pass it to codeigniter's function,  upload()
		           if (!$this->upload->do_upload("file")) {
		             echo 'Could not upload file(s)';
		           }else {
		             //upload and then create a thumbnail of the image
		             $_FILES['file']['name'] = md5($_FILES['file']['name']);
		             $data = array('upload_data' => $this->upload->data('file'));
		             $this->resize($data['upload_data']['full_path'], random_string($data['upload_data']['file_name']));
		             $this->resize_capa($data['upload_data']['full_path'], random_string($data['upload_data']['file_name']));

		    		             
		           }
		        }

   }
       

	function resize($path,$file) {
	  $this->load->library('image_lib');
      $config= array('image_library'   => 'gd2',
                     'source_image'    => $path,
                     'create_thumb'    => TRUE,
                     'maintain_ratio'  => FALSE,
                     'width'           => 800,
                     'height'          => 603,
                     'new_image'       => './uploads/thumbs/'.$file
                    );

          $this->upload->initialize($config);
          $this->image_lib->initialize($config);
          $this->image_lib->resize();
   }
}