-- questo è un database di prova
-- serve per verificare il corretto funzionamento dell'applicazione in corso di sviluppo
-- una volta collegata l'app al server sftp, questo file è solo per local development

CREATE TABLE `green_station`.`dati` (
  `prese_occupate` INT(200) NOT NULL,
  `corrente_istantanea` INT(200) NOT NULL,
  `consumo_totale` INT(200) NOT NULL,
  `id_presa` INT(100) NOT NULL
) ENGINE = InnoDB;