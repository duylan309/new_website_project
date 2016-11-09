ALTER TABLE `thue_today`.`category` ADD COLUMN `created_at` INT NOT NULL  AFTER `status` , ADD COLUMN `updated_at` INT NULL  AFTER `created_at` , CHANGE COLUMN `parent` `parent_id` BIGINT(11) NULL DEFAULT NULL COMMENT '# parent'  AFTER `category_id` , CHANGE COLUMN `is_single_page` `is_single_page` SMALLINT(6) NOT NULL DEFAULT 0  AFTER `description_en` , CHANGE COLUMN `user_id` `user_id` BIGINT(11) NOT NULL  , CHANGE COLUMN `image` `image` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT 'Image'  , CHANGE COLUMN `title_en` `title_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT 'title_en'  , CHANGE COLUMN `title_vn` `title_vn` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT 'title_vn'  , CHANGE COLUMN `link` `link` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '# link to other page'  , CHANGE COLUMN `sort` `sort` INT(11) NOT NULL DEFAULT 0  , CHANGE COLUMN `status` `status` SMALLINT(6) NOT NULL DEFAULT 1 COMMENT 'status'
, ADD INDEX `user_id` (`user_id` ASC)
, ADD INDEX `status` (`status` ASC) ;

ALTER TABLE `thue_today`.`category` CHANGE COLUMN `parent_id` `parent_id` BIGINT(11) NOT NULL DEFAULT 0 COMMENT '# parent'  ;

ALTER TABLE `thue_today`.`admin_update_day_employer` DROP COLUMN `name` , CHANGE COLUMN `employer_id` `employer_id` INT(11) NOT NULL  AFTER `id` , CHANGE COLUMN `date_update` `created_at` DATE NOT NULL  AFTER `note` , CHANGE COLUMN `admin_update_day_employer_id` `id` INT(11) NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `user_admin_id` `admin_id` INT(11) NOT NULL
, ADD INDEX `employer_id` (`employer_id` ASC)
, ADD INDEX `admin_id` (`admin_id` ASC) , RENAME TO  `thue_today`.`employer_day` ;

ALTER TABLE `thue_today`.`employer_day` CHANGE COLUMN `employer_id` `user_id` INT(11) NOT NULL
, DROP INDEX `employer_id`
, ADD INDEX `user_id` (`user_id` ASC) , RENAME TO  `thue_today`.`user_day` ;

ALTER TABLE `thue_today`.`company` ADD COLUMN `updated_at` INT NULL  AFTER `created_at` , CHANGE COLUMN `category` `category_ids` VARCHAR(50) NOT NULL  AFTER `user_id` , CHANGE COLUMN `website` `website` VARCHAR(100) NULL DEFAULT NULL  AFTER `address` , CHANGE COLUMN `city` `city` INT(11) NULL DEFAULT '0'  AFTER `district` , CHANGE COLUMN `status` `status` SMALLINT(6) NOT NULL DEFAULT 1  AFTER `fb_load_photo` , CHANGE COLUMN `name` `name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL  , CHANGE COLUMN `url` `url` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL  , CHANGE COLUMN `image_banner` `banner` VARCHAR(200) NULL DEFAULT NULL COMMENT '# cover banner'  , CHANGE COLUMN `district_text_vi` `district_text_vi` VARCHAR(50) NULL DEFAULT NULL  , CHANGE COLUMN `district_text_en` `district_text_en` VARCHAR(50) NULL DEFAULT NULL  , CHANGE COLUMN `facebook` `facebook` VARCHAR(150) NULL DEFAULT NULL  , CHANGE COLUMN `created_date` `created_at` INT NOT NULL
, ADD INDEX `user_id` (`user_id` ASC)
, ADD INDEX `category_ids` (`category_ids` ASC)
, ADD INDEX `status` (`status` ASC) ;

ALTER TABLE `thue_today`.`company` CHANGE COLUMN `district` `district_id` INT(11) NULL DEFAULT NULL  , CHANGE COLUMN `city` `city_id` INT(11) NULL DEFAULT NULL
, ADD INDEX `district_id` (`district_id` ASC)
, ADD INDEX `city_id` (`city_id` ASC) ;

