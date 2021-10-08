<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_issuing extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_issuing_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('My_model');
        $this->load->library('session');

        if($this->session->userdata('true') != 'oke'){
            redirect(base_url());
        }
    }

    public function index()
    {
        if($this->input->get('idc')){
            $tb_issuing     = $this->Tb_issuing_model->get_cutoff($this->input->get('idc'));
            $cutoffactive   = $this->db->get_where('tb_cutoff',['id_cutoff' => $this->input->get('idc')])->row()->status;
        }else{
            $tb_issuing = $this->Tb_issuing_model->get_all();
            $cutoffactive = '';
        }

        $data = array(
            'tb_issuing_data' => $tb_issuing,
            'level'           => $this->session->userdata('level'),
            'cutoff'          => $this->db->get('tb_cutoff'),
            'cutoffactive'    => $cutoffactive
        );

        $this->template->load('template','issuing/tb_issuing_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_issuing_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_issuing' => $row->id_issuing,
                'tgl' => $row->tgl,
                'no_ref' => $row->no_ref,
                'picker' => $row->picker,
                'remarks' => $row->remarks,
	    );
            $this->template->load('template','issuing/tb_issuing_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_issuing'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'        => 'Tambah',
            'action'        => site_url('tb_issuing/create_action'),
            'id_issuing'    => set_value('id_issuing'),
            'tgl'           => set_value('tgl'),
            'no_ref'        => set_value('no_ref'),
            'no_permintaan' => set_value('no_permintaan'),
            'picker'        => set_value('picker'),
            'remarks'       => set_value('remarks'),
            'nama_proyek'   => set_value('nama_proyek'),
            'ket'           => set_value('ket'),
            'nm_proyek'     => @$this->db->get('tb_proyek'),
            'nm_customer'   => @$this->db->get('tb_customer'),
            'nm_pemesan'    => @$this->db->get('tb_pemesan'),
            'level'         => $this->session->userdata('level')
	);
        $this->template->load('template','issuing/tb_issuing_create', $data);
    }
    
    public function create_action() 
    {
        $idcutoff = $this->db->get_where('tb_cutoff',['status' => '1'])->row()->id_cutoff;
            $data = array(
                'tgl'           => $this->input->post('tgl',TRUE),
                'no_ref'        => $this->input->post('no_ref',TRUE),
                'no_permintaan' => $this->input->post('no_permintaan',TRUE),
                'picker'        => $this->input->post('picker',TRUE),
                'remarks'       => $this->input->post('remarks',TRUE),
                'nama_proyek'   => $this->input->post('nama_proyek',TRUE),
                'ket'           => $this->input->post('ket',TRUE),
                'idcutoff'      => $idcutoff
	    );

            $this->Tb_issuing_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_issuing'));
        
    }
    
    public function update($id) 
    {
        if($this->input->post('kode',TRUE)){
            $cek = $this->db->get_where('tb_barang',['kode_barcode' => $this->input->post('kode',TRUE)]);
            $scan = $this->db->get_where('tb_barang',['kode_barcode' => $this->input->post('kode',TRUE)])->row();
            if($cek->num_rows() == 1){
                $this->session->set_flashdata('sukses', 'Data Barang '.$scan->nama_barang);
                $this->simpanBrangBarcodePending($id,$scan->id_barang,$this->input->post('jumlah',TRUE));
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('gagal', 'Data barang tidak ada, Silahkan di tambah di Master Barang');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }

        $row = $this->Tb_issuing_model->get_by_id($id);
        $this->db->join('tb_barang tb','tb.id_barang = tb_issuing_item.id_barang');
        $data_Issuing = $this->db->select('*,sum(jumlah) as jml')->group_by('nama_barang')->get_where('tb_issuing_item',['id_issuing' => $row->id_issuing]);
        $this->db->join('tb_barang tb','tb.id_barang = tb_issuing_temp.id_barang');
        $data_Pending = $this->db->select('*,sum(jumlah) as jml')->group_by('nama_barang')->get_where('tb_issuing_temp',['id_issuing' => $row->id_issuing]);
        if ($row) {
            $data = array(
                'button'        => 'Ubah',
                'action'        => site_url('tb_issuing/update_action'),
                'id_issuing'    => set_value('id_issuing', $row->id_issuing),
                'tgl'           => set_value('tgl', $row->tgl),
                'no_ref'        => set_value('no_ref', $row->no_ref),
                'no_permintaan' => set_value('no_permintaan', $row->no_permintaan),
                'picker'        => set_value('picker', $row->picker),
                'remarks'       => set_value('remarks', $row->remarks),
                'nama_proyek'   => set_value('nama_proyek',$row->nama_proyek),
                'ket'           => set_value('ket',$row->ket), 
                'b_issuing'     => $data_Issuing,
                'b_pending'     => $data_Pending,
                'barang'        => $this->db->get('tb_barang')->result(),
                'nm_proyek'     => @$this->db->get('tb_proyek'),
                'nm_customer'   => @$this->db->get('tb_customer'),
                'nm_pemesan'    => @$this->db->get('tb_pemesan'),
                'level'         => $this->session->userdata('level')
                );
            if($this->session->userdata('level') == 'superuser' || $this->session->userdata('level') == 'admin'){
                $this->template->load('template','issuing/tb_issuing_form', $data);
            }else{
                $this->template->load('template','issuing/tb_issuing_form_pending', $data);
            }
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
    public function update_action() 
    {

            $data = array(
            'tgl'           => $this->input->post('tgl',TRUE),
            'no_ref'        => $this->input->post('no_ref',TRUE),
            'no_permintaan' => $this->input->post('no_permintaan',TRUE),
            'picker'        => $this->input->post('picker',TRUE),
            'remarks'       => $this->input->post('remarks',TRUE),
            'nama_proyek'   => $this->input->post('nama_proyek',TRUE),
            'ket'           => $this->input->post('ket',TRUE),
	    );

            $this->Tb_issuing_model->update($this->input->post('id_issuing', TRUE), $data);
            $this->session->set_flashdata('sukses', 'Update Record Success');
            redirect($_SERVER['HTTP_REFERER']);
        
    }
    
    function simpan_barang($uri){
        $idbarang   = $this->input->post('barang', TRUE);
        $jmlout     = $this->input->post('jumlah', TRUE);
        $stok       = $this->db->get_where('tb_stok',['id_barang' => $idbarang ])->row()->stok;
        $sisa = $stok - $jmlout;
        if($sisa >= 0){
            
            $this->db->select_max('id_itemiss','max');
            $idmax      = $this->db->get('tb_issuing_item')->row()->max;
            $id         = $this->db->get_where('tb_issuing_item',['id_itemiss' => $idmax])->row();
            $jmlstok    = $this->db->get_where('tb_stok',['id_barang' => $id->id_barang])->row()->stok;
            $issuing    = $jmlstok - $id->jumlah;
            $data = [
                'id_issuing'    => $uri,
                'id_barang'     => $this->input->post('barang', TRUE),
                'jumlah'        => $this->input->post('jumlah', TRUE)
            ];
            
            $this->db->insert('tb_issuing_item',$data);
    
            $data2 = [
                'stok' => $issuing
            ];
    
            $this->db->update('tb_stok', $data2, ['id_barang' =>$id->id_barang]);
            $this->session->set_flashdata('sukses', "Barang Berhasil dikeluarkan");
            redirect($_SERVER['HTTP_REFERER']);
        }elseif($stok == 0 || $sisa <= 0){
            $this->session->set_flashdata('gagal', "Jumlah barang tidak mencukupi");
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    //simpan pending
    function simpan_pending($uri){
        $idbarang   = $this->input->post('barang', TRUE);
        $jmlout     = $this->input->post('jumlah', TRUE);

        $cek = $this->db->get_where('tb_issuing_temp',['id_issuing' => $uri, 'id_barang' => $idbarang]);
        if($cek->num_rows() == 1){
            $jml = @$cek->row()->jumlah;
            $data = [
                'jumlah'        => $jml+$jmlout
            ];
            $this->db->update('tb_issuing_temp',$data,['id_issuing' => $uri, 'id_barang' => $idbarang]);
        }else{
            $data = [
                'id_issuing'  => $uri,
                'id_barang'   => $idbarang,
                'jumlah'      => $jmlout
            ];
            $this->db->insert('tb_issuing_temp',$data);
        }
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Barang Berhasil masuk ke list pending");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('gagal', "Barang Gagal masuk ke list pending");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    //Approve All
    function approve_all($loop,$uri){  
            $x = 1;
 
            while($x <= $loop) {
                $this->db->select_max('id_pendings','max');
                $idmax      = $this->db->get('tb_issuing_temp')->row()->max;
                $id         = $this->db->get_where('tb_issuing_temp',['id_pendings' => $idmax])->row();
                $jmlstok    = $this->db->get_where('tb_stok',['id_barang' => $id->id_barang])->row()->stok;
                $issuing    = $jmlstok - $id->jumlah;

                if($issuing >= 0){
                    $data = [
                        'id_issuing'    => $uri,
                        'id_barang'     => $id->id_barang,
                        'jumlah'        => $id->jumlah
                    ];                
                    $data2 = ['stok' => $issuing];
                    $this->db->insert('tb_issuing_item',$data);
                    $this->db->update('tb_stok', $data2,['id_barang' =>$id->id_barang]);
                    $this->db->delete('tb_issuing_temp',['id_pendings' => $idmax]);

                    
                }elseif($issuing == 0 || $issuing <= 0){
                    $this->session->set_flashdata('gagal', "Barang Tidak cukup");
                }
                $x++;
            }        
            
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Barang Berhasil dikeluarkan");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('gagal', "Jumlah barang tidak mencukupi");
                redirect($_SERVER['HTTP_REFERER']);
            }
    }    

    //Delete barang Pending
    function deletePending($id,$uri){
        $id_barang = $this->db->get_where('tb_issuing_temp',['id_pendings' => $id])->row()->id_barang;
        $cek = $this->db->get_where('tb_issuing_temp',['id_barang' => $id_barang])->num_rows();
        if($cek > 1){
            $this->db->delete('tb_issuing_temp',['id_issuing' => $uri, 'id_barang' => $id_barang]);
        }else{
            $this->db->delete('tb_issuing_temp',['id_pendings' => $id]);
        }
        $this->session->set_flashdata('sukses', "Hapus Barang Masuk Berhasil");
        redirect($_SERVER['HTTP_REFERER']);
    }

    function simpanBrangBarcode($uri,$id_barang,$jumlah){
        $idbarang   = $id_barang;
        $jmlout     = $jumlah;
        $stok       = $this->db->get_where('tb_stok',['id_barang' => $idbarang ])->row()->stok;
        $sisa = $stok - $jmlout;
        if($sisa >= 0){
            $data = [
                'id_issuing'    => $uri,
                'id_barang'     => $id_barang,
                'jumlah'        => $jumlah
            ];
            
            $this->db->insert('tb_issuing_item',$data);
    
                          $this->db->select_max('id_itemiss','max');
            $idmax      = $this->db->get('tb_issuing_item')->row()->max;
            $id         = $this->db->get_where('tb_issuing_item',['id_itemiss' => $idmax])->row();
            $jmlstok    = $this->db->get_where('tb_stok',['id_barang' => $id->id_barang])->row()->stok;
            $issuing    = $jmlstok - $id->jumlah;
    
            $data2 = [
                'stok' => $issuing
            ];
    
            $this->db->update('tb_stok', $data2, ['id_barang' =>$id->id_barang]);
            $this->session->set_flashdata('sukses', "Barang Berhasil dikeluarkan");
            redirect($_SERVER['HTTP_REFERER']);
        }elseif($stok == 0 || $sisa < 0){
            $this->session->set_flashdata('gagal', "Jumlah barang tidak mencukupi");
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    function simpanBrangBarcodePending($uri,$id_barang,$jumlah){
        $cek = $this->db->get_where('tb_issuing_temp',['id_issuing' => $uri, 'id_barang' => $id_barang]);
        if($cek->num_rows() == 1){
            $jml = $cek->row()->jumlah;
            $data = [
                'jumlah'        => $jml+$jumlah
            ];
            $this->db->update('tb_issuing_temp',$data,['id_issuing' => $uri, 'id_barang' => $id_barang]);
        }else{
            $data = [
                'id_issuing'    => $uri,
                'id_barang'     => $id_barang,
                'jumlah'        => $jumlah
            ];
            $this->db->insert('tb_issuing_temp',$data);
        }
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Barang Berhasil masuk ke list pending");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('gagal', "Barang Gagal masuk ke list pending");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteitem($id) 
    {
        $idb                = $this->db->get_where('tb_issuing_item',['id_itemiss' => $id])->row();
        $jmlstok            = $this->db->get_where('tb_stok',['id_barang' => $idb->id_barang])->row()->stok;
        $delete_issuing     = $jmlstok + $idb->jumlah;
        
        $data = [
            'stok' => $delete_issuing
        ];
        $this->db->update('tb_stok', $data, ['id_barang' => $idb->id_barang]);
        $this->db->delete('tb_issuing_item',['id_itemiss' => $id]);

        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id) 
    {
        $row = $this->Tb_issuing_model->get_by_id($id);

        if ($row) {
            $this->Tb_issuing_model->delete($id);
            $this->db->delete('tb_issuing_item',['id_issuing' => $id]);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_issuing'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_issuing'));
        }
    }

    function updatejumlah(){
        $id = $this->input->post('id');
        $pending = $this->db->get_where('tb_issuing_temp',['id_pendings' => $id])->row();
        $barang = $this->db->get('tb_barang')->result();
        ?>
        <form action="<?= base_url('tb_issuing_temp/update_pending/'.$id)?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="barang">Nama Barang :</label>
                            <div class="form-group">
                                <select class="form-control col-md-12" id="js-example-basic-single" type="text" name="barang" required>
                                    <option value="" selected disabled>Nama Barang - [ Stok ] </option>
                                    <?php foreach($barang as $row){?>
                                    <option value="<?= $row->id_barang?>" <?= $pending->id_barang == $row->id_barang ? 'selected' : '' ?> >
                                        <?= $row->nama_barang?> _ [ <?= $this->db->get_where('tb_stok',['id_barang' => $row->id_barang])->row()->stok?> 
                                        <?php $s = $this->db->get_where('tb_barang',['id_barang' => $row->id_barang])->row()->satuan; echo $this->db->get_where('tb_satuan',['id_satuan' => $s])->row()->nama_satuan;?> ]
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="jumlah">Jumlah Barang :</label>
                            <div class="form-group">
                                <input class="col-md-12" type="number" name="jumlah" value="<?= $pending->jumlah?>" autocomplete="off"
                                    placeholder="Jumlah Barang" required>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-round btn-success">Save</button>
                <button type="button" class="btn btn-sm btn-round btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
            <script>
                $(document).ready(function() {
                    $('#js-example-basic-single').select2();
                    const cap = document.querySelector('.select2-container');
                    cap.setAttribute('style','width:100%'); 
            });
            </script>
        <?php
    }


    function update_pending($id){
        $data = [
            'id_barang' => $this->input->post('barang'), 
            'jumlah'    => $this->input->post('jumlah')
        ];
        $this->db->update('tb_issuing_temp',$data,['id_pendings' => $id]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Update data barang berhasil");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('gagal', "Update data barang gagal");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('no_ref', 'no ref', 'trim|required');
	$this->form_validation->set_rules('picker', 'picker', 'trim|required');
	$this->form_validation->set_rules('remarks', 'remarks', 'trim|required');
	$this->form_validation->set_rules('id_issuing', 'id_issuing', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_issuing.xls";
        $judul = "tb_issuing";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
        xlsWriteLabel($tablehead, $kolomhead++, "No Ref");
        xlsWriteLabel($tablehead, $kolomhead++, "Picker");
        xlsWriteLabel($tablehead, $kolomhead++, "Remarks");

	foreach ($this->Tb_issuing_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_ref);
            xlsWriteLabel($tablebody, $kolombody++, $data->picker);
            xlsWriteLabel($tablebody, $kolombody++, $data->remarks);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_issuing.doc");

        $data = array(
            'tb_issuing_data' => $this->Tb_issuing_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_issuing_doc',$data);
    }

    public function report_iss_picker($uri)
    {

        $data['sup'] = $this->Tb_issuing_model->get_picker($uri);

        $mpdf = new \Mpdf\Mpdf(['tempDir' => '/tmp','format' => 'A4-P','orientation' => 'P']);
		$html = $this->load->view('issuing/tb_issuing_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }

}

/* End of file Tb_issuing.php */
/* Location: ./application/controllers/Tb_issuing.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 05:19:36 */
/* http://harviacode.com */