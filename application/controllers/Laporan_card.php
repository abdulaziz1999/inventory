<?php
class Laporan_card extends CI_Controller{

    function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('My_model','model_my');
            $this->load->library('session');
            if($this->session->userdata('true') != 'oke'){
                redirect(base_url());
            }
        }
    

    function index(){
        $start = $this->input->get('s', TRUE);
        $end = $this->input->get('e', TRUE);
        $idc = $this->input->get('idc', TRUE);
        $i = $this->input->get('i', TRUE);
        $k = $this->input->get('k', TRUE);
        $u = $this->input->get('u', TRUE);
        $data['kategori']   = @$this->db->get('tb_kategori');
        $data['unit']       = @$this->db->get('tb_unit');
        $data['barang']     = @$this->db->select('id_barang,nama_barang')->get('tb_barang');
        $data['cutoff']     = @$this->db->get('tb_cutoff');
        if($start && $end != NULL){

        }else{
            $start = date('Y-m-d h:i:s');
            $end = date('Y-m-d h:i:s');
        }
        if($idc){
            $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang');
            $this->db->where('cutoff_id', $idc);
            if($i == TRUE){
                $this->db->where('tb_barang.id_barang =', $i);
            }elseif($k == TRUE){
                $this->db->where('kategori =', $k);
            }elseif($u == TRUE){
                $this->db->where('unit_id =', $u);
            }
            //sum per id barang
            $data['stok'] =	$this->db->select('*')->get('tb_barang');
        }

        $this->template->load('template', 'laporan/laporan_kartuStok_cutoff',$data);
    }

    function ajax($s, $e, $u=false, $k=false, $i=false){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $this->My_model->dataLog('Laporan card stok dengan filter dari '.$s.' sampai '.$e.' unit : '.$u);
               
                $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang');
                $this->db->join('tb_satuan s','tb_barang.satuan = s.id_satuan');
                $this->db->join('tb_kategori k','tb_barang.kategori = k.id_kategori');
                $this->db->join('tb_brand br','tb_barang.brand = br.id_brand');
                $this->db->join('tb_receiving_item r','tb_barang.id_barang = r.id_barang');
                $this->db->join('tb_receiving r2','r.id_receiving = r2.id_receiving');
                $this->db->where('tgl >=', $s);
                $this->db->where('tgl <=', $e);
                if($u != ""){
                    $this->db->where('tb_barang.unit_id', $u);
                }
                
                if($k != "" ){
                    $this->db->where('tb_barang.kategori', $k);
                }
                
                if($i != ""){
                    $this->db->where('tb_barang.id_barang', $i);
                }
        $get =	$this->db->select('tgl,no_ref,tb_barang.id_barang,nama_kategori,nama_satuan,supplier,remarks,harga_beli,harga_jual,sum(harga_beli*jumlah) as total')->get('tb_barang');

        $data = array();
        $no = 1;

        foreach($get->result() as $row){
            $data[] = [
                $no++,
                $row->tgl,
                $row->no_ref,
                $row->id_barang,
                $row->supplier,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                "Rp. ".number_format($row->total,0,"","."),
            ];
        }

        $output = [
            "draw"              => $draw,
            "recordsTotal"      => $get->num_rows(),
            "recordsFiltered"   => $get->num_rows(),
            "data"              => $data
		];
		
		echo json_encode($output);
        exit();
        // print_r($data);
        // $this->output->enable_profiler(TRUE);
        
    } 

    function ajax2($s, $e, $u=false, $k=false, $i=false){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $this->My_model->dataLog('Laporan card stok dengan filter dari '.$s.' sampai '.$e.' unit : '.$u);
               
                $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang');
                $this->db->join('tb_satuan s','tb_barang.satuan = s.id_satuan');
                $this->db->join('tb_kategori k','tb_barang.kategori = k.id_kategori');
                $this->db->join('tb_brand br','tb_barang.brand = br.id_brand');
                $this->db->join('tb_receiving_item r','tb_barang.id_barang = r.id_barang');
                $this->db->join('tb_receiving r2','r.id_receiving = r2.id_receiving');
                $this->db->where('tgl >=', $s);
                $this->db->where('tgl <=', $e);
                if($u != ""){
                    $this->db->where('tb_barang.unit_id', $u);
                }
                
                if($k != "" ){
                    $this->db->where('tb_barang.kategori', $k);
                }
                
                if($i != ""){
                    $this->db->where('tb_barang.id_barang', $i);
                }
        $get =	$this->db->select('tgl,no_ref,tb_barang.id_barang,nama_kategori,nama_satuan,supplier,remarks,harga_beli,harga_jual,sum(harga_beli*jumlah) as total')->get('tb_barang');

        $data = array();
        $no = 1;

        foreach($get->result() as $row){
            $data[] = [
                $no++,
                $row->tgl,
                $row->no_ref,
                $row->id_barang,
                $row->supplier,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                $row->remarks,
                "Rp. ".number_format($row->total,0,"","."),
            ];
        }

        $output = [
            "draw"              => $draw,
            "recordsTotal"      => $get->num_rows(),
            "recordsFiltered"   => $get->num_rows(),
            "data"              => $data
		];
		
		echo json_encode($output);
        exit();
        // print_r($data);
        // $this->output->enable_profiler(TRUE);
        
    }

    function receiving_report($s,$e){
        $data['rev'] = $this->model_my->laporan_rev($s,$e); 

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4-P','orientation' => 'P']);
		$html = $this->load->view('laporan/laporan_rev_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }
}