ALTER TABLE `thue_today`.`company_location` DROP COLUMN `user_id` , CHANGE COLUMN `company_location_id` `id` BIGINT NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `company_id` `company_id` BIGINT NOT NULL  , CHANGE COLUMN `location_name` `name` VARCHAR(255) NOT NULL  , CHANGE COLUMN `city` `city_id` INT(11) NOT NULL
, ADD INDEX `company_id` (`company_id` ASC)
, ADD INDEX `city_id` (`city_id` ASC) ;

ALTER TABLE `thue_today`.`company_location` CHANGE COLUMN `id` `id` INT NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `company_id` `company_id` INT NOT NULL  ;

ALTER TABLE `thue_today`.`company` CHANGE COLUMN `company_id` `company_id` INT NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `user_id` `user_id` INT NOT NULL  ;

ALTER TABLE `thue_today`.`category` CHANGE COLUMN `category_id` `category_id` INT NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `parent_id` `parent_id` INT NOT NULL DEFAULT '0' COMMENT '# parent'  ;

ALTER TABLE `thue_today`.`contact` CHANGE COLUMN `status` `status` TINYINT NOT NULL DEFAULT 1 COMMENT '# status'  AFTER `message` , CHANGE COLUMN `name` `name` VARCHAR(255) NOT NULL COMMENT '# name'  , CHANGE COLUMN `email` `email` VARCHAR(150) NOT NULL COMMENT '# email'  , CHANGE COLUMN `phone` `phone` VARCHAR(50) NOT NULL COMMENT '# phone number'  , CHANGE COLUMN `created_date` `created_at` INT NOT NULL COMMENT '# created date'  ;

ALTER TABLE `thue_today`.`email_edm` CHANGE COLUMN `status` `status` TINYINT(4) NOT NULL DEFAULT 1  AFTER `note` , CHANGE COLUMN `date_send` `sent_at` DATE NOT NULL  AFTER `status` , CHANGE COLUMN `email_edm_id` `sequence_id` INT(11) NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `created_date` `created_at` INT(11) NOT NULL  ;

ALTER TABLE `thue_today`.`email_edm` CHANGE COLUMN `sequence_id` `id` INT(11) NOT NULL AUTO_INCREMENT  ;

ALTER TABLE `thue_today`.`contact` CHANGE COLUMN `contact_id` `id` INT(11) NOT NULL AUTO_INCREMENT  ;

ALTER TABLE `thue_today`.`email_edm` CHANGE COLUMN `sent_at` `sent_at` INT NOT NULL  ;

ALTER TABLE `thue_today`.`company` CHANGE COLUMN `city_id` `city_id` INT(11) NULL DEFAULT NULL  AFTER `district_text_en` ;

ALTER TABLE `thue_today`.`company_location` ADD COLUMN `district_id` INT NULL DEFAULT NULL  AFTER `address` , CHANGE COLUMN `id` `company_branch_id` INT(11) NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `city_id` `city_id` INT(11) NULL DEFAULT NULL  , CHANGE COLUMN `lat` `lat` FLOAT(10,6) NULL DEFAULT NULL  , CHANGE COLUMN `lng` `lng` FLOAT(10,6) NULL DEFAULT NULL  , RENAME TO  `thue_today`.`company_branch` ;

ALTER TABLE `thue_today`.`company` DROP COLUMN `district_text_en` , DROP COLUMN `district_text_vi` , CHANGE COLUMN `lat` `lat` FLOAT(10,6) NULL DEFAULT NULL  , CHANGE COLUMN `lng` `lng` FLOAT(10,6) NULL DEFAULT NULL  ;

