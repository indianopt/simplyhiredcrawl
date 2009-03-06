ALTER TABLE `jobs` ADD `alias` VARCHAR( 128 ) NOT NULL AFTER `name`;
ALTER TABLE `job_categories` ADD `is_crawl_daily_completed` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `is_crawl_completed` ;
ALTER TABLE `job_categories` ADD `daily_next_url` VARCHAR( 128 ) NOT NULL AFTER `is_crawl_completed` ;
--------------------------------------------------------------------------------------------------------
ALTER TABLE `jobs` CHANGE `url` `url` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
--------------------------------------------------------------------------------------------------------
ALTER TABLE `job_categories` ADD `deep` TINYINT( 4 ) NOT NULL ;
ALTER TABLE `job_categories` CHANGE `deep` `deep` TINYINT( 4 ) NOT NULL DEFAULT '0' ;