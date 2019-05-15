CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `view_manufacturer` AS
    SELECT 
        `manufacturer`.`manufacturer_id` AS `manufacturer_id`,
        `manufacturer_description`.`name` AS `name`,
        `manufacturer`.`image` AS `image`,
        `manufacturer`.`slug` AS `slug`,
        `manufacturer_description`.`language_id` AS `language_id`,
        `manufacturer`.`create_date` AS `create_date`,
        `manufacturer`.`create_by_id` AS `create_by_id`,
        `manufacturer`.`edit_date` AS `edit_date`,
        `manufacturer`.`edit_by_id` AS `edit_by_id`,
        `manufacturer`.`status` AS `status`
    FROM
        (`manufacturer`
        LEFT JOIN `manufacturer_description` ON ((`manufacturer`.`manufacturer_id` = `manufacturer_description`.`manufacturer_id`)))