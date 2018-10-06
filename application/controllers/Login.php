<?php

class Login extends CI_Controller {
public function LoginUser(){

if($this->input->post('email')=="Admin@gmail.com" &&$this->input->post('password')=="Admin123"){

  echo 1;

}else{
	$this->form_validation->set_rules('password', 'Password', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	

	if ($this->form_validation->run() == FALSE)
                {
                        echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  '.validation_errors().'
</div>';
                }
                else
                {

                        $this->load->model('Register_model');
                       $responce= $this->Register_model->loginUser();
                       if($responce!=FALSE){
                       	

                        $userID=$responce->userID;
                        $this->load->model('Resturent');
                        $responce1= $this->Resturent->getResturnt($userID);
                        if($responce1!=FALSE){
                                        
                              $resturntID=$responce1->restaurantID;
                                        
                        }

                        $user_data=array(
                          'user_id'=>$responce->userID,
                          'resturntID'=>$responce1->restaurantID,
                          'name'=>$responce->name,
                          'email'=>$responce->email,
                          'password'=>$responce->password,
                          'user_type'=>$responce->userType,
                          'longgedin'=>TRUE
                        );
                        $this->session->set_userdata($user_data);
                        //print_r($_SESSION);
                        echo 0;
                       }else{
                         echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <p> Wrong email or password</p>
</div>';
                       
                       }
                }

}
}


public function logout(){

  $this->session->unset_userdata('user_id');
  $this->session->unset_userdata('resturntID');
  $this->session->unset_userdata('name');
  $this->session->unset_userdata('email');
   $this->session->unset_userdata('password');
  $this->session->unset_userdata('user_type');
  $this->session->unset_userdata('longgedin');
  redirect(base_url().'Home/login');
}

}
?>