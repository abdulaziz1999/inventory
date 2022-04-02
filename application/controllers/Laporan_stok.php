<?php
class Laporan_stok extends CI_Controller{

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
        $u = $this->input->get('u', TRUE);
        $data['unit'] = @$this->db->get('tb_unit');
        $data['cutoff'] = @$this->db->get('tb_cutoff');
        if($start && $end != NULL){

        }else{
            $start = date('Y-m-d h:i:s');
            $end = date('Y-m-d h:i:s');
        }
        if($idc){
                $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang');
                $this->db->where('cutoff_id', $idc);
                if($u == TRUE){
                    $this->db->where('unit_id =', $u);
                }
                //sum per id barang
        $data['stok'] =	$this->db->select('*')->get('tb_barang');
        }

        $this->template->load('template', 'laporan/laporan_stok_cutoff',$data);
        
    }

    function ajax($s, $e, $u=false, $k=false){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $this->My_model->dataLog('Laporan Stok dengan filter dari '.$s.' sampai '.$e.' unit : '.$u);
               
                $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang');
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
        $get =	$this->db->select('tgl,no_ref,nama_barang,nama_kategori,nama_satuan,supplier,remarks,harga_beli,harga_jual,sum(harga_beli*jumlah) as total')->group_by('r.id_receiving')->get('tb_barang');

        $data = array();
        $no = 1; 

        foreach($get->result() as $row){
            $data[] = [
                $no++,
                $row->tgl,
                $row->no_ref,
                $row->nama_barang,
                $row->supplier,
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
    } 

    function ajax2($idc, $u=false, $k=false){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        // $this->My_model->dataLog('Laporan Stok dengan filter dari '.$s.' sampai '.$e.' unit : '.$u);
               
                $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang','left');
                $this->db->join('tb_satuan s','tb_barang.satuan = s.id_satuan');
                $this->db->join('tb_kategori k','tb_barang.kategori = k.id_kategori');
                $this->db->join('tb_brand br','tb_barang.brand = br.id_brand');
                $this->db->join('tb_receiving_item r','tb_barang.id_barang = r.id_barang');
                $this->db->join('tb_receiving r2','r.id_receiving = r2.id_receiving');
                $this->db->join('tb_issuing_item is','tb_barang.id_barang = is.id_barang');
                $this->db->join('tb_issuing is2','is.id_issuing = is2.id_issuing');
                $this->db->where('r2.idcutoff', $idc);
                $this->db->where('is2.idcutoff', $idc);
                if($u == TRUE){
                    $this->db->where('unit_id =', $u);
                }elseif($k == TRUE){
                    $this->db->where('kategori =', $k);
                }
                //sum per id barang
        $get =	$this->db->select('*,sum(r.jumlah) as t_pembelian,sum(is.jumlah) as t_penjualan,tb_barang.id_barang')->group_by('nama_barang')->get('tb_barang');

        $data = array();
        $no = 1; 

        foreach($get->result() as $row){
            $jml_stok = $row->stok+($row->t_pembelian-$row->t_penjualan);
            $harga_rata2 = $row->harga_beli;
            $stok = $this->db->get_where('tb_stok',['id_barang' =>$row->id_barang ,'cutoff_id' => $idc-1])->row()->stok;
            $data[] = [
                $no++,
                $row->tgl,
                $row->nama_barang,
                $row->nama_kategori,
                $row->nama_satuan,
                $stok,
                $row->t_pembelian,
                $row->t_penjualan,
                $jml_stok,
                rupiah($harga_rata2),
                rupiah($harga_rata2*$jml_stok),
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
        // echo "<pre>"; print_r($output); echo "</pre>";
        // $this->output->enable_profiler(TRUE);
        
    }
    
    function ajax3($idc, $u=false, $k=false){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        // $this->My_model->dataLog('Laporan Stok dengan filter dari '.$s.' sampai '.$e.' unit : '.$u);
               
                $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang','left');
                $this->db->join('tb_satuan s','tb_barang.satuan = s.id_satuan');
                $this->db->join('tb_kategori k','tb_barang.kategori = k.id_kategori');
                $this->db->join('tb_brand br','tb_barang.brand = br.id_brand');
                $this->db->join('tb_receiving_item r','tb_barang.id_barang = r.id_barang');
                $this->db->join('tb_receiving r2','r.id_receiving = r2.id_receiving');
                $this->db->join('tb_issuing_item is','tb_barang.id_barang = is.id_barang');
                $this->db->join('tb_issuing is2','is.id_issuing = is2.id_issuing');
                $this->db->where('r2.idcutoff', $idc);
                $this->db->where('is2.idcutoff', $idc);
                if($u == TRUE){
                    $this->db->where('unit_id =', $u);
                }elseif($k == TRUE){
                    $this->db->where('kategori =', $k);
                }
                //sum per id barang
        $get =	$this->db->select('*,sum(r.jumlah) as t_pembelian,sum(is.jumlah) as t_penjualan,tb_barang.id_barang')->group_by('nama_barang')->get('tb_barang');

        $data = array();
        $no = 1; 

        foreach($get->result() as $row){
            $jml_stok = $row->stok+($row->t_pembelian-$row->t_penjualan);
            $harga_rata2 = $row->harga_beli;
            $stok = $this->db->get_where('tb_stok',['id_barang' =>$row->id_barang ,'cutoff_id' => $idc-1])->row()->stok;
            $data[] = [
                $no++,
                $row->tgl,
                $row->nama_barang,
                $row->nama_kategori,
                $row->nama_satuan,
                $stok,
                $row->t_pembelian,
                $row->t_penjualan,
                $jml_stok,
                rupiah($harga_rata2),
                rupiah($harga_rata2*$jml_stok),
            ];
        }

        $output = [
            "draw"              => $draw,
            "recordsTotal"      => $get->num_rows(),
            "recordsFiltered"   => $get->num_rows(),
            "data"              => $data
		];
		
		// echo json_encode($output);
        // exit();
        echo "<pre>"; print_r($output); echo "</pre>";
        $this->output->enable_profiler(TRUE);
        
    }

     function receiving_report($s,$e){
        $data['rev'] = $this->model_my->laporan_rev($s,$e); 

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4-P','orientation' => 'P']);
		$html = $this->load->view('laporan/laporan_rev_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }
}