ALTER TABLE `thue_today`.`jobs` ENGINE = InnoDB , DROP COLUMN `lng` , DROP COLUMN `lat` , DROP COLUMN `ad` , ADD COLUMN `updated_at` TIMESTAMP NULL  AFTER `created_at` , CHANGE COLUMN `company_id` `company_id` INT NOT NULL COMMENT 'company id '  AFTER `job_id` , CHANGE COLUMN `location_id` `company_branch_id` INT NOT NULL  AFTER `company_id` , CHANGE COLUMN `category` `category_ids` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'category'  AFTER `name` , CHANGE COLUMN `location` `city_ids` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'location'  AFTER `category_ids` , CHANGE COLUMN `country` `nationality` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL  AFTER `city_ids` , CHANGE COLUMN `language` `languages` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'language'  AFTER `experience` , CHANGE COLUMN `view` `view` INT(11) NULL DEFAULT '0' COMMENT 'view'  AFTER `keyword` , CHANGE COLUMN `sort` `sort` INT(11) NULL DEFAULT '0'  AFTER `view` , CHANGE COLUMN `status` `status` SMALLINT(1) NOT NULL DEFAULT 1 COMMENT 'status'  AFTER `sort` , CHANGE COLUMN `jobs_id` `job_id` INT NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `user_id` `user_id` INT NOT NULL COMMENT 'employer id (table user)'  , CHANGE COLUMN `title` `name` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'job title'  , CHANGE COLUMN `deadline` `expired_at` DATE NOT NULL COMMENT 'deadline '  , CHANGE COLUMN `created_date` `created_at` TIMESTAMP NOT NULL COMMENT 'created_date'
, DROP INDEX `ui`
, ADD INDEX `company_id` (`company_id` ASC)
, ADD INDEX `company_branch_id` (`company_branch_id` ASC)
, ADD INDEX `user_id` (`user_id` ASC)
, ADD INDEX `status` (`status` ASC)
, ADD INDEX `expired_at` (`expired_at` ASC) , RENAME TO  `thue_today`.`job` ;

ALTER TABLE `thue_today`.`email_edm` CHANGE COLUMN `action_click_date` `action_click_date` TIMESTAMP NOT NULL  , CHANGE COLUMN `sent_at` `sent_at` TIMESTAMP NOT NULL  , CHANGE COLUMN `created_at` `created_at` TIMESTAMP NOT NULL  ;

ALTER TABLE `thue_today`.`category` CHANGE COLUMN `created_at` `created_at` TIMESTAMP NOT NULL  , CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT NULL  ;

ALTER TABLE `thue_today`.`company` CHANGE COLUMN `created_at` `created_at` TIMESTAMP NOT NULL  , CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT NULL  ;

ALTER TABLE `thue_today`.`contact` CHANGE COLUMN `created_at` `created_at` TIMESTAMP NOT NULL COMMENT '# created date'  ;

ALTER TABLE `thue_today`.`job` CHANGE COLUMN `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'created_date'  ;

ALTER TABLE `thue_today`.`category` CHANGE COLUMN `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ;

ALTER TABLE `thue_today`.`company` CHANGE COLUMN `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ;

ALTER TABLE `thue_today`.`contact` CHANGE COLUMN `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '# created date'  ;

