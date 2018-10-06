<?php 
class IndexForm extends CI_Controller {
public function Register(){
	$this->form_validation->set_rules('RestName', 'Resturent Name', 'required');
	$this->form_validation->set_rules('addressLine1', 'Address Line 1', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	$this->form_validation->set_rules('phoneNo', 'Phone Number', 'required|min_length[10]|max_length[10]');

	if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('index');
                }
                else
                {

                        $this->load->model('Resturent_model');
                       $responce= $this->Resturent_model->insertResturent();
                       if($responce){
                       	$this->session->set_flashdata('msg','Data saved');
                       	redirect('Home/index');
                       }
                }
}

}

?>