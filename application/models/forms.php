	<?php

/**
* 
*/

class Forms extends CI_Model
{
	var $conf;
	function forms()
	{
		parent::__construct(); 

		$this->conf=array(
			'start_day' => 'monday',
			'show_next_prev'=>true,
			'next_prev_url'=>base_url().'index.php/start/',
			 'day_type'     => 'short'
			);
		$this->conf['template']= '
	   {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}

	   {heading_row_start}<tr class="titlec">{/heading_row_start}

	   {heading_previous_cell}<th><a class="cal_nav calprev" href="{previous_url}">&lt;&lt;</a></th>
{/heading_previous_cell}
	   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
{heading_next_cell}<th><a class="cal_nav" href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

	   {heading_row_end}</tr>{/heading_row_end}

	   {week_row_start}<tr class="headerc">{/week_row_start}
	   {week_day_cell}<td>{week_day}</td>{/week_day_cell}
	   {week_row_end}</tr>{/week_row_end}

	   {cal_row_start}<tr class="days">{/cal_row_start}
	   {cal_cell_start}<td class="day">{/cal_cell_start}

	   {cal_cell_content}
	   <div class="day_content">
	   <div class="dy">{day}</div>
	   <div class="content">{content}</div>
	   </div>
	   {/cal_cell_content}

	   {cal_cell_content_today} 
	   <div class="day_content">
	   <div class="highlight  dy">{day}</div>
	   <div class="content">{content}</div>
	   </div>
	   {/cal_cell_content_today}


	   {cal_cell_no_content}
	   <div class="day_num dy">{day}</div>
	   {/cal_cell_no_content}

	   {cal_cell_no_content_today}
	   <div class="day_num highlight dy">{day}</div>
	   {/cal_cell_no_content_today}

	   {cal_cell_blank}&nbsp;{/cal_cell_blank}

	   {cal_cell_end}</td>{/cal_cell_end}
	   {cal_row_end}</tr>{/cal_row_end}

	   {table_close}</table>{/table_close}
';
	}

	function signin()
	{
		$name = $this->input->post('name');
		$mail = $this->input->post('mail');
		$phone = $this->input->post('tel');
		$pass = md5($this->input->post('pwd1'));

		$insert=array('Id'=>'',
			'Name'=>$name,
			'Phone'=>$phone,
			'Email'=>$mail,
			'Pass'=>$pass,
			'validate'=>md5($mail)
				);
		$query=$this->db->query("select * from users where Email='".$mail."'");
		if($query->num_rows()==1)
		{
			return "This email already exists";
		}
		else
		{
		$sql=$this->db->insert('users',$insert);
		$qu=$this->db->query('SELECT * FROM users where Email="'.$mail.'"');
				$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'mail.yhub.co.ke',
				  'smtp_port' => '25',
				  'smtp_user' => 'iva@yhub.co.ke', // change it to yours
				  'smtp_pass' => 'iva2015', // change it to yours
				  'mailtype' => 'html',
				  'charset' => 'iso-8859-1',
				  'wordwrap' => TRUE,				   
				);
				$config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
        			$config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
        			$config['crlf'] = '\r\n';
								$code=rand();
								$this->load->library('email',$config);
								$this->email->set_newline("\r\n");

				$this->email->from('alex@yhub.co.ke','Y-Hub');
				$this->email->to($mail);
				$this->email->subject('Yhub Confirmation Email');
				$this->email->message('Please confirm your account as soon as possible by clicking on the following link http://localhost/gocenter/index.php/start/activate/'.md5($qu->row()->Email));

				if($this->email->send())
				{
 
						return "true";
				}
				else
				{
					$que=$this->db->query('DELETE FROM users where Email="'.$mail.'"');
					return "invalid";
					echo show_error($this->email->print_debugger());
				}
		
		}
		echo mysql_error();
	}

	function activate($activate)
	{
		$q=$this->db->query("SELECT * from users where validate='".$activate."'");
		if($q->num_rows()<1)
		{
		echo "<script>alert('not a valid account');</script>";
		}
		else
		{
		$query=$this->db->query('UPDATE users set validate="yes" where validate="'.$activate.'"');
		if($query)
		{
			echo "<script>alert('Your email has been activated successfuly');</script>";
		}
		}
		
	}
	//reset your password
		function pwd()
	{
		$pass=$this->input->post('pass');
		$this->db->where('Email',$pass);
		$sqli=$this->db->get('users');
		if($sqli->num_rows()<1)
		{
			echo "This Email does not exist in our system please sign up";
		}
		else
		{
			$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'mail.yhub.co.ke',
				  'smtp_port' => '25',
				  'smtp_user' => 'iva@yhub.co.ke', // change it to yours
				  'smtp_pass' => 'iva2015', // change it to yours
				  'mailtype' => 'html',
				  'charset' => 'iso-8859-1',
				  'wordwrap' => TRUE,				   
				);
				$config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
        			$config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
        			$config['crlf'] = '\r\n';
								$code=rand(10000000,900000000);
								$this->load->library('email',$config);
								$this->email->set_newline("\r\n");
				$this->email->from('alex@yhub.co.ke','iVa');
				$this->email->to($pass);
				$this->email->subject('Reset Password');
				$this->email->message('Your new password is '.$code);

				if($this->email->send())
				{
						$this->db->query('UPDATE users set Pass="'.md5($code).'" where Email="'.$pass.'" ');
						echo "Check your email for your new password";
				}
				else
				{
					//show_error($this->email->print_debugger());
					echo "your password has not been reset please try again";
				}
				}
	}
