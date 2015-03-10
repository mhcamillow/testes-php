DROP TABLE F114IMG;
DROP TABLE F114MSG;
DROP TABLE F114CAB;
DROP TABLE F061ARE;
DROP TABLE F061DEP;
DROP TABLE F999LIG;
DROP TABLE F999GRP;
DROP TABLE F999CPL;

CREATE TABLE F999CPL #usuario
   (	CODUSU INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	TIPUSU VARCHAR(1) NOT NULL, #A #C #M
	NOMCOM VARCHAR(255) NOT NULL,
  NOMUSU VARCHAR(255) NOT NULL,
	SENUSU VARCHAR(100),
  DATNAS DATE,
  EMAUSU VARCHAR(100)
   );

CREATE TABLE F999GRP #Grupo de usuario
   (	CODGRP INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	DESGRP VARCHAR(100)
   );

CREATE TABLE F999LIG #relacao usuario grupo
   (	CODGRP INT(8) NOT NULL,
	CODUSU INT(8),
	SEQGRP INT(4) NOT NULL,
  CONSTRAINT CP_F999LIG PRIMARY KEY (CODGRP, SEQGRP),
	 CONSTRAINT IRF99000 FOREIGN KEY (CODGRP)
	  REFERENCES F999GRP (CODGRP),
	 CONSTRAINT IRF99001 FOREIGN KEY (CODUSU)
	  REFERENCES F999CPL (CODUSU)
   );

CREATE TABLE F061DEP #Departamento
   (	CODDEP INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	DESDEP VARCHAR(100) NOT NULL,
	NOMRES VARCHAR(100),
	OBSDEP VARCHAR(1000)
   );

CREATE TABLE F061ARE #Area (dentro do departamento)
   (	CODARE INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	DESARE VARCHAR(100) NOT NULL,
	OBSARE VARCHAR(1000),
	CODDEP INT(8)
   );

CREATE TABLE F114CAB #Cabeçalho do chamado
   (	CODATN INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	CODCLI INT(8) NOT NULL,
	CODATE INT(8) NOT NULL,
	CODUSU INT(8) NOT NULL,
	NIVPRI INT(4),
	CODDEP INT(8) NOT NULL,
	CODARE INT(8) NOT NULL,
	DATGER DATE NOT NULL,
	SITATN INT(2) NOT NULL, # 1 aberto 2 em andamento 3 aguardando aceite 4 finalizado 5 reaberto
	DATPRV DATE,
	DATATU DATE,
	DATFIM DATE,
	CODGRP INT(8) NOT NULL,
	NATATN INT(2), # 1 duvida 2 erro 3 exigencia legal 4 implantação 5 implementação 6 serviço 7 sugestão 8 treinamento
	 CONSTRAINT IRF11004 FOREIGN KEY (CODUSU)
	  REFERENCES F999CPL (CODUSU),
	 CONSTRAINT IRF11002 FOREIGN KEY (CODCLI)
	  REFERENCES F999CPL (CODUSU),
	 CONSTRAINT IRF11001 FOREIGN KEY (CODDEP)
	  REFERENCES F061DEP (CODDEP),
	 CONSTRAINT IRF11000 FOREIGN KEY (CODARE)
	  REFERENCES F061ARE (CODARE)
   );

CREATE TABLE F114MSG #Mensagem do chamado
   (	CODATN INT(8) NOT NULL,
	SEQATN INT(4) NOT NULL,
	DESATN VARCHAR(1000),
	CODCLI INT(8) NOT NULL,
	CODATE INT(8) NOT NULL,
	SITATN INT(2) NOT NULL,
	DATATU DATE,
	CODUSU INT(8) NOT NULL,
	NIVPRI INT(4),
	 CONSTRAINT CP_F114MSG PRIMARY KEY (CODATN, SEQATN),
	 CONSTRAINT IRF11005 FOREIGN KEY (CODATN)
	  REFERENCES F114CAB (CODATN)
   );

CREATE TABLE F114IMG #Arquivo
   (	CODATN INT(8) NOT NULL,
	SEQATN INT(4) NOT NULL,
	SEQIMG INT(4) NOT NULL,
	IMGATN BLOB,
	EXTARQ VARCHAR(5),
	NOMARQ VARCHAR(100),
	 CONSTRAINT CP_F114IMG PRIMARY KEY (CODATN, SEQATN, SEQIMG),
	 CONSTRAINT IRF11006 FOREIGN KEY (CODATN, SEQATN)
	  REFERENCES F114MSG (CODATN, SEQATN)
   );
