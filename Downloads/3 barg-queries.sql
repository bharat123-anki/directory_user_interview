INSERT INTO `users` (`id`, `first_name`, `father_name`, `last_name`, `email`, `calling_code`, `mobile`, `password`, `status`, `api_token`, `remember_token`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES (NULL, 'Shridhar', NULL, 'Sakharkar', 'shridhar@credenceconsultancy.com', '', '9090909090', '$2y$10$bfCt.v4cH0pMiopqdJ0lO.ndQv/PAfDE5PMX/763H.keszO7iao22', 'Active', NULL, NULL, NULL, CURRENT_TIMESTAMP, NULL, NULL);

INSERT INTO `roles` (`name`, `guard_name`, `allow_delete`) VALUES
('Admin', 'web', '0'),
('Supplier', 'web', '0');

INSERT INTO `model_has_roles` VALUES (1,1,'App\\User');

INSERT IGNORE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,'Users','view_users','web','',''),
(2,'Users','add_users','web','',''),
(3,'Users','edit_users','web','',''),
(4,'Users','delete_users','web','',NULL),
(5,'Roles','view_roles','web','',''),
(6,'Roles','add_roles','web','',''),
(7,'Roles','edit_roles','web','',''),
(8,'Roles','delete_roles','web','',NULL),
(9,'Company','add_company','web','',''),
(10,'Company','edit_company','web','',''),
(11,'Product','add_product','web','',''),
(12,'Product','edit_product','web','',''),
(13,'Resource','add_resource','web','',''),
(14,'Resource','edit_resource','web','',''),
(15,'Resource','add_resource_permission','web','',''),
(16,'Resource','edit_resource_permission','web','',''),
(18,'Supplier','edit_supplier','web','',''),
(19,'Supplier','add_supplier','web','',''),
(20,'Buyer','add_buyer','web','',''),
(21,'Buyer','edit_buyer','web','',''),
(22,'Requisition','edit_requisition','web','',''),
(23,'Requisition','add_requisition','web','',''),
(25,'Requisition','delete_requisition','web','','');

INSERT IGNORE INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(18,1),(19,1),(20,1),(21,1),(22,1),
(23,1),(25,1);


