UPDATE `users` SET `user_type` = '1' WHERE `users`.`id` = 30;
ALTER TABLE `users` ADD `user_type` TINYINT NOT NULL DEFAULT '2' AFTER `email`;