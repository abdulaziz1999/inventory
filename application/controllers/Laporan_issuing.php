<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
        $u = $this->input->get('u', TRUE);
        $data['unit'] = @$this->db->get('tb_unit');
        $data['cutoff'] = @$this->db->get('tb_cutoff');
        $data['tgl'] = $this->db->get_where('tb_cutoff',['id_cutoff' => $idc])->row();
        if($start && $end != NULL){

        }else{
            $start = date('Y-m-d h:i:s');
            $end = date('Y-m-d h:i:s');
        }

        if($idc){
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
            }
        $data['barang_keluar'] = $this->db->select('tgl,no_ref,nama_customer,nama_pemesan,harga_beli,harga_jual,(harga_jual*jumlah) as total,(harga_beli*jumlah) as total_beli')->group_by('i.id_issuing')->get('tb_barang');

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
        $get =	$this->db->select('tgl,no_ref,nama_customer,nama_pemesan,harga_beli,harga_jual,sum(harga_jual*jumlah) as total,sum(harga_beli*jumlah) as total_beli')->group_by('i.id_issuing')->get('tb_barang');

        $data = array();
        $no = 1;

        foreach($get->result() as $row){
            $data[] = [
                $no++,
                $row->tgl,
                $row->no_ref,
                $row->nama_customer,
                $row->nama_pemesan,
                "Rp. ".number_format($row->total_beli,0,"","."),
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

    function excelphp($idc=false, $u=false, $k=false){
        $cutoff = $this->db->get_where('tb_cutoff',['id_cutoff' => $idc])->row();
        $this->My_model->dataLog('Laporan pembelian dengan filter dari '.date_indo($cutoff->start).' sampai '.date_indo($cutoff->end).' unit : '.$u);
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
        $get =	$this->db->select('tgl,no_ref,nama_customer,nama_pemesan,harga_beli,harga_jual,sum(harga_jual*jumlah) as total,sum(harga_beli*jumlah) as total_beli')->group_by('i.id_issuing')->get('tb_barang')->result();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $styleTh = array (
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'B7B7B7',
                ],
            ], 
            'alignment' => [
                'horizontal'    => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'      => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ], 
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                ],
            ],
        );

        $styleTbody = array (
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                ],
            ],
        );

        $styleJudul = array (
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal'    => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'      => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ], 
        );

        //Merge Cell Judul
        $sheet->mergeCells('A1:F1');
        $sheet->mergeCells('A2:F2');
        $sheet->mergeCells('A3:F3');
        $sheet->getStyle('A1:F1')->applyFromArray($styleJudul);
        $sheet->getStyle('A2:F2')->applyFromArray($styleJudul);
        $sheet->getStyle('A3:F3')->applyFromArray($styleJudul);

        //bgColor
        $sheet->getStyle('A4:F4')->applyFromArray($styleTh);
        
        //Judul Laporan
        $sheet->setCellValue('A1', 'Penjualan');
        $sheet->setCellValue('A2', 'Cut Off '.date_indo($cutoff->start).' Sampai '.date_indo($cutoff->end));

        //Header Table
        
        $sheet->setCellValue('A4','No'); 
        $sheet->setCellValue('B4','Tanggal'); 
        $sheet->setCellValue('C4','No PO'); 
        $sheet->setCellValue('D4','Supplier');
        $sheet->setCellValue('E4','Pemesan'); 
        $sheet->setCellValue('F4','Total Pembelian');

        

        $no = 1;
		$x = 5;
		foreach($get as $data)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $data->tgl);
			$sheet->setCellValue('C'.$x, $data->no_ref);
			$sheet->setCellValue('D'.$x, $data->nama_customer);
			$sheet->setCellValue('E'.$x, $data->nama_pemesan);
			$sheet->setCellValue('F'.$x, "Rp. ".number_format($data->total,0,"","."));
			$x++;
		}

        $range = range("A", "F");
        foreach($range as $r){
            $sheet->getColumnDimension($r)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Barang Masuk '.date_indo($cutoff->start).' - '.date_indo($cutoff->end);
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}