ALTER TABLE `thue_today`.`email_edm` CHANGE COLUMN `action_click_date` `action_click_date` TIMESTAMP NULL DEFAULT NULL  , CHANGE COLUMN `sent_at` `sent_at` TIMESTAMP NULL DEFAULT NULL  , CHANGE COLUMN `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ;

ALTER TABLE `thue_today`.`jobs_applied` ENGINE = InnoDB , DROP COLUMN `candidate_employer` , CHANGE COLUMN `jobs_id` `job_id` INT NOT NULL COMMENT '# job_id'  AFTER `id` , CHANGE COLUMN `user_id_candiate` `candidate_user_id` INT NOT NULL COMMENT '# candidate_id ( table users )'  AFTER `job_id` , CHANGE COLUMN `user_id_employer` `employer_user_id` INT NOT NULL COMMENT '# employer_id ( table users )'  AFTER `candidate_user_id` , CHANGE COLUMN `jobs_applied_id` `id` INT NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `answer_one` `answer_one` VARCHAR(1500) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '# answer 1'  , CHANGE COLUMN `status` `status` TINYINT NULL DEFAULT 1 COMMENT '# status'  , CHANGE COLUMN `created_date` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '# created_date'
, DROP INDEX `co` , RENAME TO  `thue_today`.`job_applied` ;

ALTER TABLE `thue_today`.`job` CHANGE COLUMN `user_id` `employer_user_id` INT(11) NOT NULL COMMENT 'employer id (table user)'
, DROP INDEX `user_id`
, ADD INDEX `employer_user_id` (`employer_user_id` ASC) ;

ALTER TABLE `thue_today`.`job_applied`
ADD INDEX `job_id` (`job_id` ASC)
, ADD INDEX `candidate_user_id` (`candidate_user_id` ASC)
, ADD INDEX `employer_user_id` (`employer_user_id` ASC)
, ADD INDEX `status` (`status` ASC) ;

ALTER TABLE `thue_today`.`category` CHANGE COLUMN `user_id` `user_id` INT NOT NULL  , CHANGE COLUMN `opp` `type` TINYINT NULL DEFAULT NULL COMMENT '# type of page'  , CHANGE COLUMN `is_single_page` `is_single_page` TINYINT NOT NULL DEFAULT '0'  , CHANGE COLUMN `status` `status` TINYINT NOT NULL DEFAULT '1' COMMENT 'status'  ;

ALTER TABLE `thue_today`.`company` CHANGE COLUMN `size` `size` TINYINT NULL DEFAULT '0'  , CHANGE COLUMN `fb_load_newfeed` `fb_load_newfeed` TINYINT NULL DEFAULT '0' COMMENT '# allow to get newfeed from facebook '  , CHANGE COLUMN `fb_load_photo` `fb_load_photo` TINYINT NULL DEFAULT '0' COMMENT '# allow to get photo from facebook '  , CHANGE COLUMN `status` `status` TINYINT NOT NULL DEFAULT '1'  ;

ALTER TABLE `thue_today`.`job` CHANGE COLUMN `salary` `salary` TINYINT NULL DEFAULT '0' COMMENT 'salary'  , CHANGE COLUMN `salary_negotiable` `salary_negotiable` TINYINT NULL DEFAULT '0' COMMENT 'salary negotiable'  , CHANGE COLUMN `status` `status` TINYINT NOT NULL DEFAULT '1' COMMENT 'status'  ;

ALTER TABLE `thue_today`.`company` CHANGE COLUMN `user_id` `employer_user_id` INT(11) NOT NULL
, DROP INDEX `user_id`
, ADD INDEX `employer_user_id` (`employer_user_id` ASC) ;

ALTER TABLE `thue_today`.`category` CHANGE COLUMN `user_id` `admin_user_id` INT(11) NOT NULL
, DROP INDEX `user_id`
, ADD INDEX `admin_user_id` (`admin_user_id` ASC) ;

ALTER TABLE `thue_today`.`jobs_category` DROP COLUMN `jobs_category_id` , CHANGE COLUMN `jobs_id` `job_id` INT NOT NULL  , CHANGE COLUMN `company_id` `company_id` INT NOT NULL
, DROP PRIMARY KEY
, ADD PRIMARY KEY (`job_id`, `company_id`) , RENAME TO  `thue_today`.`job_company` ;

ALTER TABLE `thue_today`.`job_applied` DROP COLUMN `id`
, DROP PRIMARY KEY
, ADD PRIMARY KEY (`job_id`, `candidate_user_id`, `employer_user_id`)
, DROP INDEX `employer_user_id`
, DROP INDEX `candidate_user_id`
, DROP INDEX `job_id` ;

drop table `thue_today`.`job_company`;

drop table `thue_today`.`jobs_location`;

ALTER TABLE `thue_today`.`job` DROP COLUMN `company_id` , CHANGE COLUMN `employer_user_id` `employer_user_id` INT(11) NOT NULL COMMENT 'employer id (table user)'  AFTER `job_id`
, DROP INDEX `company_id` ;

ALTER TABLE `thue_today`.`job_applied` DROP COLUMN `employer_user_id`
, DROP PRIMARY KEY
, ADD PRIMARY KEY (`job_id`, `candidate_user_id`) ;

ALTER TABLE `thue_today`.`jobs_saved` ENGINE = InnoDB , DROP COLUMN `user_jobs_id` , DROP COLUMN `jobs_saved_id` , CHANGE COLUMN `jobs_id` `job_id` INT NOT NULL COMMENT '#job_id'  FIRST , CHANGE COLUMN `status` `status` TINYINT NULL DEFAULT 1 COMMENT '#status'  AFTER `candidate_user_id` , CHANGE COLUMN `user_id_candidate` `candidate_user_id` INT NOT NULL COMMENT '#candidate_id'  , CHANGE COLUMN `created_date` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '#created_date'
, DROP PRIMARY KEY
, ADD PRIMARY KEY (`job_id`, `candidate_user_id`)
, ADD INDEX `status` (`status` ASC)
, DROP INDEX `co` , RENAME TO  `thue_today`.`job_saved` ;

ALTER TABLE `thue_today`.`messages` DROP COLUMN `employer_status` , DROP COLUMN `user_status` , DROP COLUMN `receiver_id` , DROP COLUMN `sender_id` , CHANGE COLUMN `message_id` `parent_id` INT(11) NULL DEFAULT '0'  AFTER `message_id` , CHANGE COLUMN `important` `important` TINYINT(4) NULL DEFAULT '0'  AFTER `content` , CHANGE COLUMN `status` `status` TINYINT NULL DEFAULT 1 COMMENT '0 : new, 1 : view/ sent , 8 : draf'  AFTER `important` , CHANGE COLUMN `messages_id` `message_id` INT(11) NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `user_id_employer` `employer_user_id` INT(11) NOT NULL  , CHANGE COLUMN `user_id_candidate` `candidate_user_id` INT(11) NOT NULL  , CHANGE COLUMN `message` `content` TEXT NOT NULL  , CHANGE COLUMN `created_date` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  , RENAME TO  `thue_today`.`message` ;

ALTER TABLE `thue_today`.`message`
ADD INDEX `parent_id` (`parent_id` ASC)
, ADD INDEX `company_id` (`company_id` ASC)
, ADD INDEX `employer_user_id` (`employer_user_id` ASC)
, ADD INDEX `candidate_user_id` (`candidate_user_id` ASC)
, ADD INDEX `status` (`status` ASC) ;

ALTER TABLE `thue_today`.`pagehtml` DROP COLUMN `nat` , DROP COLUMN `di` , ADD COLUMN `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  AFTER `status` , CHANGE COLUMN `category_id` `category_id` INT(11) NULL DEFAULT NULL COMMENT '#category_id'  AFTER `static_page_id` , CHANGE COLUMN `location` `company_branch_id` INT(11) NULL DEFAULT '0' COMMENT '#location_id'  AFTER `category_id` , CHANGE COLUMN `jobs_id` `job_ids` VARCHAR(255) NULL DEFAULT NULL  AFTER `company_branch_id` , CHANGE COLUMN `subject` `subject` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL  AFTER `tiitle_en` , CHANGE COLUMN `sort` `sort` INT(11) NULL DEFAULT '0'  AFTER `language` , CHANGE COLUMN `pagehtml_id` `static_page_id` INT NOT NULL AUTO_INCREMENT
, ADD INDEX `category_id` (`category_id` ASC)
, ADD INDEX `company_branch_id` (`company_branch_id` ASC)
, ADD INDEX `status` (`status` ASC) , RENAME TO  `thue_today`.`static_page` ;

