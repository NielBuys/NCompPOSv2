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
 * Class Mdl_Client_Notes
 */
class Mdl_Client_Transactions extends Response_Model
{
    public function get_client_transactions($client_id)
    {
        $query = $this->db->query("
            select * from (
                select ip_invoices.client_id, 
                    invoice_date_created as itemdate, 
                    'invoice' as transaction, 
                    invoice_number as transaction_number, 
                    IFnull(ip_invoice_amounts.invoice_total, '0.00') AS amount, 
                    1 as transorder
                from ip_invoices
                left join ip_invoice_amounts on ip_invoice_amounts.invoice_id = ip_invoices.invoice_id
                union all
                select ip_invoices.client_id, 
                    payment_date as itemdate, 
                    'payment' as transaction, 
                    ip_invoices.invoice_number as transaction_number,
                    IFnull(ip_payments.payment_amount, '0.00') AS amount, 
                    2 as transorder
                from ip_payments
                left join ip_invoices on ip_invoices.invoice_id = ip_payments.invoice_id
            ) as transactions
            where client_id = " . $this->db->escape($client_id) . "
            order by itemdate,transorder
        ");

        return $query->result();
    }


}
