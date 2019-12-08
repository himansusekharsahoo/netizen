<?php

/**
 * Book_assign_log Class File
 * PHP Version 7.1.1
 * 
 * @category   Library
 * @package    Library
 * @subpackage Book_assign_log
 * @class      Book_assign_log
 * @desc    
 * @author     HimansuS <himansu.php@gmail.com>                
 * @license    
 * @link       
 * @since   11/08/2018
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Book_assign_log Class
 * 
 * @category   Library
 * @package    Library
 * @class      Book_assign_log
 * @desc    
 * @author     HimansuS                  
 * @since   11/08/2018
 */
class Book_assign_log extends CI_Model {

    /**
     * __construct Method
     * 
     * @param   
     * @desc    
     * @return 
     * @author  HimansuS                  
     * @since   11/08/2018
     */
    public function __construct() {
        parent::__construct();

        $this->load->model('book_ledger');
        $this->layout->layout = 'admin_layout';
        $this->layout->layoutsFolder = 'layouts/admin';
        $this->layout->lMmenuFlag = 1;
        $this->layout->rightControlFlag = 1;
        $this->layout->navTitleFlag = 1;
    }

    /**
     * Get_book_assign_log_datatable Method
     * 
     * @param   $data=null,$export=null,$tableHeading=null,$columns=null
     * @desc    
     * @return 
     * @author  HimansuS                  
     * @since   11/08/2018
     */
    public function get_book_assign_log_datatable($data = null, $export = null, $tableHeading = null, $columns = null) {
        $this->load->library('datatables');
        if (!$columns) {
            $columns = 'bassign_id,bledger_id,member_id,user_type,issue_date,due_date,return_date,return_delay_fine,book_return_condition,book_lost_fine,remarks,created,created_by';
        }

        /*
          Table:-	book_ledgers
          Columns:-	bledger_id,book_id,bcategory_id,bpublication_id,bauthor_id,blocation_id,page,mrp,isbn_no,edition,bar_code,qr_code,created,created_by,modified,midified_by

         */
        $this->datatables->select('SQL_CALC_FOUND_ROWS ' . $columns, FALSE, FALSE)->from('book_assign_logs t1');

        $this->datatables->unset_column("bassign_id");
        if (isset($data['button_set'])):
            $this->datatables->add_column("Action", $data['button_set'], 'c_encode(bassign_id)', 1, 1);
        endif;
        if ($export):
            $data = $this->datatables->generate_export($export);
            return $data;
        endif;
        return $this->datatables->generate();
    }

    /**
     * Get_book_assign_log Method
     * 
     * @param   $columns=null,$conditions=null,$limit=null,$offset=null
     * @desc    
     * @return 
     * @author  HimansuS                  
     * @since   11/08/2018
     */
    public function get_book_assign_log($columns = null, $conditions = null, $limit = null, $offset = null) {
        if (!$columns) {
            $columns = 'bassign_id,bledger_id,member_id,user_type,issue_date,due_date,return_date,return_delay_fine,book_return_condition,book_lost_fine,remarks,created,created_by';
        }

        /*
          Table:-	book_ledgers
          Columns:-	bledger_id,book_id,bcategory_id,bpublication_id,bauthor_id,blocation_id,page,mrp,isbn_no,edition,bar_code,qr_code,created,created_by,modified,midified_by

         */
        $this->db->select($columns)->from('book_assign_logs t1');

        if ($conditions && is_array($conditions)):
            foreach ($conditions as $col => $val):
                $this->db->where($col, $val);
            endforeach;
        endif;
        if ($limit > 0):
            $this->db->limit($limit, $offset);

        endif;
        $result = $this->db->get()->result_array();

        return $result;
    }

    /**
     * Save Method
     * 
     * @param   $data
     * @desc    
     * @return 
     * @author  HimansuS                  
     * @since   11/08/2018
     */
    public function save($data) {
        if ($data):
            $this->db->insert("book_assign_logs", $data);
            $bassign_id_inserted_id = $this->db->insert_id();

            if ($bassign_id_inserted_id):
                return $bassign_id_inserted_id;
            endif;
            return 'No data found to store!';
        endif;
        return 'Unable to store the data, please try again later!';
    }

    /**
     * Update Method
     * 
     * @param   $data
     * @desc    
     * @return 
     * @author  HimansuS                  
     * @since   11/08/2018
     */
    public function update($data) {
        if ($data):
            $this->db->where("bassign_id", $data['bassign_id']);
            return $this->db->update('book_assign_logs', $data);
        endif;
        return 'Unable to update the data, please try again later!';
    }

    /**
     * Delete Method
     * 
     * @param   $bassign_id
     * @desc    
     * @return 
     * @author  HimansuS                  
     * @since   11/08/2018
     */
    public function delete($bassign_id) {
        if ($bassign_id):
            $this->db->trans_begin();
            $result = 0;
            $this->db->delete('book_assign_logs', array('bassign_id' => $bassign_id));
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }

        endif;
        return 'No data found to delete!';
    }

    /**
     * Get_options Method
     * 
     * @param   $columns,$index=null, $conditions = null
     * @desc    
     * @return 
     * @author  HimansuS                  
     * @since   11/08/2018
     */
    public function get_options($columns, $index = null, $conditions = null) {
        if (!$columns) {
            $columns = 'bassign_id';
        }
        if (!$index) {
            $index = 'bassign_id';
        }
        $this->db->select("$columns,$index")->from('book_assign_logs t1');

        if ($conditions && is_array($conditions)):
            foreach ($conditions as $col => $val):
                $this->db->where("$col", $val);

            endforeach;
        endif;
        $result = $this->db->get()->result_array();

        $list = array();
        $list[''] = 'Select book assign logs';
        foreach ($result as $key => $val):
            $list[$val[$index]] = $val[$columns];
        endforeach;
        return $list;
    }

    /**
     * Get_book_ledgers_options Method
     * 
     * @param   $columns,$index=null, $conditions = null
     * @desc    
     * @return 
     * @author  HimansuS                  
     * @since   11/08/2018
     */
    public function get_book_ledgers_options($columns, $index = null, $conditions = null) {
        return $this->book_ledger->get_options($columns, $index, $conditions);
    }

    public function record_count() {
        return $this->db->count_all('book_assign_logs');
    }

}

?>