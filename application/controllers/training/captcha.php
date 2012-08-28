<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('captcha_model');

    session_start();
  }

  public function index()
  {
    if(empty($_POST))
    {
      $captcha = $this->captcha_model->generateCaptcha();

      $_SESSION['captchaWord'] = $captcha['word'];

      $data['captcha'] = $captcha;

      $this->load->view('show_view', $data);
    }
    else
    {
      //check captcha matches
      if(strcasecmp($_SESSION['captchaWord'],
                    $_POST['confirmCaptcha']) == 0)
      {
        $this->load->view('success_view');
      }
      else
      {
        $this->load->view('failure_view');
      }
    }
  }
}
?>

/* End of file c.php */
/* Location: ./application/controllers/welcome.php */