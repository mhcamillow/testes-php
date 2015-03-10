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
   (
   	CODATN INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	CODCLI INT(8), # cliente
	CODATE INT(8), # atendente (fica nulo ate alguem atender)
	CODUSU INT(8) NOT NULL, #usuario que abriu / mesmo que o cliente
	NIVPRI INT(4), # prioridade (atendente define) # 1 baixo 2 medio 3 alto
	CODDEP INT(8), #nulo
	CODARE INT(8), #nulo
	DATGER DATE NOT NULL, # data geração
	SITATN INT(2) NOT NULL, # 1 aberto 2 em andamento 3 aguardando aceite 4 finalizado 5 reaberto
	DATPRV DATE, # atendente define
	DATATU DATE, # muda nas atualização de mensagem
	DATFIM DATE, # muda ao finalizar
	CODGRP INT(8), # nulo
	NATATN INT(2) # 1 duvida 2 erro 3 exigencia legal 4 implantação 5 implementação 6 serviço 7 sugestão 8 treinamento
   );

CREATE TABLE F114MSG #Mensagem do chamado
   (	CODATN INT(8) NOT NULL, # codigo chamado
	SEQATN INT(4) NOT NULL, #sequencia mensagem (1 ao abrir)
	DESATN VARCHAR(1000), #descricao
	CODCLI INT(8) NOT NULL, # cliente (quando a mensagem é o cliente que fez grava aqui senao é 0)
	CODATE INT(8) NOT NULL, # atendente (ao abrir é 0)
	SITATN INT(2) NOT NULL, # 1 aberto 2 em andamento 3 aguardando aceite 4 finalizado 5 reaberto
	DATATU DATE, #data atualização
	CODUSU INT(8) NOT NULL, # usuario
	NIVPRI INT(4), # 1 baixo 2 medio 3 alto
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
