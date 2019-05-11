CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `view_category` AS
    SELECT 
        `category`.`category_id` AS `category_id`,
        `category_description`.`name` AS `name`,
        `category`.`image` AS `image`,
        `category`.`icon` AS `icon`,
        `category`.`slug` AS `slug`,
        `category`.`sort_order` AS `sort_order`,
        `category`.`create_date` AS `create_date`,
        `category`.`create_by_id` AS `create_by_id`,
        `category`.`edit_date` AS `edit_date`,
        `category`.`edit_by_id` AS `edit_by_id`,
        `category`.`status` AS `status`,
        `category_description`.`language_id` AS `language_id`
    FROM
        (`category`
        LEFT JOIN `category_description` ON ((`category_description`.`category_id` = `category`.`category_id`)))