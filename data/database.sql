-- questo è un database di prova
-- serve per verificare il corretto funzionamento dell'applicazione in corso di sviluppo
-- una volta collegata l'app al server sftp, questo file è solo per local development
-- database: 'green_station'
-- table: 'rilevamenti'

CREATE TABLE `green_station`.`rilevamenti` (
  `id` INT(100) NOT NULL,
  `prese_occupate` INT(100) NOT NULL,
  `consumo_istantaneo` INT(100) NOT NULL,
  `consumo_totale` INT(100) NOT NULL,
  `data_ora_inizio_carica` TIME(6) NOT NULL,
  `data_ora_fine_carica` TIME(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;