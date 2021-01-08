<?php
class Jalan extends CI_Controller{

	function index(){

        $data['jln'] = $this->db->get('Jalan')->result();
		$this->template->load('template','jalan',$data);
    }

    function form(){

		$this->template->load('template','formjln');
    }

    function formupt($id){
        $data['jln'] = $this->db->get_where('Jalan',['id' => $id])->result();
		$this->template->load('template','formupt',$data);
    }

    function insert(){
        $data = [
            'nomor_urut' => $this->input->post('nm_urut'),
            'nm_jln' => $this->input->post('nm_jln'),
            'p_jln' => $this->input->post('p_jln'),
            'status_jln' => $this->input->post('status_jln')
        ];

        $this->db->insert('Jalan',$data);
        
        redirect('jalan','refresh');
        
    }

    function update($id){
        $data = [
            'nomor_urut' => $this->input->post('nm_urut'),
            'nm_jln' => $this->input->post('nm_jln'),
            'p_jln' => $this->input->post('p_jln'),
            'status_jln' => $this->input->post('status_jln')
        ];

        $this->db->update('Jalan',$data,['id' => $id]);
        redirect('jalan','refresh');
    }

    function hapus($id){
        $this->db->delete('Jalan',['id' => $id]);
        redirect('jalan','refresh');
    }
    
}
?>