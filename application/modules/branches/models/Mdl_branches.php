<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2018 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */

/**
 * Class mdl_Branches
 */
class Mdl_branches extends Response_Model
{
    public $table = 'ip_branches';
    public $primary_key = 'ip_branches.branch_id';

    public function default_select()
    {
        $this->db->select('SQL_CALC_FOUND_ROWS *', false);
    }

    public function order_by()
    {
        $this->db->order_by('ip_branches.branch_name');
    }

    /**
     * @return array
     */
    public function validation_rules()
    {
        return array(
            'branch_name' => array(
                'field' => 'branch_name',
                'label' => trans('branch'),
                'rules' => 'required'
            )
        );
    }

}
