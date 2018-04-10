#update to new default themes
update `ip_settings` set setting_value = 'default' 
where setting_key = 'system_theme';
update `ip_settings` set setting_value = 'Default' 
where setting_key = 'pdf_invoice_template';
update `ip_settings` set setting_value = 'Default - paid' 
where setting_key = 'pdf_invoice_template_paid';
update `ip_settings` set setting_value = 'Default - overdue' 
where setting_key = 'pdf_invoice_template_overdue';
update `ip_settings` set setting_value = 'Default' 
where setting_key = 'pdf_quote_template';
update `ip_settings` set setting_value = 'Default_Web' 
where setting_key = 'public_invoice_template';
update `ip_settings` set setting_value = 'Default_Web' 
where setting_key = 'public_quote_template';