ALTER TABLE `thue_today`.`promo` RENAME TO  `thue_today`.`promotion` ;

ALTER TABLE `thue_today`.`promotion` CHANGE COLUMN `service_id` `service_id` INT(11) NOT NULL  AFTER `promotion_id` , CHANGE COLUMN `note` `note` TEXT NULL DEFAULT NULL  AFTER `code` , CHANGE COLUMN `status` `status` TINYINT NULL DEFAULT 1  AFTER `note` , CHANGE COLUMN `promo_id` `promotion_id` INT(11) NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `code` `code` VARCHAR(50) NOT NULL  , CHANGE COLUMN `created` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
, ADD INDEX `service_id` (`service_id` ASC)
, ADD INDEX `status` (`status` ASC) ;

ALTER TABLE `thue_today`.`promo_applied` CHANGE COLUMN `promo_applied_id` `id` INT NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `code` `promotion_id` INT NOT NULL COMMENT '#promotion_code'  , CHANGE COLUMN `user_id` `user_id` INT NOT NULL COMMENT '#user_id'  , CHANGE COLUMN `created_date` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '#created_date'
, ADD INDEX `promotion_id` (`promotion_id` ASC)
, ADD INDEX `user_id` (`user_id` ASC)
, DROP INDEX `pr` , RENAME TO  `thue_today`.`promotion_applied` ;

TRUNCATE TABLE `promotion_applied`;

ALTER TABLE `thue_today`.`promotion_applied` DROP COLUMN `id`
, DROP PRIMARY KEY
, ADD PRIMARY KEY (`promotion_id`, `user_id`)
, DROP INDEX `user_id`
, DROP INDEX `promotion_id` ;

