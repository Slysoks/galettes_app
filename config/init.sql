CREATE TABLE galettes (
  `id` int(11) NOT NULL,
  `prenom` tinytext NOT NULL,
  `viande` tinytext NOT NULL,
  `oeuf` tinytext NOT NULL,
  `fromage` tinytext NOT NULL,
  `accompagnements` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `galettes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `galettes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;

CREATE TABLE ingredients (
  `id` tinyint(4) NOT NULL DEFAULT '1',
  `viandes` text,
  `fromages` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;