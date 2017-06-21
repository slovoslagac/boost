ALTER TABLE `orders`
DROP FOREIGN KEY `fkordertypeord`;

ALTER TABLE `orders`
CHANGE COLUMN `ordertype` `boosttypes` INT(2) NULL DEFAULT NULL ;

ALTER TABLE `ordertypes`
RENAME TO  `boosttypes` ;

ALTER TABLE `orders`
ADD CONSTRAINT `fkordertypeord`
  FOREIGN KEY (`boosttypes`)
  REFERENCES `doorkeeper`.`boosttypes` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