ALTER TABLE `thue_today`.`receive_email` DROP COLUMN `name` , ADD COLUMN `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  AFTER `status` , CHANGE COLUMN `company_id` `company_id` INT(11) NOT NULL  AFTER `id` , CHANGE COLUMN `receive_email_id` `id` INT(11) NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `email` `email` VARCHAR(150) NOT NULL  , CHANGE COLUMN `status` `status` TINYINT(4) NOT NULL DEFAULT 1
, ADD INDEX `company_id` (`company_id` ASC)
, ADD INDEX `user_id` (`user_id` ASC)
, ADD INDEX `status` (`status` ASC) , RENAME TO  `thue_today`.`email_received` ;

ALTER TABLE `thue_today`.`url` ADD COLUMN `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  AFTER `url` , CHANGE COLUMN `pagehtml_id` `static_page_id` INT(11) NULL DEFAULT NULL  AFTER `id` , CHANGE COLUMN `company_id` `company_id` INT NOT NULL COMMENT '#company_id'  AFTER `static_page_id` , CHANGE COLUMN `url_id` `id` INT NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `user_id_company` `employer_user_id` INT NOT NULL COMMENT '#user_id'
, ADD INDEX `static_page_id` (`static_page_id` ASC)
, ADD INDEX `company_id` (`company_id` ASC)
, ADD INDEX `employer_user_id` (`employer_user_id` ASC) , RENAME TO  `thue_today`.`company_url` ;

ALTER TABLE `thue_today`.`email_received` CHANGE COLUMN `user_id` `employer_user_id` INT(11) NOT NULL
, DROP INDEX `user_id`
, ADD INDEX `employer_user_id` (`employer_user_id` ASC) ;

ALTER TABLE `thue_today`.`user` CHANGE COLUMN `created` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ;

ALTER TABLE `thue_today`.`user` ADD COLUMN `updated_at` TIMESTAMP NULL DEFAULT NULL  AFTER `created_at` ,
CHANGE COLUMN `email` `email` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL  AFTER `user_id` ,
CHANGE COLUMN `fbid` `facebook_id` VARCHAR(255) NULL DEFAULT NULL  AFTER `password` ,
CHANGE COLUMN `dob` `birthday` DATE NULL DEFAULT NULL  AFTER `image` ,
CHANGE COLUMN `type` `type` TINYINT NOT NULL  AFTER `signup_by` ,
CHANGE COLUMN `status` `status` TINYINT NOT NULL DEFAULT 1  AFTER `type` ,
CHANGE COLUMN `user_id` `user_id` INT NOT NULL AUTO_INCREMENT  , CHANGE COLUMN `password` `password` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL  , CHANGE COLUMN `fb_email` `facebook_email` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL  , CHANGE COLUMN `name` `name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL  , CHANGE COLUMN `image` `image` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL  , CHANGE COLUMN `gender` `gender` TINYINT NULL DEFAULT '0'  , CHANGE COLUMN `phone` `phone` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL  , CHANGE COLUMN `address` `address` VARCHAR(255) NULL DEFAULT NULL  , CHANGE COLUMN `city` `city_id` INT(11) NULL DEFAULT '0'  , CHANGE COLUMN `city_text_en` `city_text_en` VARCHAR(50) NULL DEFAULT NULL  , CHANGE COLUMN `country` `country` VARCHAR(50) NULL DEFAULT NULL  , CHANGE COLUMN `is_newletter` `is_newletters_registered` TINYINT NULL DEFAULT '0'  , CHANGE COLUMN `is_received_email` `is_email_received` TINYINT(4) NULL DEFAULT '0'  , CHANGE COLUMN `dayleft` `days_left` INT(11) NULL DEFAULT '0'  , CHANGE COLUMN `jobleft` `jobs_left` INT(11) NULL DEFAULT '0'  , CHANGE COLUMN `page` `total_pages` TINYINT NULL DEFAULT '0'  , CHANGE COLUMN `signupby` `signup_by` VARCHAR(10) NULL DEFAULT NULL  , CHANGE COLUMN `deactive` `is_deleted` TINYINT NOT NULL DEFAULT 0  , CHANGE COLUMN `last_signin` `logined_at` TIMESTAMP NULL DEFAULT NULL
, ADD INDEX `password` (`password` ASC)
, ADD INDEX `type` (`type` ASC)
, ADD INDEX `status` (`status` ASC)
, ADD INDEX `is_deleted` (`is_deleted` ASC)
, DROP INDEX `fb_email` ;

ALTER TABLE `thue_today`.`user` CHANGE COLUMN `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  AFTER `logined_at` , CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT NULL  AFTER `created_at` ;

