CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `view_product_option_value` AS
    SELECT 
        `product_option_value`.`product_option_value_id` AS `product_option_value_id`,
        `product_option_value_description`.`name` AS `name`,
        `product_option_value_description`.`language_id` AS `language_id`,
        `product_option_value`.`product_option_id` AS `product_option_id`,
        `product_option_value`.`create_date` AS `create_date`,
        `product_option_value`.`create_by_id` AS `create_by_id`,
        `product_option_value`.`edit_date` AS `edit_date`,
        `product_option_value`.`edit_by_id` AS `edit_by_id`,
        `product_option_value`.`status` AS `status`
    FROM
        (`product_option_value`
        LEFT JOIN `product_option_value_description` ON ((`product_option_value`.`product_option_value_id` = `product_option_value_description`.`product_option_value_id`)))