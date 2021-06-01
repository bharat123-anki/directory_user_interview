CREATE TABLE `users` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `first_name` varchar(100) NOT NULL,
 `father_name` varchar(100) DEFAULT NULL,
 `last_name` varchar(100) DEFAULT NULL,
 `email` varchar(100) NOT NULL,
 `calling_code` varchar(10) NOT NULL,
 `mobile` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL,
 `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
 `api_token` varchar(100) DEFAULT NULL,
 `remember_token` varchar(100) DEFAULT NULL,
 `created_by` int(10) DEFAULT NULL,
 `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
 `updated_by` int(10) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `users_email_unique` (`email`)
);


CREATE TABLE `roles` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 `guard_name` varchar(100) NOT NULL,
 `allow_delete` int(4) NOT NULL DEFAULT '1',
 `created_at` datetime DEFAULT current_timestamp(),
 `updated_at` DATETIME DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `id_UNIQUE` (`id`)
);

CREATE TABLE `permissions` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `permission_category` varchar(150) DEFAULT NULL,
 `name` varchar(100) NOT NULL,
 `guard_name` varchar(100) NOT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` DATETIME DEFAULT NULL,
 PRIMARY KEY (`id`)
);

CREATE TABLE `role_has_permissions` (
 `permission_id` int(10) unsigned NOT NULL,
 `role_id` int(10) unsigned NOT NULL,
 PRIMARY KEY (`permission_id`,`role_id`),
 KEY `role_has_permissions_role_id_foreign` (`role_id`),
 CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
 CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
);

CREATE TABLE `model_has_permissions` (
 `permission_id` int(10) unsigned NOT NULL,
 `model_id` int(10) unsigned NOT NULL COMMENT 'id from users table',
 `model_type` varchar(100) NOT NULL,
 PRIMARY KEY (`permission_id`,`model_id`),
 KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
 CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
);

CREATE TABLE `model_has_roles` (
 `role_id` int(10) unsigned NOT NULL,
 `model_id` int(10) unsigned NOT NULL COMMENT 'id from users table',
 `model_type` varchar(100) NOT NULL,
 PRIMARY KEY (`role_id`,`model_id`),
 KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
 CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
);

CREATE TABLE `config_organizations` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `organization_name` VARCHAR(100) NULL DEFAULT NULL,
 `organization_config` JSON NULL,
 `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
 `created_at` datetime DEFAULT current_timestamp(),
 `updated_at` DATETIME DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE INDEX `organization_name` (`organization_name`)
);

CREATE TABLE `master_pincodes` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `pincode` varchar(10) DEFAULT NULL,
 `city` varchar(50) DEFAULT NULL,
 `state` varchar(50) DEFAULT NULL,
 `district` varchar(50) DEFAULT NULL,
 `status` enum('Active','Inactive') DEFAULT 'Active',
 `created_by` int(10) DEFAULT NULL,
 `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
 `updated_by` int(10) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
);

CREATE TABLE `master_company` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `company_name` varchar(100) DEFAULT NULL,
 `company_code` varchar(20) DEFAULT NULL,
 `description` text,
 `currency` varchar(200) DEFAULT NULL,
 `email_id` varchar(100) DEFAULT NULL,
 `pan_number` varchar(20) DEFAULT NULL,
 `hsn_number` int(10) DEFAULT NULL,
 `cin_number` varchar(20) DEFAULT NULL,
 `gst_number` varchar(20) DEFAULT NULL,
 `phone_number` varchar(20) DEFAULT NULL,
 `pincode` int(10) DEFAULT NULL,
 `address` text NOT NULL,
 `city` varchar(50) DEFAULT NULL,
 `district` varchar(50) DEFAULT NULL,
 `state` varchar(50) DEFAULT NULL,
 `applicable_tax` text NOT NULL,
 `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
 `created_by` int(10) DEFAULT NULL,
 `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
 `updated_by` int(10) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
);

CREATE TABLE `master_currencies` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `currency_code` varchar(20) NOT NULL,
 `currency_name` varchar(80) CHARACTER SET utf8 NOT NULL,
 `created_by` int(11) DEFAULT NULL,
 `created_at` datetime NOT NULL DEFAULT current_timestamp(),
 `update_by` int(11) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
 PRIMARY KEY (`id`)
);

CREATE TABLE `master_products` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `product_name` varchar(150) NOT NULL,
 `part_number` varchar(50) DEFAULT NULL,
 `hsn_code` varchar(50) DEFAULT NULL,
 `unit` varchar(20) DEFAULT NULL,
 `gst_percent` int(11) DEFAULT NULL,
 `description` text,
 `status` enum('Active','Inactive') NOT NULL,
 `product_price` varchar(20) NOT NULL,
 `created_by` int(11) DEFAULT NULL,
 `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
 `updated_by` int(11) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
);

