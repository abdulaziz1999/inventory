<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->library('user_agent');

		// if ($this->agent->is_browser())
		// {
		// 	$agent = $this->agent->browser().' '.$this->agent->version();
		// }
		// elseif ($this->agent->is_robot())
		// {
		// 	$agent = $this->agent->robot();
		// }
		// elseif ($this->agent->is_mobile())
		// {
		// 	$agent = $this->agent->mobile();
		// }
		// else
		// {
		// 	$agent = 'Unidentified User Agent';
		// }

		// echo $agent;
		// echo "<br>";
		// echo $this->agent->platform(); 
		// echo "<br>";
		// echo $this->input->ip_address(); 
	}

	public function maintenance(){
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Mode Maintenance</title>
		</head>
		<body align="center">
			<h1>Maintenance Mode</h1>
			<img src="<?= base_url('assets/images/maintenance.gif')?>" alt="" srcset="">
		</body>
		</html>
		<?php
	}
}