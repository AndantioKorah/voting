<?php
	class M_Aset extends CI_Model
	{
		public function __construct()
        {
            parent::__construct();
            $this->db = $this->load->database('main', true);
        }

        public function insert($tablename, $data){
            $this->db->insert($tablename, $data);
        }

        public function getListJenisBarangByIdKib($id){
            return $this->db->select('*')
                        ->from('m_jenis_barang')
                        ->where('id_m_kib', $id)
                        ->where('flag_active', 1)
                        ->order_by('nama_jenis_barang')
                        ->get()->result_array();
        }

        public function insertDataAset($data){
            $rs['code'] = 0;
            $rs['message'] = 'OK';

            $this->db->trans_begin();

            $explode = explode(';', $data['id_m_jenis_barang']);
            $data['id_m_jenis_barang'] = $explode[0];

            if(isset($data['harga'])){
                $data['harga'] = clearString($data['harga']);
            }

            if(isset($data['luas'])){
                $data['luas'] = clearString($data['luas']);
            }
            
            $data['created_by'] = $this->general_library->getId();

            $table_name = null;
            switch($data['id_m_kib']){
                case 77 : $table_name = 't_kib_a'; break;
                case 78 : $table_name = 't_kib_b'; break;
                case 79 : $table_name = 't_kib_c'; break;
                case 80 : $table_name = 't_kib_d'; break;
                case 81 : $table_name = 't_kib_e'; break;
                case 82 : $table_name = 't_kib_f'; break;
                case 83 : $table_name = 't_kib_aset_lainnya'; break;
                default : $table_name = null;
            }
            unset($data['id_m_kib']);

            if($table_name){
                $this->db->insert($table_name, $data);
            } else {
                $rs['code'] = 1;
                $rs['message'] = 'Terjadi Kesalahan';
            }

            if($this->db->trans_status() == FALSE){
                $this->db->trans_rollback();
                $rs['code'] = 1;
                $rs['message'] = 'Terjadi Kesalahan';
            } else {
                $this->db->trans_commit();
            }

            return $rs;
        }

        public function loadListAsetByKib($id_opd, $id_kib){
            $table_name = '';
            switch($id_kib){
                case 77 : $table_name = 't_kib_a'; break;
                case 78 : $table_name = 't_kib_b'; break;
                case 79 : $table_name = 't_kib_c'; break;
                case 80 : $table_name = 't_kib_d'; break;
                case 81 : $table_name = 't_kib_e'; break;
                case 82 : $table_name = 't_kib_f'; break;
                case 83 : $table_name = 't_kib_aset_lainnya'; break;
                default : $table_name = null;
            }

            return $this->db->select('c.nama_jenis_barang, b.nama_opd, a.*, c.kode_barang')
                            ->from($table_name.' a')
                            ->join('m_opd b', 'a.id_m_opd = b.id')
                            ->join('m_jenis_barang c', 'a.id_m_jenis_barang = c.id')
                            ->where('a.flag_active', 1)
                            ->where('a.id_m_opd', $id_opd)
                            ->order_by('a.created_date', 'desc')
                            ->get()->result_array();
        }

        public function deleteDataAset($id, $id_m_kib){
            $table_name = '';
            switch($id_m_kib){
                case 77 : $table_name = 't_kib_a'; break;
                case 78 : $table_name = 't_kib_b'; break;
                case 79 : $table_name = 't_kib_c'; break;
                case 80 : $table_name = 't_kib_d'; break;
                case 81 : $table_name = 't_kib_e'; break;
                case 82 : $table_name = 't_kib_f'; break;
                case 83 : $table_name = 't_kib_aset_lainnya'; break;
                default : $table_name = null;
            }
            $this->db->where('id', $id)
                    ->update($table_name, 
                    [
                        'flag_active' => 0,
                        'updated_by' => $this->general_library->getId()
                    ]);
        }

        public function loadDataAsetForEdit($id, $id_m_kib){
            $table_name = '';
            switch($id_m_kib){
                case 77 : $table_name = 't_kib_a'; break;
                case 78 : $table_name = 't_kib_b'; break;
                case 79 : $table_name = 't_kib_c'; break;
                case 80 : $table_name = 't_kib_d'; break;
                case 81 : $table_name = 't_kib_e'; break;
                case 82 : $table_name = 't_kib_f'; break;
                case 83 : $table_name = 't_kib_aset_lainnya'; break;
                default : $table_name = null;
            }

            return $this->db->select('a.*, c.nama_jenis_barang, b.nama_opd, c.kode_barang')
                            ->from($table_name.' a')
                            ->join('m_opd b', 'a.id_m_opd = b.id')
                            ->join('m_jenis_barang c', 'a.id_m_jenis_barang = c.id')
                            ->where('a.flag_active', 1)
                            ->where('a.id', $id)
                            ->get()->row_array();

        }

        public function editDataAset($id, $id_kib){
            $table_name = '';
            switch($id_kib){
                case 77 : $table_name = 't_kib_a'; break;
                case 78 : $table_name = 't_kib_b'; break;
                case 79 : $table_name = 't_kib_c'; break;
                case 80 : $table_name = 't_kib_d'; break;
                case 81 : $table_name = 't_kib_e'; break;
                case 82 : $table_name = 't_kib_f'; break;
                case 83 : $table_name = 't_kib_aset_lainnya'; break;
                default : $table_name = null;
            }

            $data = $this->input->post();
            $data['updated_by'] = $this->general_library->getId();

            if(isset($data['harga'])){
                $data['harga'] = clearString($data['harga']);
            }

            if(isset($data['luas'])){
                $data['luas'] = clearString($data['luas']);
            }

            $this->db->where('id', $id)
                    ->update($table_name, $data);
        }
        
	}   
?>