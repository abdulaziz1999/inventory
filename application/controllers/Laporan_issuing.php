<?php
class Laporan_issuing extends CI_Controller{

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
        $data['unit'] = @$this->db->get('tb_unit');
        $data['cutoff'] = @$this->db->get('tb_cutoff');
        $data['tgl'] = $this->db->get_where('tb_cutoff',['id_cutoff' => $idc])->row();
        if($start && $end != NULL){

        }else{
            $start = date('Y-m-d h:i:s');
            $end = date('Y-m-d h:i:s');
        }

        $this->template->load('template', 'laporan/laporan_issuing_cutoff',$data);
    }

    function ajax($s, $e, $u=false, $k=false){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $this->My_model->dataLog('Laporan penjualan dengan filter dari '.$s.' sampai '.$e.' unit : '.$u);

        $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang');
        $this->db->join('tb_satuan s','tb_barang.satuan = s.id_satuan');
        $this->db->join('tb_kategori k','tb_barang.kategori = k.id_kategori');
        $this->db->join('tb_brand br','tb_barang.brand = br.id_brand');
        $this->db->join('tb_issuing_item i','tb_barang.id_barang = i.id_barang');
        $this->db->join('tb_issuing i2','i.id_issuing = i2.id_issuing');
        $this->db->join('tb_customer c','i2.picker = c.id_customer');
        $this->db->join('tb_pemesan p','i2.remarks = p.id_pemesan');
        $this->db->where('tgl >=', $s);
		$this->db->where('tgl <=', $e);
		if($u == TRUE){
            $this->db->where('unit_id =', $u);
        }elseif($k == TRUE){
            $this->db->where('kategori =', $k);
        }
        $get =	$this->db->select('tgl,no_ref,nama_customer,nama_pemesan,harga_beli,harga_jual,sum(harga_jual*jumlah) as total')->group_by('i.id_issuing')->get('tb_barang');

        $data = array();
        $no = 1;

        foreach($get->result() as $row){
            $data[] = [
                $no++,
                $row->tgl,
                $row->no_ref,
                $row->nama_customer,
                $row->nama_pemesan,
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
    }

    function ajax2($idc, $u=false, $k=false){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $cutoff = $this->db->get_where('tb_cutoff',['id_cutoff' => $idc])->row();
        $this->My_model->dataLog('Laporan penjualan dengan filter dari '.date_indo($cutoff->start).' sampai '.date_indo($cutoff->end).' unit : '.$u);

        $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang');
        $this->db->join('tb_satuan s','tb_barang.satuan = s.id_satuan');
        $this->db->join('tb_kategori k','tb_barang.kategori = k.id_kategori');
        $this->db->join('tb_brand br','tb_barang.brand = br.id_brand');
        $this->db->join('tb_issuing_item i','tb_barang.id_barang = i.id_barang');
        $this->db->join('tb_issuing i2','i.id_issuing = i2.id_issuing');
        $this->db->join('tb_customer c','i2.picker = c.id_customer');
        $this->db->join('tb_pemesan p','i2.remarks = p.id_pemesan');
        $this->db->where('i2.idcutoff', $idc);
		if($u == TRUE){
            $this->db->where('unit_id =', $u);
        }elseif($k == TRUE){
            $this->db->where('kategori =', $k);
        }
        $get =	$this->db->select('tgl,no_ref,nama_customer,nama_pemesan,harga_beli,harga_jual,sum(harga_jual*jumlah) as total')->group_by('i.id_issuing')->get('tb_barang');

        $data = array();
        $no = 1;

        foreach($get->result() as $row){
            $data[] = [
                $no++,
                $row->tgl,
                $row->no_ref,
                $row->nama_customer,
                $row->nama_pemesan,
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
    }

    function issuing_report($s,$e){
        $data['iss'] = $this->model_my->laporan_iss($s,$e); 

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4-P','orientation' => 'P']);
		$html = $this->load->view('laporan/laporan_iss_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }

}