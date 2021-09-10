<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_stok extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_stok_model');
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
        $idc = $this->db->get_where('tb_cutoff',['status' => '1'])->row()->id_cutoff;
        $this->db->join('tb_barang tb','tb.id_barang = tb_stok.id_barang');
        $this->db->join('tb_satuan st','st.id_satuan = tb.satuan');
        $this->db->join('tb_kategori k','tb.kategori = k.id_kategori');
        $this->db->join('tb_brand br','tb.brand = br.id_brand');
        $this->db->join('tb_unit u','u.id_unit = tb.unit_id');
        $this->db->where(['tb_stok.cutoff_id' => $idc]);

        $tb_stok = $this->Tb_stok_model->get_all();

        $data = array(
            'tb_stok_data'  => $tb_stok,
            'jmlstok'       => $this->db->get_where('tb_stok',['cutoff_id' => $idc])->num_rows()
        );

        $this->template->load('template','stok/tb_stok_list', $data);
    }

    public function warning()
    {
        $this->db->join('tb_barang tb','tb.id_barang = tb_stok.id_barang');
        $this->db->join('tb_unit u','u.id_unit = tb.unit_id');
        $tb_stok = $this->Tb_stok_model->get_all();
        $this->db->join('tb_barang tb','tb.id_barang = st.id_barang');
                $this->db->where("`stok` <= min_stok");
        $count = $this->db->get('tb_stok st')->num_rows();
        $data = array(
            'tb_stok_data'  => $tb_stok
        );

        $this->template->load('template','stok/tb_stok_warning', $data);
        // $this->output->enable_profiler(TRUE);
        
    }

    public function read($id) 
    {
        $row = $this->Tb_stok_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'stok' => $row->stok,
		'amount' => $row->amount,
	    );
            $this->template->load('template','stok/tb_stok_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_stok'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_stok/create_action'),
            'id_barang' => set_value('id_barang'),
            'stok' => set_value('stok'),
            'amount' => set_value('amount'),
	);
        $this->template->load('template','stok/tb_stok_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'stok' => $this->input->post('stok',TRUE),
		'amount' => $this->input->post('amount',TRUE),
	    );

            $this->Tb_stok_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_stok'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_stok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('tb_stok/update_action'),
                'id_barang'     => set_value('id_barang', $row->id_barang),
                'stok'          => set_value('stok', $row->stok),
                'jml_baik'      => set_value('jml_baik', $row->jml_baik),
                'jml_rusak'     => set_value('jml_rusak', $row->jml_rusak),
                'jml_hilang'    => set_value('jml_hilang', $row->jml_hilang),
	    );
            $this->template->load('template','stok/tb_stok_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_stok'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

            $data = array(
            'stok'          => $this->input->post('stok',TRUE),
            'jml_baik'      => $this->input->post('jml_baik',TRUE),
            'jml_rusak'     => $this->input->post('jml_rusak',TRUE),
            'jml_hilang'    => $this->input->post('jml_hilang',TRUE),
	    );

            $this->Tb_stok_model->update($this->input->post('id_barang', TRUE), $data);
            $this->My_model->dataLog('Update data Stok');
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_stok'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_stok_model->get_by_id($id);

        if ($row) {
            $this->Tb_stok_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_stok'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_stok'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required|numeric');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_stok.xlsx";
        $judul = "tb_stok";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        // penulisan header
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
        xlsWriteLabel($tablehead, $kolomhead++, "Kategori Barang");
        xlsWriteLabel($tablehead, $kolomhead++, "Harga beli");
        xlsWriteLabel($tablehead, $kolomhead++, "Harga jual");
        xlsWriteLabel($tablehead, $kolomhead++, "Stok");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Baik");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Rusak");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Hilang");
        xlsWriteLabel($tablehead, $kolomhead++, "Minimal Stok");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Unit");

        $this->db->join('tb_barang tb','tb.id_barang = tb_stok.id_barang');
        $this->db->join('tb_satuan st','st.id_satuan = tb.satuan');
        $this->db->join('tb_kategori k','tb.kategori = k.id_kategori');
        $this->db->join('tb_brand br','tb.brand = br.id_brand');
        $this->db->join('tb_unit u','u.id_unit = tb.unit_id');
        $tb_stok = $this->db->get('tb_stok')->result();
        foreach ($tb_stok as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	        xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	        xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
	        xlsWriteNumber($tablebody, $kolombody++, $data->harga_beli);
	        xlsWriteNumber($tablebody, $kolombody++, $data->harga_jual);
	        xlsWriteNumber($tablebody, $kolombody++, $data->stok);
	        xlsWriteNumber($tablebody, $kolombody++, $data->jml_baik);
	        xlsWriteNumber($tablebody, $kolombody++, $data->jml_rusak);
	        xlsWriteNumber($tablebody, $kolombody++, $data->jml_hilang);
	        xlsWriteNumber($tablebody, $kolombody++, $data->min_stok);
	        xlsWriteLabel($tablebody, $kolombody++, $data->nama_unit);

	        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_stok.doc");

        $data = array(
            'tb_stok_data' => $this->Tb_stok_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_stok_doc',$data);
    }

    public function pdf()
    {
        $this->db->join('tb_barang tb','tb.id_barang = tb_stok.id_barang');
        $this->db->join('tb_satuan st','st.id_satuan = tb.satuan');
        $this->db->join('tb_kategori k','tb.kategori = k.id_kategori');
        $this->db->join('tb_brand br','tb.brand = br.id_brand');
        $this->db->join('tb_unit u','u.id_unit = tb.unit_id');
        $tb_stok = $this->db->get('tb_stok')->result();
        $data = array(
            'tb_stok_data' => $tb_stok,
            'start' => 0
        );
        $mpdf = new \Mpdf\Mpdf(['tempDir' => '/tmp','format' => 'A4-P','orientation' => 'L']);
		$html = $this->load->view('stok/tb_stok_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
        
        $this->load->view('stok/tb_stok_pdf',$data);
    }

    public function tes(){
                $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang');
                $this->db->join('tb_satuan s','tb_barang.satuan = s.id_satuan');
                $this->db->join('tb_kategori k','tb_barang.kategori = k.id_kategori');
                $this->db->join('tb_brand b','tb_barang.brand = b.id_brand');
        $data = $this->db->get('tb_barang');

        print_r($data->result());
    }

    function excelphp(){
        $idta = $this->db->get_where('tb_tahunajar',['id_unit' => $this->session->userdata('id_lembaga'),'status' => 'active'])->row()->id_tahunajar;
        $this->db->join('tb_detail_proker dp','dp.proker_id = tb_proker.id_proker');
        $this->db->join('tb_belanja b','b.proker_id_b = dp.proker_id','left');
        $this->db->group_by('id_proker');
        $data_proker = $this->db->select('tb_proker.id_proker,dp.*,tb_proker.*,sum(jumlah) as Jml,sum(bos) as Bos, sum(yysn) as Yysn,sum(sponsorship) as Spon')->get_where('tb_proker',['nama_unit' => $this->session->userdata('id_lembaga'),'idtahunajar' => $idta])->result();
        
        $this->db->join('tb_proker r','r.id_proker = tb_belanja.proker_id_b');
        $sumAngg = $this->db->select('sum(jumlah) as jml')->get_where('tb_belanja',['nama_unit' =>$this->session->userdata('id_lembaga'),'idtahunajar' => $idta])->row()->jml;
        
        $this->db->join('tb_proker r','r.id_proker = tb_belanja.proker_id_b');
        $sumBos = $this->db->select('sum(bos) as jml')->get_where('tb_belanja',['nama_unit' =>$this->session->userdata('id_lembaga'),'idtahunajar' => $idta])->row()->jml;
        
        $this->db->join('tb_proker r','r.id_proker = tb_belanja.proker_id_b');
        $sumYysn = $this->db->select('sum(yysn) as jml')->get_where('tb_belanja',['nama_unit' =>$this->session->userdata('id_lembaga'),'idtahunajar' => $idta])->row()->jml;

        $this->db->join('tb_proker r','r.id_proker = tb_belanja.proker_id_b');
        $sumSpon = $this->db->select('sum(sponsorship) as jml')->get_where('tb_belanja',['nama_unit' =>$this->session->userdata('id_lembaga'),'idtahunajar' => $idta])->row()->jml;

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

        $col = 6+count($data_proker);
        $colBody = $col - 1;
        $sheet->mergeCells('A'.$col.':P'.$col);
        $sheet->getStyle('A'.$col.':T'.$col)->applyFromArray($styleTh);
        $sheet->setCellValue('A'.$col, 'TOTAL');
        $sheet->setCellValue('Q'.$col, xrupiah($sumAngg));
        $sheet->setCellValue('R'.$col, xrupiah($sumBos));
        $sheet->setCellValue('S'.$col, xrupiah($sumYysn));
        $sheet->setCellValue('T'.$col, xrupiah($sumSpon));

        //Merge Cell Judul
        $sheet->mergeCells('A1:T1');
        $sheet->mergeCells('A2:T2');
        $sheet->mergeCells('A3:T3');
        $sheet->getStyle('A1:T1')->applyFromArray($styleJudul);
        $sheet->getStyle('A2:T2')->applyFromArray($styleJudul);
        $sheet->getStyle('A3:T3')->applyFromArray($styleJudul);

        //Merge Cell Header
        $sheet->mergeCells('A4:A5');
        $sheet->mergeCells('B4:B5');
        $sheet->mergeCells('C4:C5');
        $sheet->mergeCells('D4:D5');
        $sheet->mergeCells('E4:P4');
        $sheet->mergeCells('Q4:Q5');
        $sheet->mergeCells('R4:T4');

        //bgColor
        $sheet->getStyle('A4:T5')->applyFromArray($styleTh);
        $sheet->getStyle('A6:T'.$colBody)->applyFromArray($styleTbody);
        
        //Judul Laporan
        $sheet->setCellValue('A1', 'Ledger Program Kerja '.$this->app_model->nama_lembaga($this->session->userdata('id_lembaga')));
        $sheet->setCellValue('A2', 'Tahun Ajar '.@$this->app_model->ta_aktif());

        //Header Table
        $sheet->setCellValue('A4', 'NO');
        $sheet->setCellValue('B4', 'NAMA PROKER');
        $sheet->setCellValue('C4', 'NAMA KEGIATAN');
        $sheet->setCellValue('D4', 'PJ / KETUA PANITIA');
        $sheet->setCellValue('E4', 'WAKTU PELAKSANAAN**');
        $sheet->setCellValue('Q4', 'TOTAL ANGGARAN');
        $sheet->setCellValue('R4', 'SUMBER DANA');
        $sheet->setCellValue('R5', 'BOS');
        $sheet->setCellValue('S5', 'YAYASAN');
        $sheet->setCellValue('T5', 'SPONSORSHIP');

        //Header Bulan Table
        $sheet->setCellValue('E5', medium_bulan(7));
        $sheet->setCellValue('F5', medium_bulan(8));
        $sheet->setCellValue('G5', medium_bulan(9));
        $sheet->setCellValue('H5', medium_bulan(10));
        $sheet->setCellValue('I5', medium_bulan(11));
        $sheet->setCellValue('J5', medium_bulan(12));
        $sheet->setCellValue('K5', medium_bulan(1));
        $sheet->setCellValue('L5', medium_bulan(2));
        $sheet->setCellValue('M5', medium_bulan(3));
        $sheet->setCellValue('N5', medium_bulan(4));
        $sheet->setCellValue('O5', medium_bulan(5));
        $sheet->setCellValue('P5', medium_bulan(6));

        $range = range("A", "T");
        foreach($range as $r){
            $sheet->getColumnDimension($r)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Rekap Program Kerja '.$this->app_model->nama_lembaga($this->session->userdata('id_lembaga'));
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

/* End of file Tb_stok.php */
/* Location: ./application/controllers/Tb_stok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:34:26 */
/* http://harviacode.com */