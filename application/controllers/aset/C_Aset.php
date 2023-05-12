<?php

class C_ASet extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('general/M_General', 'general');
        $this->load->model('master/M_Master', 'master');
        $this->load->model('aset/M_Aset', 'aset');
        if(!$this->general_library->isNotMenu()){
            redirect('logout');
        };
    }

    public function inputAset(){
        $data['list_kib'] = $this->general->getAllWithOrder('m_kib', 'nama_kib', 'asc');
        $data['list_opd'] = $this->general->getAllWithOrder('m_opd', 'nama_opd', 'asc');
        render('aset/V_InputAset', '', '', $data);
    }

    public function loadFormInputAset($kib){
        $views = '';
        $data['list_jenis_barang'] = $this->aset->getListJenisBarangByIdKib($kib);
        if($kib == 77){ //KIB A
            $views = 'aset/V_InputKibA';
        } else if($kib == 78){ //KIB B
            $views = 'aset/V_InputKibB';
        } else if($kib == 79){ //KIB C
            $views = 'aset/V_InputKibC';
        } else if($kib == 80){ //KIB D
            $views = 'aset/V_InputKibD';
        } else if($kib == 81){ //KIB E
            $views = 'aset/V_InputKibE';
        } else if($kib == 82){ //KIB F
            $views = 'aset/V_InputKibF';
        } else if($kib == 83){ //KIB Aset Lainnya
            $views = 'aset/V_InputKibAsetLainnya';
        }
        
        $this->load->view($views, $data);
    }

    public function insertDataAset(){
        echo json_encode($this->aset->insertDataAset($this->input->post()));
    }

    public function loadListAsetByKib($id_opd = 0, $id_kib){
        if($id_opd == 0){
            $id_opd = $this->general_library->getOpdId();
        }
        $data['result'] = $this->aset->loadListAsetByKib($id_opd, $id_kib);
        $this->load->view('aset/V_ListAset', $data);
    }

    public function deleteDataAset($id, $id_m_kib){
        echo json_encode($this->aset->deleteDataAset($id, $id_m_kib));
    }

    public function loadDataAsetForEdit($id_opd, $id_kib){
        $views = '';
        $data['result'] = $this->aset->loadDataAsetForEdit($id_opd, $id_kib);
        $data['id_m_kib'] = $id_kib;

        switch ($id_kib){
            case 77 : $views = 'aset/V_DetailInputKibA'; break;
            case 78 : $views = 'aset/V_DetailInputKibB'; break;
            case 79 : $views = 'aset/V_DetailInputKibC'; break;
            case 80 : $views = 'aset/V_DetailInputKibD'; break;
            case 81 : $views = 'aset/V_DetailInputKibE'; break;
            case 82 : $views = 'aset/V_DetailInputKibF'; break;
            case 83 : $views = 'aset/V_DetailInputKibAsetLainnya'; break;
        }

        $this->load->view($views, $data);
    }

    public function editDataAset($id, $id_kib){
        echo json_encode($this->aset->editDataAset($id, $id_kib));
    }
    
}