CREATE TABLE `buyer_information` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `company_name` varchar(80) NOT NULL,
 `phone` int(11) NOT NULL,
 `email` varchar(80) NOT NULL,
 `gst_number` varchar(50) NOT NULL,
 `gst_company_address` text,
 `gst_pincode` varchar(50) DEFAULT NULL,
 `gst_city` varchar(50) DEFAULT NULL,
 `gst_district` varchar(50) DEFAULT NULL,
 `gst_state` varchar(50) DEFAULT NULL,
 `status` enum('Active','Inactive') DEFAULT 'Active',
 `delivery_address` text,
 `created_by` int(11) DEFAULT NULL,
 `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
 `updated_by` int(11) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
);

CREATE TABLE `buyer_requisitions` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `company_id` int(11) NOT NULL,
 `buyer_id` int(11) NOT NULL,
 `supplier_id` int(11) NOT NULL,
 `date_issued` datetime NOT NULL,
 `date_wanted` datetime NOT NULL,
 `requisiton_status` enum('Requested','Quotation Received','RFQ Rejected','Approved','Rejected') NOT NULL DEFAULT 'Requested',
 `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
 `created_by` int(11) DEFAULT NULL,
 `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
 `updated_by` int(11) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
);

CREATE TABLE `buyer_requisition_details` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `buyer_requisition_id` int(11) NOT NULL,
 `product_id` int(11) NOT NULL,
 `details` text NOT NULL,
 `quantity` int(11) NOT NULL,
 PRIMARY KEY (`id`)
);

CREATE TABLE `supplier_information` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `company_name` varchar(60) DEFAULT NULL,
 `address` text,
 `gst_number` varchar(30) DEFAULT NULL,
 `bank_account_name` varchar(50) DEFAULT NULL,
 `bank_account_number` int(11) DEFAULT NULL,
 `bank_ifsc` varchar(15) DEFAULT NULL,
 `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
 `created_by` int(11) DEFAULT NULL,
 `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
 `updated_by` int(11) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
);


CREATE TABLE `config_resources` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `parent_id` int(10) NOT NULL DEFAULT 0,
 `name` varchar(100) DEFAULT NULL,
 `menu` varchar(100) DEFAULT NULL,
 `link` varchar(200) DEFAULT NULL,
 `order` int(10) DEFAULT 1,
 `created_by` int(11) DEFAULT NULL,
 `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
 `updated_by` int(11) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
);

CREATE TABLE `config_resource_permissions` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `role_id` int(10) unsigned NOT NULL,
 `resource_id` int(10) NOT NULL,
 `created_by` int(11) DEFAULT NULL,
 `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
 `updated_by` int(11) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `role` (`role_id`),
 KEY `config_resources` (`resource_id`)
);



CREATE TABLE `config_emails` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `company_id` varchar(50) DEFAULT NULL,
 `host` varchar(50) DEFAULT NULL,
 `port` int(4) DEFAULT NULL,
 `secure` enum('TLS','SSL') DEFAULT NULL,
 `username` varchar(50) DEFAULT NULL,
 `password` varchar(50) DEFAULT NULL,
 `from_email` varchar(50) DEFAULT NULL,
 `from_name` varchar(50) DEFAULT NULL,
 `status` enum('Active','Inactive') DEFAULT 'Active',
 `created_by` int(11) DEFAULT NULL,
 `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
 `updated_by` int(11) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
);

CREATE TABLE `master_sms_templates` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `company_id` int(10) DEFAULT NULL,
 `name` varchar(100) NOT NULL,
 `slug` varchar(100) NOT NULL,
 `content` varchar(200) NOT NULL,
 `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
 `created_by` int(10) DEFAULT NULL,
 `created_at` datetime DEFAULT current_timestamp(),
 `updated_by` int(10) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `company_id` (`company_id`,`name`,`slug`) USING BTREE
);

CREATE TABLE `master_email_templates` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `company_id` int(10) NOT NULL,
 `name` varchar(100) NOT NULL,
 `slug` varchar(100) NOT NULL,
 `subject` varchar(100) NOT NULL,
 `content` longtext NOT NULL,
 `email_cc` TEXT NULL DEFAULT NULL,
 `email_bcc` TEXT NULL DEFAULT NULL,
 `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
 `created_by` int(10) DEFAULT NULL,
 `created_at` datetime DEFAULT current_timestamp(),
 `updated_by` int(10) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `company_id` (`company_id`,`name`,`slug`) USING BTREE
);

CREATE TABLE `password_resets` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `email` varchar(100) NOT NULL,
 `token` varchar(100) NOT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
);