//change password

	function change_p()
	{
		$pass=$this->input->post('password');
		$passm=md5($pass);
		$user=$this->session->userdata('username');
		$sql=$this->db->query('UPDATE users SET password="'.$passm.'" where Email="'.$user.'"');
		if($sql)
		{
			return true;
		}

	}

	function validate()
	{
		//error_reporting(0);
		$name=$this->input->post('namee');
		$pws=md5($this->input->post('passe'));
		//prep db
		$sq=$this->db->query('SELECT * FROM users WHERE Email="'.$name.'"');
	$check=$sq->row_array();
		if($sq->num_rows()==0)
		 {
			$false="Your Email does not exist please go and signup";
		 	return $false;
		 }
		else if($check['validate']!='yes')
		{
			$email="Please activate your account from your email";
			return $email;
		}
		else
		{
		$this->db->where('Pass',$pws);
		$this->db->where('Email',$name);
		//run query
		$q=$this->db->get('users');
		if($q->num_rows<1)
		{
			return "wrong password and username combination";
		}
		else
		{
			

			$data= array(
				'username'=> $this->input->post('namee'),
				'fname'=>$q->row()->Name,
				'img'=>$q->row()->img,
				'id'=>$q->row()->Id,
				'is_logged_in'=>true
				);
			$this->session->set_userdata($data);
			$true="true";
			return $true;
		}
		}
	}
	
	function add_calendar_data($date, $data)
	{

		// if($this->db->select('date')->from('calendar')
		// 	->where('date',$date)->count_all_results()
		// 	)
		// {
		// 	$this->db->where('date',$date)
		// ->update('calendar',array(
		// 	'user_id'=>$this->session->userdata('id'),
		// 	'date'=>$date,
		// 	'data'=>'Bronze',
		// 	'Booked'=>'Booked'
		// 	));
		// }
		$gdate = date("Y-m-d", strtotime('today'));
		$today = date("Y-m-d",strtotime($date));
		
		$date1 = new DateTime($gdate);
		$date2 = new DateTime($today);

		if($date2 > $date1)
		{
		$this->db->where('user_id',$this->session->userdata('id'));
		$this->db->where('date',$date);
			$q4=$this->db->get('calendar');
			if($q4->num_rows()>=1)
			{
				echo "<center class='ubkm'><p class='text-success'>You have already booked this date do you want to unbook it?
				 <a class='btn btn-success' id='ubky' name='".$q4->row()->id."'>yes</a> <a class='btn btn-danger' id='ubkn'>No</a></p></center>";
			}
			else 
			{
	$this->db->where('date',$date);
	$q3=$this->db->get('calendar');
			if($q3->num_rows()<2)
		{
				
		$this->db->insert('calendar',array(
			'user_id'=>$this->session->userdata('id'),
				'date'=>$date,
				'data'=>$data,
				'Booked'=>'Booked'
				));

		
		
		$this->db->where('user_id',$this->session->userdata('id'));
		$this->db->where('date',$date);
			$q2=$this->db->get('calendar');


		$this->db->where('id',$this->session->userdata('id'));
		$q=$this->db->get('users');

			$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'mail.yhub.co.ke',
				  'smtp_port' => '25',
				  'smtp_user' => 'iva@yhub.co.ke', // change it to yours
				  'smtp_pass' => 'iva2015', // change it to yours
				  'mailtype' => 'html',
				  'charset' => 'iso-8859-1',
				  'wordwrap' => TRUE,				   
				);
				$config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
        			$config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
        			$config['crlf'] = '\r\n';
								$code=rand(10000000,900000000);
								$this->load->library('email',$config);
								$this->email->set_newline("\r\n");
				$this->email->from('alex@yhub.co.ke','Y-GoCenter');
				$this->email->to('alekin93@yahoo.com');
				$this->email->subject('Booking');
				$this->email->message($q->row()->Name.' with Email '.$q->row()->Email.' has booked the '.$q2->row()->data.' package on the date '.$date.
					'contact him using his mobile number '.$q->row()->Phone);

				if($this->email->send())
				{
					echo "<center><p class='text-success'>Thank you for Booking the administrators has been notified we will contact you soon for further details</p></center>";
				}
				else
				{
					echo "not sent";
					$this->db->quey('DELETE from calendar where date="'.$date.'"');
				}
			
			}
			else
			{
				echo "<center><p class='text-warning'>Sorry The maximum number of Bookings on the day have been achieved try another day.</p></center>";
			}
		}

			}
			else
			{
				echo "<center class='text-warning'>please select future date beyond Today ".$gdate."</center>";
			}
	
}

		function add_silver_data($date, $data)
	{

		if($this->db->select('date')->from('silver')
			->where('date',$date)->count_all_results()
			)
		{
			$this->db->where('date',$date)
		->update('silver',array(
			'user_id'=>$this->session->userdata('id'),
			'date'=>$date,
			'data'=>"Silver"
			));
		}
			
		else{
		$this->db->insert('silver',array(
			'user_id'=>$this->session->userdata('id'),
				'date'=>$date,
				'data'=>"Silver"
				));
		$this->db->where('id',$this->session->userdata('id'));
		$q=$this->db->get('users');

			$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'mail.yhub.co.ke',
				  'smtp_port' => '25',
				  'smtp_user' => 'iva@yhub.co.ke', // change it to yours
				  'smtp_pass' => 'iva2015', // change it to yours
				  'mailtype' => 'html',
				  'charset' => 'iso-8859-1',
				  'wordwrap' => TRUE,				   
				);
				$config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
        			$config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
        			$config['crlf'] = '\r\n';
								$code=rand(10000000,900000000);
								$this->load->library('email',$config);
								$this->email->set_newline("\r\n");
				$this->email->from('alex@yhub.co.ke','Y-GoCenter');
				$this->email->to('alekin93@yahoo.com');
				$this->email->subject('Booking');
				$this->email->message($q->row()->Name.' with Email '.$q->row()->Email.' has booked the Silver package on the date '.$date.
					'contact him using his mobile number '.$q->row()->Phone);

				if($this->email->send())
				{
					echo "Thank you for Booking the administrators has been notified we will contact you soon for further details";
				}
				else
				{
					echo "not sent";
					$this->db->quey('DELETE from silver where date="'.$date.'"');
				}
	}
}
	function add_gold_data($date, $data)
	{

		if($this->db->select('date')->from('gold')
			->where('date',$date)->count_all_results()
			)
		{
			$this->db->where('date',$date)
		->update('gold',array(
			'user_id'=>$this->session->userdata('id'),
			'date'=>$date,
			'data'=>"Gold"
			));
		}
			
		else{
		$this->db->insert('gold',array(
				'user_id'=>$this->session->userdata('id'),
				'date'=>$date,
				'data'=>"Gold"
				));
		$this->db->where('id',$this->session->userdata('id'));
		$q=$this->db->get('users');

			$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'mail.yhub.co.ke',
				  'smtp_port' => '25',
				  'smtp_user' => 'iva@yhub.co.ke', // change it to yours
				  'smtp_pass' => 'iva2015', // change it to yours
				  'mailtype' => 'html',
				  'charset' => 'iso-8859-1',
				  'wordwrap' => TRUE,				   
				);
				$config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
        			$config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
        			$config['crlf'] = '\r\n';
								$code=rand(10000000,900000000);
								$this->load->library('email',$config);
								$this->email->set_newline("\r\n");
				$this->email->from('alex@yhub.co.ke','Y-GoCenter');
				$this->email->to('alekin93@yahoo.com');
				$this->email->subject('Booking');
				$this->email->message($q->row()->Name.' with Email '.$q->row()->Email.' has booked the Gold package on the date '.$date.
					'contact him using his mobile number '.$q->row()->Phone);

				if($this->email->send())
				{
					echo "Thank you for Booking the administrators has been notified we will contact you soon for further details";
				}
				else
				{
					echo "not sent";
					$this->db->quey('DELETE from gold where date="'.$date.'"');
				}
	
	}
}

	function get_calender_data($year,$month)
	{
		
		$query = $this->db->select('*')->from('calendar')
	->like('date',"$year-$month",'after')->get();
		
		$cal_data = array();
		
		foreach ($query->result() as $row) {
			if(substr($row->date,8,1)==0)
			{
				$cal_data[substr($row->date,9,1)] = $row->data."<input class='userd input-form' style='display:none' value='".$row->user_id."'>";
			}
			else{
			$cal_data[substr($row->date,8,2)] = $row->data."<input class='userd input-form' style='display:none' value='".$row->user_id."'>";
			}
		}
		return $cal_data;
	}


	function get_calender_data2($year,$month)
	{
		if($this->session->userdata('id')==null)
		{
		$query = $this->db->select('*')->from('calendar')
	->like('date',"$year-$month",'after')->get();
		}
		else
		{
				$query = $this->db->select('*')->from('calendar')->where('user_id',$this->session->userdata('id'))
	->like('date',"$year-$month",'after')->get();
		}
		$cal_data = array();
		
		foreach ($query->result() as $row) {
			if(substr($row->date,8,1)==0)
			{
				$cal_data[substr($row->date,9,1)] = $row->data."<input class='userd input-form' style='display:none' value='".$row->user_id."'>";
			}
			else{
			$cal_data[substr($row->date,8,2)] = $row->data."<input class='userd input-form' style='display:none' value='".$row->user_id."'>";
			}
		}
		return $cal_data;
	}


		function get_gold_data($year,$month)
	{
		
		$query = $this->db->select('*')->from('gold')
	->like('date',"$year-$month",'after')->get();
		
		$cal_data = array();
		
		foreach ($query->result() as $row) {
			if(substr($row->date,8,1)==0)
			{
				$cal_data[substr($row->date,9,1)] = $row->data."<input class='userd input-form' style='display:none' value='".$row->user_id."'>";
			}
			else{
			$cal_data[substr($row->date,8,2)] = $row->data."<input class='userd input-form' style='display:none' value='".$row->user_id."'>";
			}
		}
		$this->load->library('calendar',$this->conf);

		return $this->calendar->generate($year,$month,$cal_data);
	}
		function get_silver_data($year,$month)
	{
		
		$query = $this->db->select('*')->from('silver')
	->like('date',"$year-$month",'after')->get();
		
		$cal_data = array();
		
		foreach ($query->result() as $row) {
			if(substr($row->date,8,1)==0)
			{
				$cal_data[substr($row->date,9,1)] = $row->data."<input class='userd input-form' style='display:none' value='".$row->user_id."'>";
			}
			else{
			$cal_data[substr($row->date,8,2)] = $row->data."<input class='userd input-form' style='display:none' value='".$row->user_id."'>";
			}
		}
		$this->load->library('calendar',$this->conf);

		return $this->calendar->generate($year,$month,$cal_data);
	}

	function generate($year,$month)
	{
			
		$this->load->library('calendar',$this->conf);

		$cal_data=$this->get_calender_data($year,$month);

		return $this->calendar->generate($year,$month,$cal_data);
	}

	// function for dislplaying booking calendar on home page
	function hcal($year,$month)
	{
		$this->load->library('calendar',$this->conf);

		$cal_data=$this->get_calender_data2($year,$month);

		return $this->calendar->generate($year,$month,$cal_data);
	}
	/*===================================
	this is the model for sending the contactus emails
	==========================*/

	public function contactus()
	{
		$this->load->library('encrypt');

		//this the part for preparing the database


		//the part for sending the emails.
		{
			 	$username= $this->input->post('client');
 				$useremail =$this->input->post('clientmail');
			    $subject = $this->input->post('subject');
			    $body = $this->input->post('message');
	  			$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'ssl://smtp.googlemail.com',
				  'smtp_port' => 465,
				   'smtp_user' => 'csprogrammekenya@gmail.com', // enter your email address here
				  'smtp_pass' => 'CSP@2015@forever', // this is the section for entering the password
				  'mailtype' => 'html',
				  'charset' => 'iso-8859-1',
				  'wordwrap' => TRUE,				   
				);
				$config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
        			$config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
        			$config['crlf'] = '\r\n';
 							$code=rand();
	  							$this->load->library('email',$config);
	  							$this->email->set_newline("\r\n");

	  			$this->email->from($useremail,$username);
	  			$this->email->to('marqezochy12@gmail.com'); //enter the email address of the receiving person
	  			$this->email->subject($subject);
	  			$this->email->message($body);

	  			if($this->email->send())
	  			{
	  							echo "Your message has been successfully submitted.";
	  							echo "<a href=\"contact\"> Proceed</a>";
	  			}
	  			else
	  			{
	  				echo 'Your submition was not successful.';
	  				return false;
	  			}
	  			
			  	return true;
				}


	}

	//function for unbooking the dates
		function unbk()
		{

			$id = $this->input->post('id');
			$this->db->where('id',$id);
			$q1 =	$q=$this->db->get('calendar');

			$this->db->where('id',$this->session->userdata('id'));
		$q=$this->db->get('users');

		$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'mail.yhub.co.ke',
				  'smtp_port' => '25',
				  'smtp_user' => 'iva@yhub.co.ke', // change it to yours
				  'smtp_pass' => 'iva2015', // change it to yours
				  'mailtype' => 'html',
				  'charset' => 'iso-8859-1',
				  'wordwrap' => TRUE,				   
				);
				$config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
        			$config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
        			$config['crlf'] = '\r\n';
								$code=rand(10000000,900000000);
								$this->load->library('email',$config);
								$this->email->set_newline("\r\n");
				$this->email->from('alex@yhub.co.ke','Y-GoCenter');
				$this->email->to('alekin93@yahoo.com');
				$this->email->subject('UnBook');
				$this->email->message($q->row()->Name.' with Email '.$q->row()->Email.' has UnBooked their '.$q1->row()->data.' package on the date '.$q1->row()->date.
					'contact him using his mobile number '.$q->row()->Phone);

				if($this->email->send())
				{
					echo "<center><p class='text-success'>You have successfully unbooked ".$q1->row()->date."</p></center>";
					$this->db->query('DELETE from calendar where id="'.$id.'"');
				}
				else
				{
					echo "not sent";
					
				}

			
			
		}

		//upload images
		function upload($file)
	{
	$this->load->helper("url");
	$this->load->helper("file");
	$sq=$this->db->query('SELECT * from users where Email="'.$this->session->userdata('username').'"');
	$results=$sq->row();
	if($results->img!=null)
	{
	@unlink("./profile/".$results->img);
	}
		$q=$this->db->query('UPDATE users set img="'.$file.'" where Email="'.$this->session->userdata('username').'"');
		if($q)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function editp()
	{
		$name=$this->input->post('name');
		$phone=$this->input->post('phone');

		$data=array(
			'Name'=>$name,
			'Phone'=>$phone
			);
		$this->db->where('id',$this->session->userdata('id'));
		$q=$this->db->update('users',$data);
		if($q)
		{
			return true;
		}
	}
	function passedit()
	{
		$pass=md5($this->input->post('pass'));

		$data=array(
			'Pass'=>$pass
			);
		$this->db->where('id',$this->session->userdata('id'));
		$q=$this->db->update('users',$data);
		if($q)
		{
			echo "Password successfully changed";
		}
		else
		{
			echo mysql_error();
		}
	}
}

?>