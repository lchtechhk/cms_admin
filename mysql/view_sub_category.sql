CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `view_sub_category` AS
    SELECT 
        `sub_category`.`sub_category_id` AS `sub_category_id`,
        `category_description`.`name` AS `category_name`,
        `sub_category`.`category_id` AS `category_id`,
        `sub_category_description`.`name` AS `sub_category_name`,
        `sub_category`.`image` AS `image`,
        `sub_category`.`icon` AS `icon`,
        `sub_category`.`slug` AS `slug`,
        `sub_category`.`sort_order` AS `sort_order`,
        `sub_category`.`create_date` AS `create_date`,
        `sub_category`.`create_by_id` AS `create_by_id`,
        `sub_category`.`edit_date` AS `edit_date`,
        `sub_category`.`edit_by_id` AS `edit_by_id`,
        `sub_category`.`status` AS `status`,
        `category_description`.`language_id` AS `category_language_id`,
        `sub_category_description`.`language_id` AS `sub_category_language_id`
    FROM
        ((`sub_category`
        LEFT JOIN `category_description` ON ((`category_description`.`category_id` = `sub_category`.`category_id`)))
        LEFT JOIN `sub_category_description` ON ((`sub_category_description`.`sub_category_id` = `sub_category`.`sub_category_id`)))
    WHERE
        (`category_description`.`language_id` = `sub_category_description`.`language_id`)