<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Mdl_Client_Transactions
 */
class Mdl_Client_Transactions extends Response_Model
{
//    public $table = 'ip_invoices'; // Must be public as required by MY_Model/Response_Model
//    public $primary_key = 'client_id';

    public function get_client_transactions($client_id)
    {
        $todaysDate = date('Y-m-d');
        $lastDaySixMonthsAgo = date('Y-m-t', strtotime('-6 months', strtotime($todaysDate)));

        // Transactions before six months (for balance calculation)
        $query = "
            SELECT client_id, itemdate, transaction, transaction_number, amount, transorder FROM (
                SELECT 
                    ip_invoices.client_id, 
                    ip_invoices.invoice_date_created AS itemdate, 
                    'invoice' AS transaction, 
                    ip_invoices.invoice_number AS transaction_number, 
                    IFNULL(ip_invoice_amounts.invoice_total, '0.00') AS amount, 
                    1 AS transorder 
                FROM ip_invoices 
                LEFT JOIN ip_invoice_amounts ON ip_invoice_amounts.invoice_id = ip_invoices.invoice_id 

                UNION ALL 

                SELECT 
                    ip_invoices.client_id, 
                    ip_payments.payment_date AS itemdate, 
                    'payment' AS transaction, 
                    ip_invoices.invoice_number AS transaction_number, 
                    IFNULL(ip_payments.payment_amount, '0.00') AS amount, 
                    2 AS transorder 
                FROM ip_payments 
                LEFT JOIN ip_invoices ON ip_payments.invoice_id = ip_invoices.invoice_id
            ) as transactions
        ";
        $querywhere = " WHERE client_id = ? AND itemdate <= ?";

        $oldTransactions = $this->db->query($query . $querywhere, [$client_id, $lastDaySixMonthsAgo])->result();

        // Calculate balance brought forward
        $balanceBroughtForward = 0;
        foreach ($oldTransactions as $transaction) {
            if ($transaction->transaction === 'invoice') {
                $balanceBroughtForward += $transaction->amount;
            } else {
                $balanceBroughtForward -= $transaction->amount;
            }
        }

        $querywhere = " WHERE client_id = ? AND itemdate > ?";
        // Transactions in the last six months
        $recentTransactions = $this->db->query($query . $querywhere, [$client_id, $lastDaySixMonthsAgo])->result();

        return [
            'balanceBroughtForward' => $balanceBroughtForward,
            'recentTransactions'    => $recentTransactions,
            'lastDaySixMonthsAgo'   => $lastDaySixMonthsAgo,
        ];
    }
}