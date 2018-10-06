<?php 
class Registration extends CI_Controller {

function _construct(){
    parent::_construct();
    //$this->load->model('Resturent');
  }
 
public function Register(){
 $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
                $this->form_validation->set_rules('conPassword', 'Confirm Password', 'required|matches[password]');


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
                      $responce= $this->Register_model->insertRegister();
                      $msg['success']=FALSE;

                        if($responce){

                         echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      Data saved successfull.
                    </div>';

                        }else{

                          echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close"
              data-dismiss="alert">&times;</button>
  Data not saved .   
</div>';
                        }
                            
                       // echo json_encode($msg);
                }



}
    public function showResturentOpenHours(){
    $resturentID=$this->session->resturntID;//$_SESSION['resturntID'];
      $this->load->model('Resturent');
     $responce=$this->Resturent->showResturentOpenHours($resturentID);
     echo json_encode($responce);
  }

  public function resturentOpenHours(){
    $resturentID=$this->session->resturntID;//$_SESSION['resturntID'];
      $this->load->model('Resturent');
     $this->Resturent->resturentOpenHours($resturentID);

  }
}

?>