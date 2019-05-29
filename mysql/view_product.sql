CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `view_product` AS
    SELECT 
        `product`.`product_id` AS `product_id`,
        `view_category`.`category_id` AS `category_id`,
        `view_category`.`name` AS `category_name`,
        `view_category`.`image` AS `category_image`,
        `view_category`.`icon` AS `category_icon`,
        `product_description`.`product_description_id` AS `product_description_id`,
        `product_description`.`language_id` AS `language_id`,
        `product_description`.`name` AS `name`,
        `product_description`.`description` AS `description`,
        `product_description`.`url` AS `url`,
        `product_description`.`viewed` AS `viewed`,
        `product`.`quantity` AS `quantity`,
        `product`.`model` AS `model`,
        `product`.`image` AS `image`,
        `product`.`price` AS `price`,
        `product`.`weight` AS `weight`,
        `product`.`weight_unit` AS `weight_unit`,
        `product`.`ordered` AS `ordered`,
        `product`.`tax_class_id` AS `tax_class_id`,
        `product`.`manufacturer_id` AS `manufacturer_id`,
        `product`.`liked` AS `liked`,
        `product`.`low_limit` AS `low_limit`,
        `product`.`is_feature` AS `is_feature`,
        `product`.`slug` AS `slug`,
        `product`.`create_date` AS `create_date`,
        `product`.`create_by_id` AS `create_by_id`,
        `product`.`edit_date` AS `edit_date`,
        `product`.`edit_by_id` AS `edit_by_id`,
        `product`.`status` AS `status`
    FROM
        ((`product`
        LEFT JOIN `product_description` ON ((`product`.`product_id` = `product_description`.`product_id`)))
        LEFT JOIN `view_category` ON ((`view_category`.`category_id` = `product`.`category_id`)))
    WHERE
        (`product_description`.`language_id` IS NOT NULL)