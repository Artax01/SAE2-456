-- -----------------------------------------------------------------------------
--             Gï¿½nï¿½ration d'une base de donnï¿½es pour
--                      Oracle Version 10g
--                     (3/3/2025 13:42:20)
-- -----------------------------------------------------------------------------
--      Nom de la base : MLR V4
--      Projet : pizza
--      Auteur : PORCQ Erc
--      Date de derniï¿½re modification : 3/3/2025 13:41:18
-- -----------------------------------------------------------------------------

DROP TABLE RAP_BOISSON CASCADE CONSTRAINTS;
DROP TABLE RAP_COMMANDE CASCADE CONSTRAINTS;
DROP TABLE RAP_PLAT CASCADE CONSTRAINTS;
DROP TABLE RAP_LEGUME CASCADE CONSTRAINTS;
DROP TABLE RAP_CLIENT CASCADE CONSTRAINTS;
DROP TABLE RAP_DESSERT CASCADE CONSTRAINTS;
DROP TABLE RAP_PIZZA CASCADE CONSTRAINTS;
DROP TABLE RAP_KEBAB CASCADE CONSTRAINTS;
DROP TABLE RAP_FIDELISATION CASCADE CONSTRAINTS;
DROP TABLE RAP_APPARTENIR CASCADE CONSTRAINTS;
DROP TABLE RAP_RESTAURANT CASCADE CONSTRAINTS;
DROP TABLE RAP_PLAT_IMAGE CASCADE CONSTRAINTS;
DROP TABLE RAP_ADMINISTRATEUR CASCADE CONSTRAINTS;
CREATE TABLE RAP_BOISSON
(
    PLA_NUM VARCHAR2(4),
	CONSTRAINT PK_RAP_BOISSON PRIMARY KEY (PLA_NUM)
);

CREATE TABLE RAP_COMMANDE
(
    RES_NUM NUMBER(3),
    COM_NUM NUMBER(6),
    CLI_NUM NUMBER(4),
    COM_DATE DATE  NULL,
    COM_HEURE_RECUP DATE  NULL,
    COM_PRIX_TOTAL NUMBER(6,2)  NULL,
    COM_REDUC_POINTS NUMBER(4,2)  NULL,
    COM_REDUC_PROMO NUMBER(4,2)  NULL,
    COM_DUREE_TOTALE_PREPA NUMBER(5)  NULL,
    CONSTRAINT PK_RAP_COMMANDE PRIMARY KEY (RES_NUM, COM_NUM)
);

CREATE  INDEX I_FK_RAP_COMMANDE_RAP_RESTAURA
     ON RAP_COMMANDE (RES_NUM ASC);

CREATE  INDEX I_FK_RAP_COMMANDE_RAP_CLIENT
     ON RAP_COMMANDE (CLI_NUM ASC);


CREATE TABLE RAP_RESTAURANT
(
    RES_NUM NUMBER(3),
    RES_ADRESSE VARCHAR2(64)  NULL,
    RES_CODE_POSTAL CHAR(5)  NULL,
    RES_VILLE VARCHAR2(32)  NULL,
    CONSTRAINT PK_RAP_RESTAURANT PRIMARY KEY (RES_NUM)
);

CREATE TABLE RAP_PLAT
(
    PLA_NUM VARCHAR2(4),
    PLA_NOM VARCHAR2(100)  NULL,
    PLA_MENU NUMBER(1)  NULL,
    PLA_PRIX_VENTE_UNIT_HT NUMBER(6,2)  NULL,
    PLA_PRIX_ACHAT_UNIT_HT NUMBER(6,2)  NULL,
    PLA_TVA NUMBER(4,2)  NULL,
    PLA_PROMOTION NUMBER(4,2)  NULL,
    PLA_NB_POINTS NUMBER(2)  NULL,
    PLA_DUREE_PREPARATION NUMBER(3)  NULL,
    PLA_DESCRIPTION VARCHAR2(500) DEFAULT 'un menu',
	CONSTRAINT PK_RAP_PLAT PRIMARY KEY (PLA_NUM)
);

CREATE TABLE RAP_PLAT_IMAGE
(
     PLA_NUM VARCHAR2(4),
     CHEMIN_IMG VARCHAR2(255) NULL,
     ALT_DESC_IMG VARCHAR2(100) NULL,
     CONSTRAINT PK_RAP_IMAGE PRIMARY KEY(PLA_NUM, CHEMIN_IMG)

);
CREATE TABLE RAP_ADMINISTRATEUR
(
    admin_num VARCHAR2(4),
    cli_num Varchar(4),
    constraint PK_RAP_ADMINISTRATEUR PRIMARY KEY(admin_num)
);

CREATE TABLE RAP_LEGUME
(
    PLA_NUM VARCHAR2(4),
	CONSTRAINT PK_RAP_LEGUME PRIMARY KEY (PLA_NUM)
);

CREATE TABLE RAP_CLIENT
(
    CLI_NUM NUMBER(4),
    CLI_NOM VARCHAR2(32),
    CLI_PRENOM VARCHAR2(32),
    CLI_MDP VARCHAR(32),
    CLI_TEL VARCHAR(32) NULL,
    CLI_COURRIEL VARCHAR2(32)  NULL,
	CONSTRAINT PK_RAP_CLIENT PRIMARY KEY (CLI_NUM)
);

CREATE TABLE RAP_DESSERT
(
    PLA_NUM VARCHAR2(4),
	CONSTRAINT PK_RAP_DESSERT PRIMARY KEY (PLA_NUM)
);

CREATE TABLE RAP_PIZZA
(
    PLA_NUM VARCHAR2(4),
    PIZ_TAILLE NUMBER(2)  NULL,
	CONSTRAINT PK_RAP_PIZZA PRIMARY KEY (PLA_NUM)
);

CREATE TABLE RAP_KEBAB
(
    PLA_NUM VARCHAR2(4),
	CONSTRAINT PK_RAP_KEBAB PRIMARY KEY (PLA_NUM)
);

CREATE TABLE RAP_FIDELISATION
(
    CLI_NUM NUMBER(4),
    SUI_DATE_POINTS DATE,
    TOTAL_POINTS NUMBER(5)  NULL,
	CONSTRAINT PK_RAP_FIDELISATION PRIMARY KEY (CLI_NUM, SUI_DATE_POINTS)
);

CREATE  INDEX I_FK_RAP_FIDELISATION_RAP_SUIV
     ON RAP_FIDELISATION (SUI_DATE_POINTS ASC);

CREATE  INDEX I_FK_RAP_FIDELISATION_RAP_CLIE
     ON RAP_FIDELISATION (CLI_NUM ASC);

CREATE TABLE RAP_APPARTENIR
(
    RES_NUM NUMBER(3),
    COM_NUM NUMBER(6),
    PLA_NUM VARCHAR2(4),
    APP_QUANTITE NUMBER(2)  NULL,
    CONSTRAINT PK_RAP_APPARTENIR PRIMARY KEY (RES_NUM, COM_NUM, PLA_NUM)
);

CREATE  INDEX I_FK_RAP_APPARTENIR_RAP_COMMAN
     ON RAP_APPARTENIR (RES_NUM ASC, COM_NUM ASC);

CREATE  INDEX I_FK_RAP_APPARTENIR_RAP_PLAT
     ON RAP_APPARTENIR (PLA_NUM ASC);

-- -----------------------------------------------------------------------------
--       CREATION DES REFERENCES DE TABLE
-- -----------------------------------------------------------------------------
ALTER TABLE RAP_COMMANDE ADD (
     CONSTRAINT FK_RAP_COMMANDE_RAP_RESTAURANT
          FOREIGN KEY (RES_NUM)
               REFERENCES RAP_RESTAURANT (RES_NUM));
               
ALTER TABLE RAP_ADMINISTRATEUR ADD (
     CONSTRAINT FK_RAP_ADMINISTRATEUR_RAP_CLIENT
          FOREIGN KEY (CLI_NUM)
               REFERENCES RAP_CLIENT (cli_num));

ALTER TABLE RAP_COMMANDE ADD (
     CONSTRAINT FK_RAP_COMMANDE_RAP_CLIENT
          FOREIGN KEY (CLI_NUM)
               REFERENCES RAP_CLIENT (CLI_NUM));

