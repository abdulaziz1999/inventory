<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class My_model extends CI_Model{

    function cek_login($u,$p){
        $pwd = md5($p);
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('username',$u);
        $this->db->where('password',$pwd);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows()==1) {
        	return $query->result();
        }else{
        	return false;
        }
        
    }

    function laporan_rev($s,$e){
                $this->db->select('*');
                $this->db->from('tb_barang b');
                $this->db->join('tb_receiving_item r','b.id_barang = r.id_barang');
                $this->db->join('tb_receiving r2','r.id_receiving = r2.id_receiving');
                $this->db->join('tb_stok st','b.id_barang = st.id_barang');
                $this->db->join('tb_satuan s','b.satuan = s.id_satuan');
                $this->db->join('tb_kategori k','b.kategori = k.id_kategori');
                $this->db->join('tb_brand br','b.brand = br.id_brand');
                $this->db->where('tgl >=', $s);
                $this->db->where('tgl <=', $e);
        $data = $this->db->get()->result();
        return $data; 
    }

    function laporan_iss($s,$e){
                $this->db->select('*');
                $this->db->from('tb_barang b');
                $this->db->join('tb_issuing_item r','b.id_barang = r.id_barang');
                $this->db->join('tb_issuing r2','r.id_issuing = r2.id_issuing');
                $this->db->join('tb_stok st','b.id_barang = st.id_barang');
                $this->db->join('tb_satuan s','b.satuan = s.id_satuan');
                $this->db->join('tb_kategori k','b.kategori = k.id_kategori');
                $this->db->join('tb_brand br','b.brand = br.id_brand');
                $this->db->where('tgl >=', $s);
                $this->db->where('tgl <=', $e);
        $data = $this->db->get()->result();
        return $data; 
        }

        
}
