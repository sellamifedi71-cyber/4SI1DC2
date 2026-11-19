
-- Table ajoutée pour enregistrer les inscriptions des membres aux actions.
CREATE TABLE IF NOT EXISTS `participation` (
  `mail` varchar(100) NOT NULL,
  `idAction` int(11) NOT NULL,
  `datePart` date NOT NULL,
  PRIMARY KEY (`mail`, `idAction`),
  KEY `idx_participation_action` (`idAction`),
  CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `membre` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`idAction`) REFERENCES `action` (`idAction`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