ALTER TABLE RAP_KEBAB ADD (
     CONSTRAINT FK_RAP_KEBAB_RAP_PLAT
          FOREIGN KEY (PLA_NUM)
               REFERENCES RAP_PLAT (PLA_NUM));

ALTER TABLE RAP_LEGUME ADD (
     CONSTRAINT FK_RAP_LEGUME_RAP_PLAT
          FOREIGN KEY (PLA_NUM)
               REFERENCES RAP_PLAT (PLA_NUM));

ALTER TABLE RAP_PIZZA ADD (
     CONSTRAINT FK_RAP_PIZZA_RAP_PLAT
          FOREIGN KEY (PLA_NUM)
               REFERENCES RAP_PLAT (PLA_NUM));

ALTER TABLE RAP_DESSERT ADD (
     CONSTRAINT FK_RAP_DESSERT_RAP_PLAT
          FOREIGN KEY (PLA_NUM)
               REFERENCES RAP_PLAT (PLA_NUM));

ALTER TABLE RAP_BOISSON ADD (
     CONSTRAINT FK_RAP_BOISSON_RAP_PLAT
          FOREIGN KEY (PLA_NUM)
               REFERENCES RAP_PLAT (PLA_NUM));

ALTER TABLE RAP_FIDELISATION ADD (
     CONSTRAINT FK_RAP_FIDELISATION_RAP_CLIENT
          FOREIGN KEY (CLI_NUM)
               REFERENCES RAP_CLIENT (CLI_NUM));

ALTER TABLE RAP_APPARTENIR ADD (
     CONSTRAINT FK_RAP_APPARTENIR_RAP_COMMANDE
          FOREIGN KEY (RES_NUM, COM_NUM)
               REFERENCES RAP_COMMANDE (RES_NUM, COM_NUM));

ALTER TABLE RAP_APPARTENIR ADD (
     CONSTRAINT FK_RAP_APPARTENIR_RAP_PLAT
          FOREIGN KEY (PLA_NUM)
               REFERENCES RAP_PLAT (PLA_NUM));

ALTER TABLE RAP_PLAT_IMAGE ADD (
     CONSTRAINT FK_RAP_PLAT_IMAGE_RAP_PLAT
          FOREIGN KEY(PLA_NUM)
               REFERENCES RAP_PLAT (PLA_NUM));
REM INSERTING into RAP_CLIENT;
SET DEFINE OFF;
insert into rap_client values ('0','NON CLIENT','NON CLIENT', 'NON CLIENT', 'NON CLIENT', 'NON CLIENT');
insert into rap_client values ('1','LEPERE','Noï¿½l','LEPERENOEL','0102030405','perno@rso.fr');
insert into rap_client values ('2','LAMERE','Michele','LAMEREMICHELE', null,'memere@ego.fr');
insert into rap_client values ('124','PELLE','Emma','PELLEEMMA', null,'emapelle@ihm.fr');
insert into rap_client values ('139','FOTO','Thomas','FOTOTHOMAS', null,'thoma.foto@ppp.fr');
insert into rap_client values ('246','BORNE','Camille','BORNECAMILLE', null,'K1000borne@algo.fr');
insert into rap_client values ('249','ABOIS','Clovis','ABOISCLOVIS', null,'clovis666@bdd.fr');
insert into rap_client values ('261','COLOGNE','Claude','COLOGNECLAUDE', null,'claude.cologne@bdd.fr');
insert into rap_client values ('269','AUBOISDORMANT','ABEL','AUBOISDORMANTABEL', null,'abel14@iut.com');
insert into rap_client values ('984','ESEL','Jean-Franï¿½ois','ESELJEANFRANCOIS', null,'jpe@sys.fr');
insert into rap_client values ('998','PRIOR','Bï¿½atrice','PRIORBEATRICE', null,'b.prior@div.fr');
insert into rap_client values ('1001','NERONS','Philippe','NERONSPHILIPPE', null,'p_nerons@ihm.fr');
insert into rap_client values ('1008','DELIVAROT','Paul','DELIVAROT', null,'p.delivatot@algo.fr');
insert into rap_client values ('1034','KUSCHENFRAU','Angela','KUSCHENFRAUANGELA', null,'akf@lakers.de');
insert into rap_client values ('1041','SUPORMOI','Steven','SUPORMOISTEVEN', null,'ssupormoi@donnay.fr');
insert into rap_client values ('1052','FROUSSARD','Stï¿½phane','FROUSSARDSTEPHANE', null,'sfroussard@thales.fr');
insert into rap_client values ('1058','PASAMSUNG','Christelle','PASAMSUNGCHRISTELLE', null,'cpc@iut.com');
insert into rap_client values ('1059','DEWAERE','Marlï¿½ne','DEWAEREMARLENE', null,'m.dewaere@audio.fr');
insert into rap_client values ('1070','BOUCHEZ','Olivier','BOUCHEZOLIVIER', null,'olivier.bouchez@iut.fr');
insert into rap_client values ('1074','MAIALEQ','Eric','MAIALEQERIC', null,'Eric.Maialeq@tdf.fr');
insert into rap_client values ('1076','ROUSELLE','Kader','ROUSELLEKADER', null,'kader.rouselle@3maisons.fr');
insert into rap_client values ('1078','SUPER','Didier','SUPERDIDIER', null,'didier.super@poire.fr');
insert into rap_client values ('1079','SUPER','Simone','SUPERSIMONE', null,'simone.super@poire.fr');
insert into rap_client values ('1120','FONCOMBE','Arwen','FONCOMBEARWEN', null,'Arwen.foncombe@ring.fr');
insert into rap_client values ('1213','LEGRIS','Gandalf','LEGRISGANDALF', null,'gandalf.legris@ring.fr');
insert into rap_client values ('1234','FONCOMBE','Aragorn','FONCOMBEARAGON', null,'grand_pas@ring.fr');
insert into rap_client values ('1239','BORNE','Elisabeth','BORNEELISABETH', null,'Bab_borne@algo.fr');

REM INSERTING into RAP_ADMINISTRATEUR
SET DEFINE OFF;
insert into rap_administrateur (admin_num, cli_num) values ('1', '124');

REM INSERTING into RAP_FIDELISATION
SET DEFINE OFF;
insert into rap_fidelisation values ('1','25/12/2022','2515');
insert into rap_fidelisation values ('2','26/12/2022','3012');
insert into rap_fidelisation values ('124','01/02/2024','829');
insert into rap_fidelisation values ('124','13/05/2024','1005');
insert into rap_fidelisation values ('124','13/09/2024','970');
insert into rap_fidelisation values ('124','29/03/2025','993');
insert into rap_fidelisation values ('139','13/04/2024','1151');
insert into rap_fidelisation values ('139','16/07/2024','1197');
insert into rap_fidelisation values ('139','15/10/2024','917');
insert into rap_fidelisation values ('139','10/12/2024','512');
insert into rap_fidelisation values ('246','15/01/2024','995');
insert into rap_fidelisation values ('246','15/04/2024','1163');
insert into rap_fidelisation values ('246','01/04/2025','951');
insert into rap_fidelisation values ('246','02/04/2025','1191');
insert into rap_fidelisation values ('249','14/07/2024','931');
insert into rap_fidelisation values ('249','15/03/2025','226');
insert into rap_fidelisation values ('249','29/03/2025','494');
insert into rap_fidelisation values ('249','31/03/2025','662');
insert into rap_fidelisation values ('249','01/04/2025','870');
insert into rap_fidelisation values ('261','14/07/2024','1850');
insert into rap_fidelisation values ('261','10/10/2024','1594');
insert into rap_fidelisation values ('261','19/03/2025','787');
insert into rap_fidelisation values ('261','23/03/2025','1039');
insert into rap_fidelisation values ('261','24/03/2025','1209');
insert into rap_fidelisation values ('261','01/04/2025','1214');
insert into rap_fidelisation values ('269','10/02/2025','634');
insert into rap_fidelisation values ('1058','12/01/2025','129');
insert into rap_fidelisation values ('1058','15/03/2025','234');
insert into rap_fidelisation values ('984','13/04/2024','430');
insert into rap_fidelisation values ('984','15/09/2024','588');
insert into rap_fidelisation values ('984','10/12/2024','756');
insert into rap_fidelisation values ('984','12/01/2025','932');
insert into rap_fidelisation values ('998','10/01/2024','853');
insert into rap_fidelisation values ('998','13/05/2024','1105');
insert into rap_fidelisation values ('998','15/10/2024','151');
insert into rap_fidelisation values ('1001','15/09/2024','980');
insert into rap_fidelisation values ('1001','13/09/2024','1015');
insert into rap_fidelisation values ('1001','10/02/2025','1050');
insert into rap_fidelisation values ('1001','26/03/2025','594');
insert into rap_fidelisation values ('1008','01/02/2024','101');
insert into rap_fidelisation values ('1008','15/04/2024','196');
insert into rap_fidelisation values ('1008','16/05/2024','291');
insert into rap_fidelisation values ('1008','16/07/2024','411');
insert into rap_fidelisation values ('1008','10/10/2024','506');
insert into rap_fidelisation values ('1008','15/03/2025','611');
insert into rap_fidelisation values ('1034','16/06/2024','743');
insert into rap_fidelisation values ('1034','10/03/2025','963');
insert into rap_fidelisation values ('1034','26/03/2025','1051');
insert into rap_fidelisation values ('1041','16/12/2024','50');
insert into rap_fidelisation values ('1041','11/03/2025','180');
insert into rap_fidelisation values ('1041','27/03/2025','310');
insert into rap_fidelisation values ('1052','10/01/2024','430');
insert into rap_fidelisation values ('1052','16/05/2024','600');
insert into rap_fidelisation values ('1052','13/03/2025','648');
insert into rap_fidelisation values ('1059','13/03/2025','1250');
insert into rap_fidelisation values ('1070','01/09/2024','1315');
insert into rap_fidelisation values ('1070','15/11/2024','447');
insert into rap_fidelisation values ('1070','22/03/2025','615');
insert into rap_fidelisation values ('1074','13/03/2025','108');
insert into rap_fidelisation values ('1076','13/03/2025','398');
insert into rap_fidelisation values ('1076','24/03/2025','468');
insert into rap_fidelisation values ('1078','13/03/2025','905');
insert into rap_fidelisation values ('1079','16/01/2025','120');
insert into rap_fidelisation values ('1079','28/03/2025','190');
insert into rap_fidelisation values ('1079','29/03/2025','220');
insert into rap_fidelisation values ('1120','28/09/2024','830');
insert into rap_fidelisation values ('1120','28/03/2025','862');



