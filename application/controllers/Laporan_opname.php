<?php
class Laporan_opname extends CI_Controller{

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
        $data['unit'] = @$this->db->get('tb_unit');
        if($start && $end != NULL){

        }else{
            $start = date('Y-m-d h:i:s');
            $end = date('Y-m-d h:i:s');
        }

        $this->template->load('template', 'laporan/laporan_opname',$data);
    }

    function ajax($s, $e, $u=false, $k=false){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $this->My_model->dataLog('Laporan opname dengan filter dari '.$s.' sampai '.$e.' unit : '.$u);
               
                $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang','left');
                $this->db->join('tb_satuan s','tb_barang.satuan = s.id_satuan');
                $this->db->join('tb_kategori k','tb_barang.kategori = k.id_kategori');
                $this->db->join('tb_brand br','tb_barang.brand = br.id_brand');
                $this->db->join('tb_receiving_item r','tb_barang.id_barang = r.id_barang');
                $this->db->join('tb_receiving r2','r.id_receiving = r2.id_receiving');
                $this->db->where('tgl >=', $s);
                $this->db->where('tgl <=', $e);
                if($u == TRUE){
                    $this->db->where('unit_id =', $u);
                }elseif($k == TRUE){
                    $this->db->where('kategori =', $k);
                }
        $get =	$this->db->select('tgl,no_ref,st.*,nama_barang,nama_kategori,nama_satuan,supplier,remarks,harga_beli,harga_jual,sum(harga_beli*jumlah) as total')->group_by('tb_barang.id_barang')->get('tb_barang');

        $data = array();
        $no = 1;
        foreach($get->result() as $row){
            $row->jml_baik ? $jmlbaik = $row->jml_baik : $jmlbaik = "-";
            $row->jml_rusak ? $jmlrusak = $row->jml_rusak : $jmlrusak = "-";
            $row->jml_hilang ? $jmlhilang = $row->jml_hilang : $jmlhilang = "-";
            $jml_fisik      = $row->jml_baik + $row->jml_rusak;
            $selisih        = $row->stok - $jml_fisik;
            $jmlhrgrasio    = $jml_fisik * $row->harga_beli;
            
            $data[] = [
                $no++,
                $row->nama_barang,
                $row->nama_kategori,
                $row->stok,
                $row->nama_satuan,
                "Rp. ".number_format($row->harga_beli,0,"","."),
                $jmlbaik,
                $jmlrusak,
                $jmlhilang,
                $jml_fisik,
                $selisih,
                "Rp. ".number_format($jmlhrgrasio,0,"","."),
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
    } 

     function receiving_report($s,$e){
        $data['rev'] = $this->model_my->laporan_rev($s,$e); 

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4-P','orientation' => 'P']);
		$html = $this->load->view('laporan/laporan_rev_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }
}