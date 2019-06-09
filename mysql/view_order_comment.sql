CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `view_order_comment` AS
    SELECT 
        `order_comment`.`order_comment_id` AS `order_comment_id`,
        `order_comment`.`order_id` AS `order_id`,
        `order_comment`.`comments` AS `comments`,
        `order_comment`.`customer_notified` AS `customer_notified`,
        `order_comment`.`permission` AS `permission`,
        `order_comment`.`create_date` AS `create_date`,
        `order_comment`.`create_by_id` AS `create_by_id`,
        `order_comment`.`edit_date` AS `edit_date`,
        `order_comment`.`edit_by_id` AS `edit_by_id`,
        `order_comment`.`status` AS `status`
    FROM
        (`order_comment`
        LEFT JOIN `order` ON ((`order_comment`.`order_id` = `order`.`order_id`)))