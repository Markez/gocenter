<?php 
class Start  extends CI_Controller
{
	/*================================
		home page controller
		========================*/
		function index($year=0,$month=0)
		{	
			$this->load->model('forms');
			$data['calendar'] = $this->forms->hcal($year,$month);

			if(!$year)
			{
				$year= date('Y');
			}
		if(!$month)
			{
				$month= date("m");
			}

			$this->load->view('template/head');
			$this->load->view('Home',$data);
			$this->load->view('template/hfooter');
		}
				function about()
		{
			$this->load->view('template/head');
			$this->load->view('About');
			$this->load->view('template/hfooter');
		}
 
	/*==========================================================

		Controller for viewing the pricing tables for gotcenter
		======================================================*/

		function logout()
	{
		$this->session->sess_destroy();
		unset($this->session->userdata);
		redirect('start/index');
	}

		function pricing($year=0,$month=0)
	{
		if(!$year)
		{
			$year= date('Y');
		}
		if(!$month)
		{
			$month= date("m");
		}

		$this->load->model('forms');

		if($day=$this->input->post('day'))
		{
			$this->forms->add_calendar_data(
				"$year-$month-$day",
				$this->input->post('data')
				);
		}

		$data['calendar'] = $this->forms->generate($year,$month);
	
	$this->load->view('template/header');
		$this->load->view('Pricing1',$data);
		$this->load->view('template/footer');
	}
	/*========================================
		this is the controller for loading the gallery
		==========================================*/

		public function gallery()
		{
			$this->load->view('template/header1');
			$this->load->view('gallery');
			$this->load->view('template/footer1');
		}
			/*========================================
		this is the controller for loading the contact us page
		==========================================*/

		public function contact()
		{
			$this->load->view('template/head');
			$this->load->view('Contact');
			$this->load->view('template/hfooter');
		}
	/*========================================
		this is the controller for processing the sending of messages
		==========================================*/

		public function contactus()
		{

					//getting the posts
					$username = $this->input->post("client");
					$email = $this->input->post("clientmail");
					$subject = $this->input->post("subject");
					$content = $this->input->post("message");

					//starting of the validation process
					$this->load->library('form_validation');

					//validating the post 
					$this->form_validation->set_rules('client','Client','required|trim');
					$this->form_validation->set_rules('clientmail','Clientmail','required|trim|valid_email()');
					$this->form_validation->set_rules('subject','Subject','required|trim');
					/*$this->form_validation->set_rules('subject','Subject','required|trim');*/
					$this->form_validation->set_rules('message','Message','required|trim');


					//this section passes the details to the model so that they can be sent after passing validation stage
				if ($this->form_validation->run() == TRUE)
			        {
						$this->load->model('forms');
						$insert=$this->forms->contactus();
					 
				}
				else
				{
					echo "<a href='signup'>not working. </a>";
					echo 'false';
				}



		}


	//calendar
	function cal($year=0,$month=0)
	{
		if(!$year)
		{
			$year= date('Y');
		}
		if(!$month)
		{
			$month= date("m");
		}

		$this->load->model('forms');

		if($day=$this->input->post('day'))
		{
			$this->forms->add_calendar_data(
				"$year-$month-$day",
				$this->input->post('data')
				);
		}

		$data['calendar'] = $this->forms->generate($year,$month);
	
		$this->load->view('cal',$data);
	}
	function cal2($year=0,$month=0)
	{
		if(!$year)
		{
			$year= date('Y');
		}
		if(!$month)
		{
			$month= date("m");
		}

		$this->load->model('forms');

		if($day=$this->input->post('day'))
		{
			$this->forms->add_calendar_data(
				"$year-$month-$day",
				$this->input->post('data')
				);
		}

		$data['calendar'] = $this->forms->hcal($year,$month);
	
		$this->load->view('cal',$data);
	}
function unbk()
{
	$this->load->model('forms');
	$this->forms->unbk();
}
	

	//activating your account
	function activate($activate) 
	{
	$this->load->helper('form','url');
	$this->load->model('forms');
	$result=array();
	$result=$this->forms->activate($activate);
	if($result)
	{
		echo "success";
	}
	
	}

	//reset your password
	function pwd()
	{
		$this->load->model('forms');
		$data['warn']=$this->forms->pwd();
		// $this->load->view('login',$data);

	}

	//change your password
	function change_p()
	{
		$this->load->model('forms');
		$insert=$this->forms->change_p();
		if($insert)
		{
			echo "<script>successful</script>";
			redirect('access/index');
		}
		else {
			$data['err']="Password was not changed";
			$this->load->view('pass',$data);
		}
	}

	function views()
	{
			$this->load->view('template/head');
			$this->load->view('signup');
			$this->load->view('template/hfooter');
	}
	function signup()
	{
		$this->load->model('forms');
		$data['sign']=$this->forms->signin();
		if($data['sign']=='true')
		{
			$this->load->view('template/head');
			$this->load->view('login',$data);
			$this->load->view('template/hfooter');
		}
		else
		{
				$this->load->view('template/head');
			$this->load->view('signup',$data);
			$this->load->view('template/hfooter');
		}
	}
	function login()

	{		
			$this->load->view('template/head');
			$this->load->view('login');
			$this->load->view('template/hfooter');
		
	}
	function validate()
	{
		$this->load->model('forms');
		$data=$this->forms->validate();
		echo $data;
	}

	//edit password
	function passedit()
	{
		$this->load->model('forms');
		$this->forms->passedit();
	}

	function ep()
	{
		$this->load->view('template/head');
		$this->load->view('editp');
		$this->load->view('template/hfooter');
	}
	// edit your profile page
	function editp()
	{
			$this->load->model('forms');
			$r=$this->forms->editp();
			if($r==true)
			{
				
				redirect('start/index');
			}
			else
			{
				echo "Information failed to update";
			}
	}

	function upload()
	{
		$this->load->helper('array');
		if(!$this->session->userdata('fname'))
		{
			echo "<div class='jumpotron'><h2>YOU MUST ".anchor('access/logout','LOGIN')." FIRST</h2></div>";
		}
		else
		{
		$config['upload_path'] = './profile/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '100000';
		$config['max_height']  = '100000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();//$error['error'];
		}
		else
		{
			$upload_data = $this->upload->data();

			//$this->load->view('upload_success', $data);
		$file_name = $upload_data['file_name'];

		$this->load->helper('form','url');
		$this->load->model('forms');
		$result=$this->forms->upload($file_name);


		if($result)
		{
			$data['user']=$this->session->userdata('fname');
		$data['img']=$file_name;
		// $this->load->view('template/header');
		// $this->load->view('profile',$data);
		// $this->load->view('template/footer');
		
		$this->session->set_userdata('img',$file_name);
		redirect('start/index');		
		}
		else
		{
			echo 'wrong';
		}

		}
	}		
	}
}
?>