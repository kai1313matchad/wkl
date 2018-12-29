<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends MX_Controller {

	function __construct()
    {
        parent::__construct();
    }

    function smtp_only() {
  //   	$mailFrom = 'systemmatch@match-advertising.com';
		// $mailPass = 'Rahasia2017';
    	$mailFrom = 'cs@wiklan.com';
    	$mailPass = '@wiklan2018';
    	$mailTo = 'webdeveloper@wiklan.com';
    	$subjek = 'test mail4';
        $message = 'lorem ipsum dolor sit amet opum locus get rid of';
        $user = 'Customer Support';

    	// $config = Array(
     //        'protocol' => 'smtp',
     //        'smtp_host' => 'smtp.gmail.com',
     //        'smtp_port' => 587,
     //        'smtp_user' => $mailFrom,
     //        'smtp_pass' => $mailPass,
     //        'mailtype'  => 'html', 
     //        'charset'   => 'utf-8'
     //    );

        $this->load->library('email');

		// $config['mailtype'] 		= 'html';
		// $config['smtp_port']		= 587;
		// $config['smtp_timeout']		= 30;
		// $config['charset']			= 'utf-8';
		// $config['protocol'] 		= 'smtp';
		// $config['smtp_host']        = 'smtp.gmail.com';
		// $config['mailpath'] 		= '/usr/sbin/sendmail';
		// $config['charset'] 			= 'iso-8859-1';
		// $config['wordwrap'] 		= TRUE;
		// $config['smtp_crypto']      = 'tls'; 
		// $config['smtp_user'] 		= $mailFrom;
		// $config['smtp_pass'] 		= $mailPass;

		// $config['protocol']         = 'smtp';                   // 'mail', 'sendmail', or 'smtp'
		// $config['mailpath']         = '/usr/sbin/sendmail';
		// $config['smtp_host']        = 'smtp.gmail.com';
		// $config['smtp_auth']        = true;                     // Whether to use SMTP authentication, boolean TRUE/FALSE. If this option is omited or if it is NULL, then SMTP authentication is used when both $config['smtp_user'] and $config['smtp_pass'] are non-empty strings.
		// $config['smtp_user']        = 'cs@wiklan.com';
		// $config['smtp_pass']        = 'wikl@n2018';
		// $config['smtp_port']        = 587;
		// $config['smtp_timeout']     = 30;                       // (in seconds)
		// $config['smtp_crypto']      = 'tls';                       // '' or 'tls' or 'ssl'
		// $config['smtp_debug']       = 0;                        // PHPMailer's SMTP debug info level: 0 = off, 1 = commands, 2 = commands and data, 3 = as 2 plus connection status, 4 = low level data output.
		// $config['debug_output']     = 'html';                       // PHPMailer's SMTP debug output: 'html', 'echo', 'error_log' or user defined function with parameter $str and $level. NULL or '' means 'echo' on CLI, 'html' otherwise.
		// $config['smtp_auto_tls']    = false;                     // Whether to enable TLS encryption automatically if a server supports it, even if `smtp_crypto` is not set to 'tls'.
		// $config['smtp_conn_options'] = array();                 // SMTP connection options, an array passed to the function stream_context_create() when connecting via SMTP.
		// $config['wordwrap']         = true;
		// $config['wrapchars']        = 76;
		// $config['mailtype']         = 'html';                   // 'text' or 'html'
		// $config['charset']          = 'UTF-8';                     // 'UTF-8', 'ISO-8859-15', ...; NULL (preferable) means config_item('charset'), i.e. the character set of the site.
		// $config['validate']         = true;
		// $config['priority']         = 3;                        // 1, 2, 3, 4, 5; on PHPMailer useragent NULL is a possible option, it means that X-priority header is not set at all, see https://github.com/PHPMailer/PHPMailer/issues/449
		// $config['crlf']             = "\r\n";                     // "\r\n" or "\n" or "\r"
		// $config['newline']          = "\r\n";                     // "\r\n" or "\n" or "\r"
		// $config['bcc_batch_mode']   = false;
		// $config['bcc_batch_size']   = 200;
		// $config['encoding']         = '8bit';  
        
        // $this->load->library('email');
        // $this->email->initialize($config);
        // $this->email->set_newline("\r\n");

        // $this->email->set_header('MIME-Version', '1.0; charset= utf-8');
        // $this->email->set_header('Content-type', 'text/html');
        $this->email->from($mailFrom, 'Test4');
        $this->email->to($mailTo);
        $this->email->cc($mailFrom);
        $this->email->subject($subjek);
        $this->email->message($message);   

        if($this->email->send() == false){
            show_error($this->email->print_debugger());
        } else {
            return TRUE;
        }
    }

    public function send(){
  		$this->load->library('email');
		$this->email->from('cs@wiklan.com', 'Your Name');
		$this->email->to('webdeveloper@wiklan.com');
		$this->email->subject('This is my subject 2');
		$this->email->message('This is my message 2');
		$this->email->bcc('cs@wiklan.com');
		$this->email->send();

		echo "send";
	}

	function multiple() {
		$mail_to = array('webdeveloper@wiklan.com', 'efendi@wiklan.com', 'zamroni@match-advertising.com', 'forheron@gmail.com', 'kaishasatrio@match-advertising.com');
		$recipients = implode(', ', $mail_to);

		$this->load->library('email');
		$this->email->from('cs@wiklan.com', 'Your Name');
		$this->email->to($recipients);
		$this->email->subject('test blast email');
		$this->email->message('lorem ipsum dolor sit amet');
		$this->email->bcc('cs@wiklan.com');
		$this->email->send();

		echo "send";
	}

	function kirim() {
		$this->load->library('email');

		$subject = 'This is a test';
		$message = '<p>This message has been sent for testing purposes.</p>';

		// Get full html:
		$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
		    <title>' . html_escape($subject) . '</title>
		    <style type="text/css">
		        body {
		            font-family: Arial, Verdana, Helvetica, sans-serif;
		            font-size: 16px;
		        }
		    </style>
		</head>
		<body>
		' . $message . '
		</body>
		</html>';
		// Also, for getting full html you may use the following internal method:
		//$body = $this->email->full_html($subject, $message);

		$result = $this->email
		    ->from('forheron@gmail.com')
		    ->reply_to('cs@wiklan.com')    // Optional, an account where a human being reads.
		    ->to('zamroni@match-advertising.com')
		    ->subject($subject)
		    ->message($body)
		    ->send();

		var_dump($result);
		echo '<br />';
		echo $this->email->print_debugger();

		exit;
	}

	function attach() {
		$file_path = './marketplace/images/cartoon-prisoner.jpg';

		if (file_exists($file_path)) {
			$this->load->library('email');
			$this->email->from('cs@wiklan.com', 'Your Name');
			$this->email->to('webdeveloper@wiklan.com');
			$this->email->subject('This is my subject 2');
			$this->email->message('This is my message 2');
			$this->email->attach($file_path);
			$this->email->bcc('cs@wiklan.com');
			$this->email->send();

			echo "send";
		}
	}

	function promo() {
		$this->load->module('manage_product');
		// get produk
		$mysql_query = "SELECT * FROM store_item WHERE status = 1";
		$data['products'] = $this->manage_product->_custom_query($mysql_query);

		$body = $this->load->view('mail_blast', $data, true);
		$this->load->library('email');
		$this->email->from('cs@wiklan.com', 'Your Name');
		$this->email->to('webdeveloper@wiklan.com');
		$this->email->subject('test promo blast');
		$this->email->message($body);
		// $this->email->bcc('cs@wiklan.com');
		$this->email->send();

		echo "send";
	}

}