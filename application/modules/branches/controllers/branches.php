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
 * Class Branches
 */
class branches extends Admin_Controller
{
    /**
     * Branches constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mdl_branches');
    }

    /**
     * @param int $page
     */
    public function index($page = 0)
    {
        $this->mdl_branches->paginate(site_url('branches/index'), $page);
        $branches = $this->mdl_branches->result();

        $this->layout->set('branches', $branches);
        $this->layout->buffer('content', 'branches/index');
        $this->layout->render();
    }

    /**
     * @param null $id
     */
    public function form($id = null)
    {
        if ($this->input->post('btn_cancel')) {
            redirect('branches');
        }

        if ($this->input->post('is_update') == 0 && $this->input->post('branch_name') != '') {
            $check = $this->db->get_where('ip_branches', array('branch_name' => $this->input->post('branch_name')))->result();
            if (!empty($check)) {
                $this->session->set_flashdata('alert_error', trans('branch_already_exists'));
                redirect('branches/form');
            }
        }

        if ($this->mdl_branches->run_validation()) {
            $this->mdl_branches->save($id);
            redirect('branches');
        }

        if ($id and !$this->input->post('btn_submit')) {
            if (!$this->mdl_branches->prep_form($id)) {
                show_404();
            }
            $this->mdl_branches->set_form_value('is_update', true);
        }

        $this->layout->buffer('content', 'branches/form');
        $this->layout->render();
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->mdl_branches->delete($id);
        redirect('branches');
    }

}
