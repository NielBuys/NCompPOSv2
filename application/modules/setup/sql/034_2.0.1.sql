update ip_invoices_recurring set recur_end_date = '1970-01-01' where not recur_end_date > '1970-01-01';
ALTER TABLE `ip_invoices_recurring`
CHANGE COLUMN `recur_end_date` `recur_end_date` DATE NULL ;
update ip_invoices_recurring set recur_end_date = null where recur_end_date = '1970-01-01';

update ip_invoices_recurring set recur_next_date = '1970-01-01' where not recur_next_date > '1970-01-01';
ALTER TABLE `ip_invoices_recurring`
CHANGE COLUMN `recur_next_date` `recur_next_date` DATE NULL ;
update ip_invoices_recurring set recur_next_date = null where recur_next_date = '1970-01-01';
