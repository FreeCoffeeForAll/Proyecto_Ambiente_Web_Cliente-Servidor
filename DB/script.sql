CREATE TABLE `tienda`.`categoria` 
( `id_categoria` INT(11) NOT NULL AUTO_INCREMENT , 
`nom_categoria` VARCHAR(300) NOT NULL , 
`desc_categoria` VARCHAR(250) NOT NULL , 
PRIMARY KEY (`id_categoria`)) 
ENGINE = InnoDB;

CREATE TABLE `tienda`.`producto` 
( `id_producto` INT(11) NOT NULL AUTO_INCREMENT , 
`nom_producto` VARCHAR(300) NOT NULL , 
`marca` VARCHAR(250) NOT NULL , 
`precio` INT(11) NOT NULL , 
`desc_producto` VARCHAR(250) NOT NULL , 
`id_categoria` INT NOT NULL , 
PRIMARY KEY (`id_producto`),
FOREIGN KEY (`id_categoria`) REFERENCES `tienda`.`categoria`(`id_categoria`)) 
ENGINE = InnoDB;

CREATE TABLE `tienda`.`usuarios` 
( `id_Usuario` INT(11) NOT NULL AUTO_INCREMENT , 
`nomb1_User` VARCHAR(250) NOT NULL ,
`nomb2_User` VARCHAR(250) NOT NULL ,
`apel1_User` VARCHAR(250) NOT NULL ,
`apel2_User` VARCHAR(250) NOT NULL ,
`correo_User` VARCHAR(250) NOT NULL , 
`telefono_User` INT(11) NOT NULL , 
PRIMARY KEY (`id_Usuario`)) 
ENGINE = InnoDB;

CREATE TABLE `tienda`.`detalle_factura` 
( `id_DetalleFact` INT(11) NOT NULL AUTO_INCREMENT , 
`Id_Usuario` INT(11) NOT NULL , 
`FechaHora` DATE NOT NULL , 
`Total` FLOAT(11) NOT NULL , 
PRIMARY KEY (`id_DetalleFact`),
FOREIGN KEY (`id_Usuario`) REFERENCES `tienda`.`usuarios`(`id_Usuario`)) 
ENGINE = InnoDB;

CREATE TABLE `tienda`.`factura` 
( `id_Factura` INT(11) NOT NULL AUTO_INCREMENT , 
`id_Producto` INT(11) NOT NULL , 
`id_DetalleFact` INT(11) NOT NULL , 
`Total` INT(11) NOT NULL , 
`Precio` FLOAT(11) NOT NULL , 
PRIMARY KEY (`id_Factura`),
FOREIGN KEY (`id_Producto`) REFERENCES `tienda`.`producto`(`id_producto`), 
FOREIGN KEY (`id_DetalleFact`) REFERENCES `tienda`.`detalle_factura`(`id_DetalleFact`)) 
ENGINE = InnoDB;

ALTER TABLE `producto` ADD `img` BLOB NOT NULL AFTER `id_categoria`;
ALTER TABLE `producto` ADD `cantidad` INT(11) NOT NULL AFTER `precio`;

INSERT INTO `categoria` (`id_categoria`, `nom_categoria`, `desc_categoria`) VALUES ('1', 'Mountain Bike', 'Bicicletas de montaña'), ('2', 'BMX', 'Bicicleta para acrobacias'), ('3', 'Ruta', 'Bicicletas diseñadas para la velocidad'), ('4', 'Niños', 'Biciceltas para niños');

INSERT INTO `usuarios` (`id_Usuario`, `nom_User`, `contra`, `nombre_usuario`, `apel_User`, `correo_User`, `telefono_User`, `rol_id`) VALUES ('1', 'admin', 'admin', 'admin', 'admin', 'admin', '1223', '1');

INSERT INTO `roles` (`id`, `rol`) VALUES ('1', 'admin'), ('2', 'usuario');

INSERT INTO `usuarios` (`id_Usuario`, `nom_User`, `contra`, `nombre_usuario`, `apel_User`, `correo_User`, `telefono_User`, `rol_id`) VALUES ('2', 'Juan', '123', 'Juan', 'Lopez', 'juanito22@gmail.com', '123', '2');