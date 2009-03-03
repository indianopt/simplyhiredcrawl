ALTER TABLE `jobs` ADD `alias` VARCHAR( 128 ) NOT NULL AFTER `name`;
ALTER TABLE `job_categories` ADD `is_crawl_daily_completed` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `is_crawl_completed` ;
ALTER TABLE `job_categories` ADD `daily_next_url` VARCHAR( 128 ) NOT NULL AFTER `is_crawl_completed` ;