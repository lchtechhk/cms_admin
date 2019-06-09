CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `cms`.`view_order_product` AS
    SELECT 
        `cms`.`order_product`.`order_product_id` AS `order_product_id`,
        `cms`.`order_product`.`order_id` AS `order_id`,
        `cms`.`order_product`.`product_id` AS `product_id`,
        `cms`.`order_product`.`product_name` AS `product_name`,
        `cms`.`order_product`.`currency_id` AS `currency_id`,
        `cms`.`order_product`.`product_price` AS `product_price`,
        `cms`.`order_product`.`final_price` AS `final_price`,
        `cms`.`order_product`.`product_quantity` AS `product_quantity`,
        `cms`.`order_product`.`weight` AS `weight`,
        `cms`.`order_product`.`weight_unit` AS `weight_unit`,
        `cms`.`product`.`image` AS `image`
    FROM
        (`cms`.`order_product`
        LEFT JOIN `cms`.`product` ON ((`cms`.`product`.`product_id` = `cms`.`order_product`.`product_id`)))