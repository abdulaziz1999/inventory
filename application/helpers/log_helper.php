<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function dataLog($aktifitas){
	$this->load->library('user_agent');
        if ($this->agent->is_browser())
		{
			$agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
			$agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
			$agent = $this->agent->mobile();
		}
		else
		{
			$agent = 'Unidentified User Agent';
		}

        $data = [
            'nama'      => $this->session->userdata('nama'),
            'level'     => $this->session->userdata('level'),
            'aktifitas' => $aktifitas,
            'browser'   => $agent,
            'platform'  => $this->agent->platform(),
            'ip_address'=> $this->input->ip_address(),
        ];
        $this->db->insert('tb_log',$data);
		return ;
    }


	function rupiah($angka)
	{
		$hasil_rupiah = number_format($angka, 0, ',', '.');
		return $hasil_rupiah;
	}
	
	function rupiah2($angka)
	{
		$hasil_rupiah = number_format($angka, 0, ',', '.');
		return $hasil_rupiah;
	}