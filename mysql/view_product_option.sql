CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `view_product_option` AS
    SELECT 
        `product_option`.`product_option_id` AS `product_option_id`,
        `product_option_description`.`name` AS `name`,
        `product_option`.`language_id` AS `language_id`,
        `product_option`.`create_date` AS `create_date`,
        `product_option`.`create_by_id` AS `create_by_id`,
        `product_option`.`edit_date` AS `edit_date`,
        `product_option`.`edit_by_id` AS `edit_by_id`,
        `product_option`.`status` AS `status`
    FROM
        (`product_option`
        LEFT JOIN `product_option_description` ON ((`product_option_description`.`product_option_id` = `product_option`.`product_option_id`)))