REM INSERTING into RAP_PLAT
SET DEFINE OFF;
insert into rap_plat values ('0','pas de dessert','0','0','0','5,5','0','0','0', 'pas de dessert');
insert into rap_plat values ('1','Coeur Fondant au chocolat','0','2,3','0,5','5,5','0','8','3', ' Fondant au chocolat');
insert into rap_plat values ('2','Tiramisu','0','2','0,6','5,5','0','8','0', 'Tiramisu');
insert into rap_plat values ('3','Magnum classic','0','2','0,7','5,5','0','8','0', 'un plat');
insert into rap_plat values ('4','Magnum vanille','0','2','0,7','5,5','0','8','0', 'un plat');
insert into rap_plat values ('5','Magnum chocolat','0','2','0,7','5,5','0','8','0', 'un plat');
insert into rap_plat values ('10','Eau plate 33 cl','0','0,8','0,1','5,5','0','5','0','un plat');
insert into rap_plat values ('20','Eau gazeuse 25 cl','0','1,1','0,3','5,5','0','5','0', 'un plat');
insert into rap_plat values ('30','C3 cola 33 cl','0','1,3','0,1','5,5','0','5','0', 'un plat');
insert into rap_plat values ('40','Jus d''orange 25 cl','0','0,9','0,2','5,5','0','5','0', 'un plat');
insert into rap_plat values ('50','Britel Dï¿½lices 25 cl','0','1,3','0,25','5,5','0','5','0', 'un plat');
insert into rap_plat values ('60','Dronembourg 33 cl','0','1,5','0,35','20','0','5','0', 'un plat');
insert into rap_plat values ('100','Salade','0','1','0,2','5,5','0','6','0', 'un plat');
insert into rap_plat values ('200','Petite Frites natures','0','1,4','0,3','5,5','0','5','6', 'un plat');
insert into rap_plat values ('300','Petite Frites Ketchup','0','1,4','0,3','5,5','0','5','6', 'un plat');
insert into rap_plat values ('400','Petite Frites Mayonnaise','0','1,4','0,3','5,5','0','5','6', 'un plat');
insert into rap_plat values ('500','Petite Frites Moutarde','0','1,4','0,3','5,5','0','5','6', 'un plat');
insert into rap_plat values ('600','Moyenne Frites natures','0','1,8','0,35','5,5','0','6','6', 'un plat');
insert into rap_plat values ('700','Moyenne Frites Ketchup','0','1,8','0,35','5,5','0','6','6', 'un plat');
insert into rap_plat values ('800','Moyenne Frites Mayonnaise','0','1,8','0,35','5,5','0','6','6', 'un plat');
insert into rap_plat values ('900','Moyenne Frites Moutarde','0','1,8','0,35','5,5','0','6','6', 'un plat');
insert into rap_plat values ('A00','Grande Frites natures','0','2,1','0,4','5,5','0','7','6', 'un plat');
insert into rap_plat values ('B00','Grande Frites Ketchup','0','2,1','0,4','5,5','0','7','6', 'un plat');
insert into rap_plat values ('C00','Grande Frites Mayonnaise','0','2,1','0,4','5,5','0','7','6', 'un plat');
insert into rap_plat values ('D00','Grande Frites Moutarde','0','2,1','0,4','5,5','0','7','6', 'un plat');
insert into rap_plat values ('1000','Kebab sauce blanche','0','5,5','1,8','5,5','0','16','7', 'un plat');
insert into rap_plat values ('2000','Kebab sauce algï¿½rienne','0','5,5','1,8','5,5','0','16','7', 'un plat');
insert into rap_plat values ('3000','Kebab sauce samouraï¿½','0','5,5','1,8','5,5','0','16','7', 'un plat');
insert into rap_plat values ('4000','Kebab sauce barbecue','0','5,5','1,8','5,5','0','16','7', 'un plat');
insert into rap_plat values ('5000','Kebab royal sauce blanche','0','6,8','2,2','5,5','0','23','7', 'un plat');
insert into rap_plat values ('6000','Kebab royal sauce algï¿½rienne','0','6,8','2,2','5,5','0','23','7', 'un plat');
insert into rap_plat values ('7000','Kebab royal sauce samouraï¿½','0','6,8','2,2','5,5','0','23','7', 'un plat');
insert into rap_plat values ('8000','Kebab royal sauce barbecue','0','6,8','2,2','5,5','0','23','7', 'un plat');
insert into rap_plat values ('9000','Pizza Margherita (moyenne)','0','5,8','1,1','5,5','0','16','7', 'un plat');
insert into rap_plat values ('A000','Pizza Margherita (grande)','0','6,8','1,25','5,5','0','23','7', 'un plat');
insert into rap_plat values ('B000','Pizza 4 fromages (moyenne)','0','5,8','1,1','5,5','0','16','7', 'une pizza 4 fromage de taille moyenne');
insert into rap_plat values ('C000','Pizza 4 fromages (grande)','0','6,8','1,25','5,5','0','23','7', 'une pizza 4 fromage');
insert into rap_plat values ('D000','Pizza Tour de France','0','7','1,5','5,5','0','30','7', 'une pizza');
insert into rap_plat values ('9A10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9A20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9A30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9A40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9A50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9A60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9B10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9B20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9B30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9B40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9B50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9B60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9C10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9C20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9C30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9C40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9C50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9C60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9D10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9D20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9D30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9D40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9D50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9D60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9110','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9120','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9130','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9140','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9150','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9160','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9210','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9220','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9230','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9240','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9250','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9260','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9310','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9320','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9330','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9340','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9350','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9360','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9410','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9420','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9430','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9440','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9450','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9460','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9510','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9520','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9530','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9540','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9550','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9560','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9610','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9620','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9630','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9640','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9650','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9660','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9710','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9720','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9730','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9740','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9750','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9760','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9810','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9820','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9830','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9840','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9850','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9860','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9910','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9920','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9930','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9940','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9950','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('9960','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AA10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AA20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AA30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AA40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AA50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AA60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AB10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AB20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AB30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AB40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AB50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AB60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AC10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AC20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AC30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AC40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AC50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AC60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AD10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AD20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AD30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AD40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AD50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('AD60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A110','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A120','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A130','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A140','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A150','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A160','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A210','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A220','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A230','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A240','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A250','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A260','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A310','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A320','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A330','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A340','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A350','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A360','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A410','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A420','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A430','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A440','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A450','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A460','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A510','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A520','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A530','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A540','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A550','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A560','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A610','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A620','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A630','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A640','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A650','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A660','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A710','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A720','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A730','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A740','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A750','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A760','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A810','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A820','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A830','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A840','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A850','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A860','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A910','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A920','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A930','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A940','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A950','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('A960','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BA10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BA20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BA30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BA40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BA50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BA60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BB10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BB20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BB30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BB40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BB50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BB60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BC10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BC20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BC30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BC40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BC50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BC60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BD10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BD20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BD30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BD40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BD50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('BD60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B110','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B120','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B130','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B140','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B150','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B160','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B210','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B220','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B230','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B240','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B250','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B260','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B310','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B320','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B330','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B340','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B350','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B360','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B410','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B420','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B430','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B450','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B460','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B510','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B520','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B530','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B540','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B550','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B560','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B610','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B620','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B630','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B640','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B650','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B660','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B710','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B720','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B730','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B740','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B750','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B760','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B810','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B820','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B830','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B840','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B850','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B860','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B910','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B920','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B930','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B940','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B950','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('B960','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CA10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CA20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CA30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CA40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CA50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CA60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CB10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CB20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CB30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CB40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CB50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CB60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CC10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CC20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CC30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CC40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CC50','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CC60','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CD10','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CD20','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CD30','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('CD40','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');
insert into rap_plat values ('C960','Pizza Ping','1','9,5','3,2','5,5','0','35','8', 'un menu');

insert into rap_plat values ('9A11','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A12','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A13','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A14','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A15','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A21','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A22','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A23','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A24','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A25','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A31','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A32','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A33','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A34','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A35','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A41','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A42','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A43','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A44','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A45','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A51','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A52','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A53','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A54','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A55','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A61','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A62','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A63','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A64','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9A65','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B11','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B12','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B13','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B14','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B15','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B21','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B22','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B23','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B24','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B25','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B31','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B32','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B33','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B34','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B35','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B41','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B42','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B43','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B44','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B45','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B51','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B52','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B53','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'un menu');
insert into rap_plat values ('9B54','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9B55','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9B61','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9B62','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9B63','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9B64','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9B65','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C11','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C12','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C13','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C14','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C15','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C21','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C22','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C23','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C24','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C25','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C31','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C32','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C33','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C34','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C35','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C41','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C42','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C43','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C44','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C45','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C51','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C52','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C53','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C54','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C55','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C61','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C62','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C63','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C64','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9C65','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D11','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D12','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D13','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D14','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D15','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D21','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D22','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D23','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D24','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D25','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D31','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D32','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D33','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D34','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D35','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D41','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D42','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D43','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D44','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D45','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D51','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D52','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D53','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D54','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D55','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D61','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D62','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D63','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D64','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9D65','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9111','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9112','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9113','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9114','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9115','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9121','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9122','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9123','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9124','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9125','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9131','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9132','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9133','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9134','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9135','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9141','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9142','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9143','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9144','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9145','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9151','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9152','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9153','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9154','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9155','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9161','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9162','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9163','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9164','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9165','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9211','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9212','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9213','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9214','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9215','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9221','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9222','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9223','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9224','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9225','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9231','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9232','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9233','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9234','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9235','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9241','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9242','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9243','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9244','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9245','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9251','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9252','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9253','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9254','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9255','Pizza Rathoustra','1','12','4,8','5,5','0','44','8','Menu Standard');
insert into rap_plat values ('9261','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9262','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9263','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9264','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9265','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9311','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9312','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9313','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9314','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9315','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9321','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9322','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9323','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9324','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9325','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9331','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9332','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9333','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9334','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9335','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9341','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9342','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9343','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9344','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9345','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9351','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9352','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9353','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9354','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9355','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9361','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9362','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9363','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9364','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9365','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9411','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9412','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9413','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9414','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');
insert into rap_plat values ('9415','Pizza Rathoustra','1','12','4,8','5,5','0','44','8', 'Menu Standard');


REM INSERTING into RAP_BOISSON
SET DEFINE OFF;
insert into rap_boisson values ('10');
insert into rap_boisson values ('20');
insert into rap_boisson values ('30');
insert into rap_boisson values ('40');
insert into rap_boisson values ('50');
insert into rap_boisson values ('60');

REM INSERTING into RAP_DESSERT
SET DEFINE OFF;
insert into rap_dessert values ('0');
insert into rap_dessert values ('1');
insert into rap_dessert values ('2');
insert into rap_dessert values ('3');
insert into rap_dessert values ('4');
insert into rap_dessert values ('5');

REM INSERTING into RAP_LEGUME
SET DEFINE OFF;
insert into rap_legume values ('100');
insert into rap_legume values ('200');
insert into rap_legume values ('300');
insert into rap_legume values ('400');
insert into rap_legume values ('500');
insert into rap_legume values ('600');
insert into rap_legume values ('700');
insert into rap_legume values ('800');
insert into rap_legume values ('900');
insert into rap_legume values ('A00');
insert into rap_legume values ('B00');
insert into rap_legume values ('C00');
insert into rap_legume values ('D00');

REM INSERTING into RAP_KEBAB
SET DEFINE OFF;
insert into rap_kebab values ('1000');
insert into rap_kebab values ('2000');
insert into rap_kebab values ('3000');
insert into rap_kebab values ('4000');
insert into rap_kebab values ('5000');
insert into rap_kebab values ('6000');
insert into rap_kebab values ('7000');
insert into rap_kebab values ('8000');

REM INSERTING into RAP_PIZZA
SET DEFINE OFF;
insert into rap_pizza values ('9000','1');
insert into rap_pizza values ('A000','2');
insert into rap_pizza values ('B000','1');
insert into rap_pizza values ('C000','2');
insert into rap_pizza values ('D000','2');

REM INSERTING into RAP_RESTAURANT
SET DEFINE OFF;
insert into rap_restaurant values ('1','4 rue des Chanoines', '14000', 'Caen');
insert into rap_restaurant values ('2','5 avenue du 6 juin', '14000', 'Caen');

REM INSERTING into RAP_COMMANDE
SET DEFINE OFF;
insert into rap_commande values ('2','54','1','25/12/2022',to_date('00:00:01','hh24:mi:ss'),'7,18','0','0','15');
insert into rap_commande values ('2','55','2','26/12/2022',to_date('12:15:00','hh24:mi:ss'),'43,88','0','0','35');
insert into rap_commande values ('1','315','0','08/01/2024',to_date('19:50:00','hh24:mi:ss'),'14,78','0','0','35');
insert into rap_commande values ('1','395','0','09/01/2024',to_date('21:40:00','hh24:mi:ss'),'12,24','0','0','20');
insert into rap_commande values ('1','465','0','10/01/2024',to_date('19:30:00','hh24:mi:ss'),'23,2','0','5','8');
insert into rap_commande values ('1','467','0','10/01/2024',to_date('19:59:00','hh24:mi:ss'),'55,68','0','0','25');
insert into rap_commande values ('1','479','0','15/01/2024',to_date('22:55:00','hh24:mi:ss'),'27,84','0','0','8');
insert into rap_commande values ('1','510','0','01/02/2024',to_date('23:50:00','hh24:mi:ss'),'37,12','0','0','0');
insert into rap_commande values ('1','531','0','13/04/2024',to_date('18:50:00','hh24:mi:ss'),'30,06','0','0','0');
insert into rap_commande values ('1','561','0','15/04/2024',to_date('22:50:00','hh24:mi:ss'),'30,06','0','0','35');
insert into rap_commande values ('1','606','0','13/05/2024',to_date('21:20:00','hh24:mi:ss'),'21,51','0','0','8');
insert into rap_commande values ('1','699','0','16/05/2024',to_date('21:35:00','hh24:mi:ss'),'35,85','0','0','20');
insert into rap_commande values ('1','702','0','16/06/2024',to_date('22:25:00','hh24:mi:ss'),'14,34','0','3','15');
insert into rap_commande values ('1','899','0','14/07/2024',to_date('19:10:00','hh24:mi:ss'),'29','0','0','0');
insert into rap_commande values ('1','1051','0','16/07/2024',to_date('20:20:00','hh24:mi:ss'),'28,68','0','0','0');
insert into rap_commande values ('1','1052','0','16/07/2024',to_date('20:30:00','hh24:mi:ss'),'14,56','0','0','8');
insert into rap_commande values ('1','2461','0','15/09/2024',to_date('20:00:00','hh24:mi:ss'),'14,34','0','0','10');
insert into rap_commande values ('1','2462','0','15/09/2024',to_date('20:15:00','hh24:mi:ss'),'15,41','0','2','8');
insert into rap_commande values ('1','2811','0','28/09/2024',to_date('19:30:00','hh24:mi:ss'),'18,56','0','0','0');
insert into rap_commande values ('1','3047','0','15/10/2024',to_date('22:30:00','hh24:mi:ss'),'25,95','0','2','20');
insert into rap_commande values ('1','3048','0','15/10/2024',to_date('23:00:00','hh24:mi:ss'),'46,4','0','0','30');
insert into rap_commande values ('1','3245','0','15/11/2024',to_date('19:55:00','hh24:mi:ss'),'9,19','0','0','8');
insert into rap_commande values ('2','3645','0','16/12/2024',to_date('21:16:00','hh24:mi:ss'),'37,98','0','0','8');
insert into rap_commande values ('2','3661','0','12/01/2025',to_date('20:02:00','hh24:mi:ss'),'7,18','0','0','10');
insert into rap_commande values ('1','4002','0','10/12/2024',to_date('20:25:00','hh24:mi:ss'),'24,26','0','0','15');
insert into rap_commande values ('2','4150','0','16/01/2025',to_date('23:42:00','hh24:mi:ss'),'14,56','0','0','8');
insert into rap_commande values ('1','4651','0','16/12/2024',to_date('21:15:00','hh24:mi:ss'),'37,98','0','0','8');
insert into rap_commande values ('2','5004','0','10/02/2025',to_date('22:18:00','hh24:mi:ss'),'48,42','0','3','8');
insert into rap_commande values ('1','5979','0','12/01/2025',to_date('20:00:00','hh24:mi:ss'),'7,18','0','0','10');
insert into rap_commande values ('2','6230','0','10/03/2025',to_date('21:12:00','hh24:mi:ss'),'11,6','0','0','8');
insert into rap_commande values ('1','6245','0','16/01/2025',to_date('23:40:00','hh24:mi:ss'),'14,56','0','0','8');
insert into rap_commande values ('1','6350','0','10/02/2025',to_date('22:15:00','hh24:mi:ss'),'48,42','0','3','8');
insert into rap_commande values ('2','6852','0','12/03/2025',to_date('20:45:00','hh24:mi:ss'),'15,41','0','6','8');
insert into rap_commande values ('1','7001','0','10/03/2025',to_date('21:10:00','hh24:mi:ss'),'11,6','0','0','8');
insert into rap_commande values ('2','7001','0','13/03/2025',to_date('19:30:00','hh24:mi:ss'),'24,26','0','4','8');
insert into rap_commande values ('2','7049','0','13/03/2025',to_date('20:40:00','hh24:mi:ss'),'24,26','0','4','20');
insert into rap_commande values ('2','7052','0','13/03/2025',to_date('22:10:00','hh24:mi:ss'),'24,26','0','0','0');
insert into rap_commande values ('2','7068','0','13/03/2025',to_date('23:20:00','hh24:mi:ss'),'8,23','0','0','8');
insert into rap_commande values ('2','7069','0','13/03/2025',to_date('23:38:00','hh24:mi:ss'),'14,56','0','0','8');
insert into rap_commande values ('1','7511','0','11/03/2025',to_date('20:40:00','hh24:mi:ss'),'15,41','0','6','8');
insert into rap_commande values ('2','7680','0','15/03/2025',to_date('20:40:00','hh24:mi:ss'),'14,56','0','0','35');
insert into rap_commande values ('1','7861','0','13/03/2025',to_date('19:15:00','hh24:mi:ss'),'24,26','0','4','8');
insert into rap_commande values ('1','7896','0','13/03/2025',to_date('20:45:00','hh24:mi:ss'),'24,26','0','4','20');
insert into rap_commande values ('1','7999','0','13/03/2025',to_date('22:00:00','hh24:mi:ss'),'24,26','0','0','0');
insert into rap_commande values ('1','8012','0','13/03/2025',to_date('23:25:00','hh24:mi:ss'),'8,23','0','0','8');
insert into rap_commande values ('1','8013','0','13/03/2025',to_date('23:35:00','hh24:mi:ss'),'14,56','0','0','8');
insert into rap_commande values ('2','8065','0','15/03/2025',to_date('22:10:00','hh24:mi:ss'),'20,68','0','0','0');
insert into rap_commande values ('2','8067','0','15/03/2025',to_date('22:12:00','hh24:mi:ss'),'63,3','0','0','8');
insert into rap_commande values ('1','8509','0','15/03/2025',to_date('20:20:00','hh24:mi:ss'),'14,56','0','0','35');
insert into rap_commande values ('1','9403','0','19/03/2025',to_date('22:15:00','hh24:mi:ss'),'20,68','0','0','0');
insert into rap_commande values ('1','9404','0','19/03/2025',to_date('22:15:00','hh24:mi:ss'),'63,3','0','0','8');
insert into rap_commande values ('2','9625','0','17/03/2025',to_date('19:40:00','hh24:mi:ss'),'37,98','0','0','8');
insert into rap_commande values ('1','10031','0','22/03/2025',to_date('19:20:00','hh24:mi:ss'),'37,98','0','0','8');
insert into rap_commande values ('2','10120','0','22/03/2025',to_date('22:40:00','hh24:mi:ss'),'7,17','0','1','15');
insert into rap_commande values ('1','10636','0','24/03/2025',to_date('22:30:00','hh24:mi:ss'),'7,17','0','1','15');
insert into rap_commande values ('1','11121','0','26/03/2025',to_date('21:10:00','hh24:mi:ss'),'14,56','0','0','8');
insert into rap_commande values ('2','11121','0','24/03/2025',to_date('21:00:00','hh24:mi:ss'),'14,56','0','0','8');
insert into rap_commande values ('1','11264','0','26/03/2025',to_date('21:55:00','hh24:mi:ss'),'36,39','0','0','2');
insert into rap_commande values ('1','11946','0','27/03/2025',to_date('20:45:00','hh24:mi:ss'),'7,17','0','0','8');
insert into rap_commande values ('1','12361','0','28/03/2025',to_date('23:55:00','hh24:mi:ss'),'29,96','0','0','8');
insert into rap_commande values ('1','13088','0','28/03/2025',to_date('19:50:00','hh24:mi:ss'),'14,56','0','0','45');
insert into rap_commande values ('1','13110','0','28/03/2025',to_date('21:20:00','hh24:mi:ss'),'13,19','0','0','45');
insert into rap_commande values ('1','13112','0','28/03/2025',to_date('21:26:00','hh24:mi:ss'),'23,2','0','0','45');
insert into rap_commande values ('1','13113','0','28/03/2025',to_date('21:38:00','hh24:mi:ss'),'14,56','0','0','45');
insert into rap_commande values ('1','13114','0','28/03/2025',to_date('21:45:00','hh24:mi:ss'),'23,2','0','0','45');
insert into rap_commande values ('1','13116','0','28/03/2025',to_date('21:56:00','hh24:mi:ss'),'8,55','0','0','45');
insert into rap_commande values ('2','480','124','01/02/2024',to_date('23:39:00','hh24:mi:ss'),'7,18','0','0','15');
insert into rap_commande values ('2','602','124','13/05/2024',to_date('20:50:00','hh24:mi:ss'),'47,64','0','3','40');
insert into rap_commande values ('2','2090','124','13/09/2024',to_date('20:15:00','hh24:mi:ss'),'2,02','1','7','8');
insert into rap_commande values ('1','13125','124','29/03/2025',to_date('18:45:00','hh24:mi:ss'),'7,17','0','0','7');
insert into rap_commande values ('2','530','139','13/04/2024',to_date('18:30:00','hh24:mi:ss'),'42,88','0','1','35');
insert into rap_commande values ('2','1020','139','16/07/2024',to_date('20:10:00','hh24:mi:ss'),'8,34','0','6','5');
insert into rap_commande values ('2','3000','139','15/10/2024',to_date('22:10:00','hh24:mi:ss'),'15,96','4','10','50');
insert into rap_commande values ('2','3621','139','10/12/2024',to_date('20:00:00','hh24:mi:ss'),'9','5','11','40');
insert into rap_commande values ('1','480','246','15/01/2024',to_date('23:00:00','hh24:mi:ss'),'32,18','0','0','5');
insert into rap_commande values ('2','545','246','15/04/2024',to_date('22:30:00','hh24:mi:ss'),'44,42','0','2','16');
insert into rap_commande values ('2','20202','246','01/04/2025',to_date('19:35:00','hh24:mi:ss'),'13,32','3','9','5');
insert into rap_commande values ('1','13150','246','02/04/2025',to_date('20:50:00','hh24:mi:ss'),'59,09','0','0','28');
insert into rap_commande values ('1','898','249','14/07/2024',to_date('19:00:00','hh24:mi:ss'),'7,18','0','0','0');
insert into rap_commande values ('2','7689','249','15/03/2025',to_date('20:45:00','hh24:mi:ss'),'3','8','14','5');
insert into rap_commande values ('2','15185','249','29/03/2025',to_date('20:45:00','hh24:mi:ss'),'70,26','0','0','10');
insert into rap_commande values ('2','18022','249','31/03/2025',to_date('20:45:00','hh24:mi:ss'),'44,42','0','2','16');
insert into rap_commande values ('2','20203','249','01/04/2025',to_date('19:40:00','hh24:mi:ss'),'45,28','0','10','50');
insert into rap_commande values ('2','850','261','14/07/2024',to_date('19:00:00','hh24:mi:ss'),'86,67','0','5','0');
insert into rap_commande values ('2','2980','261','10/10/2024',to_date('20:45:00','hh24:mi:ss'),'0,66','3','9','5');
insert into rap_commande values ('1','9402','261','19/03/2025',to_date('22:10:00','hh24:mi:ss'),'38,42','10','0','15');
insert into rap_commande values ('2','11800','261','23/03/2025',to_date('18:30:00','hh24:mi:ss'),'66,35','0','0','0');
insert into rap_commande values ('2','11840','261','24/03/2025',to_date('21:50:00','hh24:mi:ss'),'43,48','0','4','10');
insert into rap_commande values ('2','20201','261','01/04/2025',to_date('19:30:00','hh24:mi:ss'),'22,06','1','7','8');
insert into rap_commande values ('2','5002','269','10/02/2025',to_date('22:10:00','hh24:mi:ss'),'24,94','7','13','8');
insert into rap_commande values ('2','3660','1058','12/01/2025',to_date('20:15:00','hh24:mi:ss'),'7','6','12','25');
insert into rap_commande values ('2','7804','1058','15/03/2025',to_date('21:10:00','hh24:mi:ss'),'15,06','0','15','10');
insert into rap_commande values ('1','530','984','13/04/2024',to_date('18:30:00','hh24:mi:ss'),'70,26','0','0','35');
insert into rap_commande values ('1','2460','984','15/09/2024',to_date('19:50:00','hh24:mi:ss'),'41,88','0','2','30');
insert into rap_commande values ('1','4001','984','10/12/2024',to_date('20:00:00','hh24:mi:ss'),'46,42','0','0','40');
insert into rap_commande values ('1','5980','984','12/01/2025',to_date('20:15:00','hh24:mi:ss'),'50,64','0','0','25');
insert into rap_commande values ('1','466','998','10/01/2024',to_date('19:50:00','hh24:mi:ss'),'47,48','0','0','10');
insert into rap_commande values ('1','605','998','13/05/2024',to_date('20:50:00','hh24:mi:ss'),'66,35','0','0','40');
insert into rap_commande values ('1','3046','998','15/10/2024',to_date('22:10:00','hh24:mi:ss'),'4,34','10','0','50');
insert into rap_commande values ('2','2120','1001','15/09/2024',to_date('19:50:00','hh24:mi:ss'),'2,14','2','8','30');
insert into rap_commande values ('1','2308','1001','13/09/2024',to_date('20:15:00','hh24:mi:ss'),'10,02','0','0','8');
insert into rap_commande values ('1','6349','1001','10/02/2025',to_date('22:10:00','hh24:mi:ss'),'9,14','0','3','8');
insert into rap_commande values ('1','11120','1001','26/03/2025',to_date('21:10:00','hh24:mi:ss'),'7,66','5','0','10');
insert into rap_commande values ('1','509','1008','01/02/2024',to_date('23:40:00','hh24:mi:ss'),'29,96','0','0','15');
insert into rap_commande values ('1','560','1008','15/04/2024',to_date('22:30:00','hh24:mi:ss'),'25','0','0','16');
insert into rap_commande values ('1','700','1008','16/05/2024',to_date('21:50:00','hh24:mi:ss'),'25','0','0','10');
insert into rap_commande values ('1','1050','1008','16/07/2024',to_date('20:10:00','hh24:mi:ss'),'44,94','0','0','5');
insert into rap_commande values ('1','3020','1008','10/10/2024',to_date('20:45:00','hh24:mi:ss'),'25','0','0','5');
insert into rap_commande values ('1','8510','1008','15/03/2025',to_date('20:45:00','hh24:mi:ss'),'30,06','0','0','5');
insert into rap_commande values ('1','701','1034','16/06/2024',to_date('22:10:00','hh24:mi:ss'),'37,98','0','0','5');
insert into rap_commande values ('1','7000','1034','10/03/2025',to_date('20:50:00','hh24:mi:ss'),'88,62','0','0','20');
insert into rap_commande values ('1','11265','1034','26/03/2025',to_date('22:00:00','hh24:mi:ss'),'25,32','0','0','30');
insert into rap_commande values ('1','4650','1041','16/12/2024',to_date('20:45:00','hh24:mi:ss'),'4,98','10','0','30');
insert into rap_commande values ('1','7512','1041','11/03/2025',to_date('20:45:00','hh24:mi:ss'),'27,54','0','6','35');
insert into rap_commande values ('1','11945','1041','27/03/2025',to_date('20:45:00','hh24:mi:ss'),'33,54','0','0','10');
insert into rap_commande values ('2','420','1052','10/01/2024',to_date('19:51:00','hh24:mi:ss'),'70,26','0','0','10');
insert into rap_commande values ('2','704','1052','16/05/2024',to_date('21:50:00','hh24:mi:ss'),'43,48','0','4','10');
insert into rap_commande values ('1','7897','1052','13/03/2025',to_date('21:30:00','hh24:mi:ss'),'17,4','0','0','13');
insert into rap_commande values ('1','8010','1059','13/03/2025',to_date('23:10:00','hh24:mi:ss'),'40,94','0','4','8');
insert into rap_commande values ('1','2030','1070','01/09/2024',to_date('20:45:00','hh24:mi:ss'),'66,35','0','0','8');
insert into rap_commande values ('1','3246','1070','15/11/2024',to_date('20:00:00','hh24:mi:ss'),'27,98','10','0','5');
insert into rap_commande values ('1','10030','1070','22/03/2025',to_date('19:15:00','hh24:mi:ss'),'46,42','0','0','5');
insert into rap_commande values ('1','7860','1074','13/03/2025',to_date('19:00:00','hh24:mi:ss'),'3,82','0','4','5');
insert into rap_commande values ('1','7898','1076','13/03/2025',to_date('21:45:00','hh24:mi:ss'),'30,06','0','0','30');
insert into rap_commande values ('1','10635','1076','24/03/2025',to_date('22:20:00','hh24:mi:ss'),'19,04','0','1','20');
insert into rap_commande values ('1','8011','1078','13/03/2025',to_date('23:10:00','hh24:mi:ss'),'75,96','0','0','20');
insert into rap_commande values ('1','6246','1079','16/01/2025',to_date('23:55:00','hh24:mi:ss'),'22,18','10','0','30');
insert into rap_commande values ('1','13089','1079','28/03/2025',to_date('20:00:00','hh24:mi:ss'),'20,04','0','0','5');
insert into rap_commande values ('1','13139','1079','29/03/2025',to_date('20:10:00','hh24:mi:ss'),'7,39','0','0','7');
insert into rap_commande values ('1','2810','1120','28/09/2024',to_date('19:30:00','hh24:mi:ss'),'75,96','0','0','5');
insert into rap_commande values ('1','13090','1120','28/03/2025',to_date('21:15:00','hh24:mi:ss'),'12,24','0','0','15');



REM INSERTING into RAP_APPARTENIR
SET DEFINE OFF;
insert into rap_appartenir values ('2','54','D00','2');
insert into rap_appartenir values ('2','55','9A45','1');
insert into rap_appartenir values ('1','315','D000','2');
insert into rap_appartenir values ('1','395','9000','1');
insert into rap_appartenir values ('1','465','1000','1');
insert into rap_appartenir values ('1','467','1240','2');
insert into rap_appartenir values ('1','479','2B40','1');
insert into rap_appartenir values ('1','510','3530','2');
insert into rap_appartenir values ('1','531','9320','1');
insert into rap_appartenir values ('1','561','B610','1');
insert into rap_appartenir values ('1','606','6000','1');
insert into rap_appartenir values ('1','699','8000','5');
insert into rap_appartenir values ('1','702','7000','2');
insert into rap_appartenir values ('1','899','3000','3');
insert into rap_appartenir values ('1','1051','2000','4');
insert into rap_appartenir values ('1','1052','D000','1');
insert into rap_appartenir values ('1','2461','9000','1');
insert into rap_appartenir values ('1','2462','1000','1');
insert into rap_appartenir values ('1','2811','3210','1');
insert into rap_appartenir values ('1','3047','3210','1');
insert into rap_appartenir values ('1','3048','4960','5');
insert into rap_appartenir values ('1','3245','D000','1');
insert into rap_appartenir values ('2','3645','9312','1');
insert into rap_appartenir values ('2','3661','D00','2');
insert into rap_appartenir values ('1','4002','5B60','2');
insert into rap_appartenir values ('2','4150','C000','1');
insert into rap_appartenir values ('1','4651','9312','1');
insert into rap_appartenir values ('2','5004','8914','3');
insert into rap_appartenir values ('1','5979','D00','2');
insert into rap_appartenir values ('2','6230','2000','2');
insert into rap_appartenir values ('1','6245','C000','1');
insert into rap_appartenir values ('1','6350','8914','3');
insert into rap_appartenir values ('2','6852','1000','1');
insert into rap_appartenir values ('1','7001','2000','2');
insert into rap_appartenir values ('2','7001','2C20','1');
insert into rap_appartenir values ('2','7049','6620','1');
insert into rap_appartenir values ('2','7052','7330','1');
insert into rap_appartenir values ('2','7068','D000','1');
insert into rap_appartenir values ('2','7069','3000','2');
insert into rap_appartenir values ('1','7511','1000','1');
insert into rap_appartenir values ('2','7680','3000','2');
insert into rap_appartenir values ('1','7861','2C20','1');
insert into rap_appartenir values ('1','7896','6620','1');
insert into rap_appartenir values ('1','7999','7330','1');
insert into rap_appartenir values ('1','8012','D000','1');
insert into rap_appartenir values ('1','8013','3000','2');
insert into rap_appartenir values ('2','8065','9000','1');
insert into rap_appartenir values ('2','8067','D711','5');
insert into rap_appartenir values ('1','8509','3000','2');
insert into rap_appartenir values ('1','9403','9000','1');
insert into rap_appartenir values ('1','9404','D711','5');
insert into rap_appartenir values ('2','9625','9312','1');
insert into rap_appartenir values ('1','10031','9312','1');
insert into rap_appartenir values ('2','10120','A000','1');
insert into rap_appartenir values ('1','10636','A000','1');
insert into rap_appartenir values ('1','11121','D000','1');
insert into rap_appartenir values ('2','11121','D000','1');
insert into rap_appartenir values ('1','11264','8A50','3');
insert into rap_appartenir values ('1','11946','A000','1');
insert into rap_appartenir values ('1','12361','5A23','2');
insert into rap_appartenir values ('1','13088','A000','1');
insert into rap_appartenir values ('1','13110','1000','1');
insert into rap_appartenir values ('1','13112','2000','2');
insert into rap_appartenir values ('1','13113','D000','1');
insert into rap_appartenir values ('1','13114','1000','1');
insert into rap_appartenir values ('1','13116','500','3');
insert into rap_appartenir values ('2','480','D00','2');
insert into rap_appartenir values ('2','602','9B31','4');
insert into rap_appartenir values ('2','2090','9A20','1');
insert into rap_appartenir values ('1','13125','C000','1');
insert into rap_appartenir values ('2','530','9A45','1');
insert into rap_appartenir values ('2','1020','7000','1');
insert into rap_appartenir values ('2','3000','5A25','2');
insert into rap_appartenir values ('2','3621','9320','1');
insert into rap_appartenir values ('1','480','9A10','2');
insert into rap_appartenir values ('2','545','9A45','1');
insert into rap_appartenir values ('2','20202','9A45','1');
insert into rap_appartenir values ('1','13150','D000','8');
insert into rap_appartenir values ('1','898','D00','2');
insert into rap_appartenir values ('2','7689','9320','1');
insert into rap_appartenir values ('2','15185','7265','2');
insert into rap_appartenir values ('2','18022','9A45','1');
insert into rap_appartenir values ('2','20203','5A25','2');
insert into rap_appartenir values ('2','850','8D30','3');
insert into rap_appartenir values ('2','2980','9A45','1');
insert into rap_appartenir values ('1','9402','8914','3');
insert into rap_appartenir values ('2','11800','8D30','3');
insert into rap_appartenir values ('2','11840','9A10','2');
insert into rap_appartenir values ('2','20201','9A20','3');
insert into rap_appartenir values ('2','5002','5752','2');
insert into rap_appartenir values ('2','3660','9320','1');
insert into rap_appartenir values ('2','7804','9160','1');
insert into rap_appartenir values ('1','530','7265','2');
insert into rap_appartenir values ('1','2460','9A45','1');
insert into rap_appartenir values ('1','4001','9A45','1');
insert into rap_appartenir values ('1','5980','9B31','4');
insert into rap_appartenir values ('1','466','9A10','2');
insert into rap_appartenir values ('1','605','8D30','3');
insert into rap_appartenir values ('1','3046','7000','1');
insert into rap_appartenir values ('2','2120','9A20','1');
insert into rap_appartenir values ('1','2308','9A20','1');
insert into rap_appartenir values ('1','6349','9A20','1');
insert into rap_appartenir values ('1','11120','9A45','1');
insert into rap_appartenir values ('1','509','5A25','2');
insert into rap_appartenir values ('1','560','9320','1');
insert into rap_appartenir values ('1','700','9320','1');
insert into rap_appartenir values ('1','1050','5752','2');
insert into rap_appartenir values ('1','3020','9320','1');
insert into rap_appartenir values ('1','8510','9160','1');
insert into rap_appartenir values ('1','701','9312','1');
insert into rap_appartenir values ('1','7000','9313','3');
insert into rap_appartenir values ('1','11265','AC32','1');
insert into rap_appartenir values ('1','4650','8822','1');
insert into rap_appartenir values ('1','7512','8824','1');
insert into rap_appartenir values ('1','11945','8824','1');
insert into rap_appartenir values ('2','420','7265','2');
insert into rap_appartenir values ('2','704','9A10','2');
insert into rap_appartenir values ('1','7897','1000','3');
insert into rap_appartenir values ('1','8010','8643','1');
insert into rap_appartenir values ('1','2030','8D30','3');
insert into rap_appartenir values ('1','3246','9312','1');
insert into rap_appartenir values ('1','10030','9A45','1');
insert into rap_appartenir values ('1','7860','500','2');
insert into rap_appartenir values ('1','7898','AD10','1');
insert into rap_appartenir values ('1','10635','A430','1');
insert into rap_appartenir values ('1','8011','D332','2');
insert into rap_appartenir values ('1','6246','9A10','2');
insert into rap_appartenir values ('1','13089','9160','1');
insert into rap_appartenir values ('1','13139','D000','1');
insert into rap_appartenir values ('1','2810','D711','6');
insert into rap_appartenir values ('1','13090','9000','1');

-- appartenir 2
insert into rap_appartenir values ('1','395','B000','1');
insert into rap_appartenir values ('1','465','2000','2');
insert into rap_appartenir values ('1','467','1250','1');
insert into rap_appartenir values ('1','479','2B50','2');
insert into rap_appartenir values ('1','510','3550','2');
insert into rap_appartenir values ('1','531','AA50','1');
insert into rap_appartenir values ('1','561','B620','1');
insert into rap_appartenir values ('1','606','7000','1');
insert into rap_appartenir values ('1','899','2000','2');
insert into rap_appartenir values ('1','1051','30','4');
insert into rap_appartenir values ('1','1052','9000','1');
insert into rap_appartenir values ('1','2461','8000','1');
insert into rap_appartenir values ('1','2462','D000','1');
insert into rap_appartenir values ('1','2811','3220','1');
insert into rap_appartenir values ('1','3047','4250','1');
insert into rap_appartenir values ('1','3245','60','1');
insert into rap_appartenir values ('2','3645','9814','1');
insert into rap_appartenir values ('2','3661','30','2');
insert into rap_appartenir values ('2','4150','D000','1');
insert into rap_appartenir values ('1','4651','9814','1');
insert into rap_appartenir values ('2','5004','5','1');
insert into rap_appartenir values ('1','5979','30','2');
insert into rap_appartenir values ('1','6245','D000','1');
insert into rap_appartenir values ('1','6350','5','1');
insert into rap_appartenir values ('2','6852','D000','1');
insert into rap_appartenir values ('2','7001','5A12','1');
insert into rap_appartenir values ('2','7049','6660','1');
insert into rap_appartenir values ('2','7052','7340','1');
insert into rap_appartenir values ('2','7068','10','1');
insert into rap_appartenir values ('2','7069','300','2');
insert into rap_appartenir values ('1','7511','D000','1');
insert into rap_appartenir values ('2','7680','300','2');
insert into rap_appartenir values ('1','7861','5A12','1');
insert into rap_appartenir values ('1','7896','6660','1');
insert into rap_appartenir values ('1','7999','7340','1');
insert into rap_appartenir values ('1','8012','10','1');
insert into rap_appartenir values ('1','8013','300','2');
insert into rap_appartenir values ('2','8065','D000','1');
insert into rap_appartenir values ('1','8509','300','2');
insert into rap_appartenir values ('1','9403','D000','1');
insert into rap_appartenir values ('2','9625','9814','1');
insert into rap_appartenir values ('1','10031','9814','1');
insert into rap_appartenir values ('1','11121','A000','1');
insert into rap_appartenir values ('2','11121','A000','1');
insert into rap_appartenir values ('1','13088','D000','1');
insert into rap_appartenir values ('1','13110','D000','1');
insert into rap_appartenir values ('1','13112','3000','2');
insert into rap_appartenir values ('1','13113','9000','1');
insert into rap_appartenir values ('1','13114','2000','2');
insert into rap_appartenir values ('1','13116','30','3');
insert into rap_appartenir values ('2','54','30','2');
insert into rap_appartenir values ('2','55','9B31','1');
insert into rap_appartenir values ('2','480','30','2');
insert into rap_appartenir values ('2','530','9B31','1');
insert into rap_appartenir values ('2','1020','8000','1');
insert into rap_appartenir values ('2','3621','5B24','1');
insert into rap_appartenir values ('1','480','100','2');
insert into rap_appartenir values ('2','545','AD54','1');
insert into rap_appartenir values ('2','20202','AD54','1');
insert into rap_appartenir values ('1','898','30','2');
insert into rap_appartenir values ('2','7689','5B24','1');
insert into rap_appartenir values ('2','15185','8965','1');
insert into rap_appartenir values ('2','18022','AD54','1');
insert into rap_appartenir values ('2','20203','9212','2');
insert into rap_appartenir values ('2','850','5B12','2');
insert into rap_appartenir values ('1','9402','5','1');
insert into rap_appartenir values ('2','11800','5B12','2');
insert into rap_appartenir values ('2','11840','100','2');
insert into rap_appartenir values ('2','5002','8965','1');
insert into rap_appartenir values ('2','3660','5B24','1');
insert into rap_appartenir values ('2','7804','AA10','1');
insert into rap_appartenir values ('1','530','8965','1');
insert into rap_appartenir values ('1','2460','9B31','1');
insert into rap_appartenir values ('1','4001','AD54','1');
insert into rap_appartenir values ('1','466','100','2');
insert into rap_appartenir values ('1','605','5B12','2');
insert into rap_appartenir values ('1','3046','8000','1');
insert into rap_appartenir values ('2','2120','100','2');
insert into rap_appartenir values ('1','6349','100','2');
insert into rap_appartenir values ('1','560','5B24','1');
insert into rap_appartenir values ('1','700','5B24','1');
insert into rap_appartenir values ('1','1050','8965','1');
insert into rap_appartenir values ('1','3020','5B24','1');
insert into rap_appartenir values ('1','8510','AA10','1');
insert into rap_appartenir values ('1','701','9814','1');
insert into rap_appartenir values ('1','7000','9814','1');
insert into rap_appartenir values ('1','11265','AC33','1');
insert into rap_appartenir values ('1','7512','1A20','1');
insert into rap_appartenir values ('1','11945','1A20','1');
insert into rap_appartenir values ('2','420','8965','1');
insert into rap_appartenir values ('2','704','100','2');
insert into rap_appartenir values ('1','8010','8644','1');
insert into rap_appartenir values ('1','2030','5B12','2');
insert into rap_appartenir values ('1','3246','AC45','2');
insert into rap_appartenir values ('1','10030','AD54','1');
insert into rap_appartenir values ('1','7860','1','2');
insert into rap_appartenir values ('1','7898','A430','1');
insert into rap_appartenir values ('1','10635','BB20','1');
insert into rap_appartenir values ('1','8011','D333','2');
insert into rap_appartenir values ('1','6246','100','2');
insert into rap_appartenir values ('1','13089','AA10','1');
insert into rap_appartenir values ('1','13090','B000','1');

-- appartenir 3
insert into rap_appartenir values ('1','465','3000','1');
insert into rap_appartenir values ('1','467','1260','3');
insert into rap_appartenir values ('1','531','BC10','1');
insert into rap_appartenir values ('1','561','B630','1');
insert into rap_appartenir values ('1','606','8000','1');
insert into rap_appartenir values ('1','2462','C00','1');
insert into rap_appartenir values ('1','3047','D000','1');
insert into rap_appartenir values ('2','3645','AD33','1');
insert into rap_appartenir values ('1','4651','AD33','1');
insert into rap_appartenir values ('2','5004','50','1');
insert into rap_appartenir values ('1','6350','50','1');
insert into rap_appartenir values ('2','6852','C00','1');
insert into rap_appartenir values ('1','7511','C00','1');
insert into rap_appartenir values ('2','8065','A000','1');
insert into rap_appartenir values ('1','9403','A000','1');
insert into rap_appartenir values ('2','9625','AD33','1');
insert into rap_appartenir values ('1','10031','AD33','1');
insert into rap_appartenir values ('1','13114','3000','1');
insert into rap_appartenir values ('2','55','1D20','2');
insert into rap_appartenir values ('2','530','1D20','2');
insert into rap_appartenir values ('1','480','9A20','1');
insert into rap_appartenir values ('2','545','5','10');
insert into rap_appartenir values ('2','15185','9212','2');
insert into rap_appartenir values ('2','18022','5','10');
insert into rap_appartenir values ('2','850','AC45','2');
insert into rap_appartenir values ('1','9402','50','1');
insert into rap_appartenir values ('2','11840','AC45','2');
insert into rap_appartenir values ('2','7804','B520','1');
insert into rap_appartenir values ('1','530','9212','2');
insert into rap_appartenir values ('1','2460','1D20','2');
insert into rap_appartenir values ('1','4001','5','10');
insert into rap_appartenir values ('1','466','AC45','2');
insert into rap_appartenir values ('1','8510','B520','1');
insert into rap_appartenir values ('1','701','AD33','1');
insert into rap_appartenir values ('1','7000','AD33','3');
insert into rap_appartenir values ('1','7512','1640','1');
insert into rap_appartenir values ('1','11945','1630','1');
insert into rap_appartenir values ('2','420','9212','2');
insert into rap_appartenir values ('2','704','AC45','2');
insert into rap_appartenir values ('1','8010','8645','1');
insert into rap_appartenir values ('1','10030','5','10');
insert into rap_appartenir values ('1','7898','BB20','1');
insert into rap_appartenir values ('1','8011','D334','2');
insert into rap_appartenir values ('1','6246','9A20','1');

commit;
