<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_receiving_model extends CI_Model
{

    public $table = 'tb_receiving';
    public $id = 'id_receiving';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $idcutoff = $this->db->get_where('tb_cutoff',['status' => '1'])->row()->id_cutoff;
        $this->db->order_by($this->id, $this->order);
        return $this->db->get_where($this->table,['idcutoff' => $idcutoff])->result();
    }

    function get_cutoff($idc)
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get_where($this->table,['idcutoff' => $idc])->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_receiving', $q);
        $this->db->or_like('tgl', $q);
        $this->db->or_like('no_ref', $q);
        $this->db->or_like('supplier', $q);
        $this->db->or_like('remarks', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_receiving', $q);
        $this->db->or_like('tgl', $q);
        $this->db->or_like('no_ref', $q);
        $this->db->or_like('supplier', $q);
        $this->db->or_like('remarks', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_sup($uri){ 
                $this->db->select('*,sum(jumlah) as jml');
                $this->db->from('tb_barang b');
                $this->db->join('tb_receiving_item r','b.id_barang = r.id_barang');
                $this->db->join('tb_receiving r2','r.id_receiving = r2.id_receiving');
                $this->db->join('tb_stok st','b.id_barang = st.id_barang');
                $this->db->join('tb_satuan s','b.satuan = s.id_satuan');
                $this->db->join('tb_kategori k','b.kategori = k.id_kategori');
                $this->db->join('tb_brand br','b.brand = br.id_brand');
                $this->db->join('tb_suplier sup','sup.id_suplier = r2.supplier');
                $this->db->join('tb_pemesan pms','pms.id_pemesan = r2.remarks');
                $this->db->group_by('nama_barang');
                $this->db->where(['r2.id_receiving' => $uri]);
        $data = $this->db->get();
        return $data;
    }

}

/* End of file Tb_receiving_model.php */
/* Location: ./application/models/Tb_receiving_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 05:18:36 */
/* http://harviacode.com */