-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para pokemones
CREATE DATABASE IF NOT EXISTS `pokemones` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `pokemones`;

-- Volcando estructura para tabla pokemones.equipos
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMaestro` int(11) NOT NULL,
  `idPokemon` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla pokemones.equipos: ~4 rows (aproximadamente)
INSERT INTO `equipos` (`id`, `idMaestro`, `idPokemon`) VALUES
	(44, 5, 5),
	(45, 5, 4),
	(46, 5, 3),
	(96, 3, 5);

-- Volcando estructura para tabla pokemones.pokedex
CREATE TABLE IF NOT EXISTS `pokedex` (
  `idPokedex` bigint(20) NOT NULL AUTO_INCREMENT,
  `idMaestro` int(11) DEFAULT NULL,
  `idPokemon` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPokedex`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla pokemones.pokedex: ~9 rows (aproximadamente)
INSERT INTO `pokedex` (`idPokedex`, `idMaestro`, `idPokemon`) VALUES
	(1, 3, 3),
	(2, 3, 4),
	(3, 3, 2),
	(4, 3, 5),
	(5, 3, 3),
	(6, 5, 2),
	(7, 5, 5),
	(8, 5, 4),
	(9, 5, 3);

-- Volcando estructura para tabla pokemones.pokemons
CREATE TABLE IF NOT EXISTS `pokemons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  `tipo1` varchar(32) NOT NULL,
  `tipo2` varchar(32) DEFAULT NULL,
  `numero` bigint(20) unsigned NOT NULL,
  `image` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  UNIQUE KEY `numero` (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla pokemones.pokemons: ~5 rows (aproximadamente)
INSERT INTO `pokemons` (`id`, `nombre`, `tipo1`, `tipo2`, `numero`, `image`) VALUES
	(2, 'Dragonite', 'dragon', 'volador', 77, 'dragonite.png'),
	(3, 'Bulbasur', 'planta', NULL, 3, 'dragonite.png'),
	(4, 'Pidgey', 'volador', NULL, 12, 'dragonite.png'),
	(5, 'Ampharos', 'agua', 'tierra', 55, 'ampharos.png'),
	(6, 'platafuego', 'planta', 'fuego', 333, 'ampharos.png');

-- Volcando estructura para tabla pokemones.tipos
CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla pokemones.tipos: ~10 rows (aproximadamente)
INSERT INTO `tipos` (`id`, `tipo`) VALUES
	(1, 'fuego'),
	(2, 'agua'),
	(3, 'tierra'),
	(4, 'planta'),
	(5, 'psiquico'),
	(6, 'Eléctrico'),
	(7, 'Fantasma'),
	(8, 'Lucha'),
	(9, 'Normal'),
	(10, 'tipotipo');

-- Volcando estructura para tabla pokemones.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `rol` tinyint(4) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla pokemones.usuarios: ~3 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `username`, `rol`, `password`) VALUES
	(3, 'yeray', 1, '123'),
	(4, 'root', 2, 'toor'),
	(5, 'hola', 1, '1234');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
