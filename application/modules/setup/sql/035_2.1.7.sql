-- Turn off strict zero date check
SET SESSION sql_mode = REPLACE(@@sql_mode, 'NO_ZERO_DATE', '');

UPDATE ip_clients SET client_birthdate = NULL WHERE client_birthdate = '0000-00-00';

ALTER TABLE `ip_clients` 
ADD COLUMN `client_contact_name` VARCHAR(255) NULL AFTER `client_gender`,
ADD COLUMN `client_cc_emails` VARCHAR(255) NULL AFTER `client_contact_name`,
ADD COLUMN `client_ref` VARCHAR(100) NULL AFTER `client_cc_emails`;