ALTER TABLE `thue_today`.`category` CHANGE COLUMN `url` `url` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL  , CHANGE COLUMN `link` `link` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '# link to other page'  ;

ALTER TABLE `thue_today`.`company` CHANGE COLUMN `category_ids` `category_ids` VARCHAR(100) NOT NULL  , CHANGE COLUMN `url` `url` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL  , CHANGE COLUMN `image` `image` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '# profile picture'  , CHANGE COLUMN `banner` `banner` VARCHAR(255) NULL DEFAULT NULL COMMENT '# cover banner'  , CHANGE COLUMN `phone` `phone` VARCHAR(100) NULL DEFAULT NULL  , CHANGE COLUMN `address` `address` VARCHAR(255) NOT NULL  , CHANGE COLUMN `facebook` `facebook_url` VARCHAR(255) NULL DEFAULT NULL  ;

ALTER TABLE `thue_today`.`company_branch` CHANGE COLUMN `address` `address` VARCHAR(255) NOT NULL  ;

ALTER TABLE `thue_today`.`company_url` CHANGE COLUMN `url` `url` VARCHAR(255) NOT NULL COMMENT '#url_name'  ;

ALTER TABLE `thue_today`.`contact` CHANGE COLUMN `email` `email` VARCHAR(255) NOT NULL COMMENT '# email'  , CHANGE COLUMN `phone` `phone` VARCHAR(100) NOT NULL COMMENT '# phone number'  , CHANGE COLUMN `subject` `subject` VARCHAR(255) NOT NULL COMMENT '# subject'  ;

ALTER TABLE `thue_today`.`email_edm` CHANGE COLUMN `name` `name` VARCHAR(255) NOT NULL  , CHANGE COLUMN `email` `email` VARCHAR(255) NOT NULL  , CHANGE COLUMN `company` `company` VARCHAR(255) NOT NULL  , CHANGE COLUMN `subject` `subject` VARCHAR(255) NOT NULL  ;

ALTER TABLE `thue_today`.`email_received` CHANGE COLUMN `email` `email` VARCHAR(255) NOT NULL  ;

ALTER TABLE `thue_today`.`job` CHANGE COLUMN `name` `name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'job title'  , CHANGE COLUMN `category_ids` `category_ids` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'category'  , CHANGE COLUMN `city_ids` `city_ids` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'location'  , CHANGE COLUMN `nationality` `nationality` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL  , CHANGE COLUMN `level` `level` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'level'  , CHANGE COLUMN `type` `type` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'type '  , CHANGE COLUMN `experience` `experience` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'experience'  , CHANGE COLUMN `languages` `languages` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'language'  ;

ALTER TABLE `thue_today`.`message` CHANGE COLUMN `subject` `subject` VARCHAR(255) NOT NULL  ;

ALTER TABLE `thue_today`.`promotion` CHANGE COLUMN `code` `code` VARCHAR(100) NOT NULL  ;

ALTER TABLE `thue_today`.`static_page` CHANGE COLUMN `title_vi` `name_vi` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '#title_en'  , CHANGE COLUMN `tiitle_en` `name_en` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '#title_vn'  , CHANGE COLUMN `subject` `subject` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL  , CHANGE COLUMN `url` `url` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL  ;

ALTER TABLE `thue_today`.`user` CHANGE COLUMN `email` `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL  , CHANGE COLUMN `password` `password` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL  , CHANGE COLUMN `facebook_email` `facebook_email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL  , CHANGE COLUMN `phone` `phone` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL  , CHANGE COLUMN `city_text_vi` `city_text_vi` VARCHAR(255) NULL DEFAULT NULL  , CHANGE COLUMN `city_text_en` `city_text_en` VARCHAR(255) NULL DEFAULT NULL  , CHANGE COLUMN `country` `country` VARCHAR(255) NULL DEFAULT NULL  , CHANGE COLUMN `signup_by` `signup_by` VARCHAR(100) NULL DEFAULT NULL  ;
