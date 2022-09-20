CREATE TABLE `ip_branches` (
  `branch_id` INT NOT NULL AUTO_INCREMENT,
  `branch_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`branch_id`));

insert into ip_branches Values (0,'Main');

ALTER TABLE `ip_invoice_groups` 
ADD COLUMN `invoice_group_branch_id` INT NULL AFTER `invoice_group_left_pad`;
