<?php

class M_opentrip extends CI_Model {


    public function getTransaksi($id){
        $query = $this->db->query("SELECT
                                        * 
                                    FROM
                                        tbl_detail_transaksi
                                    INNER JOIN tbl_transaksi ON tbl_transaksi.transaksi_id = tbl_detail_transaksi.id_transaksi
                                    INNER JOIN tbl_opentrip ON tbl_opentrip.opentrip_id = tbl_detail_transaksi.id_opentrip
                                    INNER JOIN tbl_jadwal ON tbl_jadwal.jadwal_id = tbl_detail_transaksi.id_jadwal

                                    WHERE
                                        id_transaksi = '".$id."'");
        
        return $query->result();
    }
}
