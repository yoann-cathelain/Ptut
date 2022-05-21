drop table if exists PRODUIT_DANS_COMMANDE;

drop table if exists PRODUIT_PANIER;

drop table if exists PRODUIT_CAT;

drop table if exists COMMANDE_CLIENT;

drop table if exists COMMANDES;

drop table if exists CAT_SOUSCAT;

drop table if exists CLIENTS;

drop table if exists GESTIONNAIRES;

drop table if exists SOUS_CATEGORIES;

drop table if exists CATEGORIES;

drop table if exists PRODUITS;

/*==============================================================*/
/* Table : PRODUITS                                             */
/*==============================================================*/
create table PRODUITS
(
   ID_PRODUIT           int not null,
   NOM_PRODUIT          char(255) not null,
   DESCRIPTION          text not null,
   PRIX                 double not null,
   PROMO                int,
   STOCK                int not null,
   primary key (ID_PRODUIT)
);

/*==============================================================*/
/* Table : SOUS_CATEGORIES                                      */
/*==============================================================*/
create table SOUS_CATEGORIES
(
   ID_SOUSCAT           int not null AUTO_INCREMENT,
   NOM_SOUSCAT          char(255),
   primary key (ID_SOUSCAT)
);

/*==============================================================*/
/* Table : CATEGORIES                                           */
/*==============================================================*/
create table CATEGORIES
(
   ID_CAT               int not null AUTO_INCREMENT,
   NOM_CAT              char(255) not null,
   primary key (ID_CAT)
);

/*==============================================================*/
/* Table : CLIENTS                                              */
/*==============================================================*/
create table CLIENTS
(
   ID_CLIENT            int not null AUTO_INCREMENT,
   NOM                  char(255),
   MOT_DE_PASSE         char(255),
   EMAIL                char(255),
   primary key (ID_CLIENT)
);

/*==============================================================*/
/* Table : COMMANDES                                            */
/*==============================================================*/
create table COMMANDES
(
   ID_COMMANDE          int not null AUTO_INCREMENT,
   PRIX_COMMANDE        double not null,
   primary key (ID_COMMANDE)
);

/*==============================================================*/
/* Table : GESTIONNAIRE                                         */
/*==============================================================*/
create table GESTIONNAIRES
(
   ID_GEST              int not null AUTO_INCREMENT,
   NOM                  char(255) not null,
   PRENOM               char(255) not null,
   MOT_DE_PASSE         char(255) not null,
   EMAIL                char(255) not null,
   primary key (ID_GEST)
);

/*==============================================================*/
/* Table : PRODUIT_CAT                                          */
/*==============================================================*/
create table PRODUIT_CAT
(
   ID_PRODUIT           int not null,
   ID_CAT               int not null,
   ID_SOUSCAT           int not null,
   primary key (ID_PRODUIT, ID_CAT, ID_SOUSCAT),
   foreign key (ID_PRODUIT) references produits(ID_PRODUIT),
   foreign key (ID_CAT) references categories(ID_CAT),
   foreign key (ID_SOUSCAT) references sous_categories(ID_SOUSCAT)
);

/*==============================================================*/
/* Table : PRODUIT_DANS_COMMANDE                                */
/*==============================================================*/
create table PRODUIT_DANS_COMMANDE
(
   ID_PRODUIT           int not null,
   ID_COMMANDE          int not null,
   primary key (ID_PRODUIT, ID_COMMANDE),
   foreign key (ID_PRODUIT) references produits(ID_PRODUIT),
   foreign key (ID_COMMANDE) references commandes(ID_COMMANDE)
);

/*==============================================================*/
/* Table : PRODUIT_PANIER                                       */
/*==============================================================*/
create table PRODUIT_PANIER
(
   ID_CLIENT            int not null,
   ID_PRODUIT           int not null,
   primary key (ID_CLIENT, ID_PRODUIT),
   foreign key (ID_CLIENT) references clients(ID_CLIENT),
   foreign key (ID_PRODUIT) references produits(ID_PRODUIT)
);

/*==============================================================*/
/* Table : COMMANDE_CLIENT                                      */
/*==============================================================*/
create table COMMANDE_CLIENT
(
   ID_CLIENT            int not null,
   ID_COMMANDE          int not null,
   primary key (ID_COMMANDE, ID_CLIENT),
   foreign key (ID_COMMANDE) references commandes(ID_COMMANDE),
   foreign key (ID_CLIENT) references clients(ID_CLIENT) 
);


/*==============================================================*/
/* Table : CAT_SOUSCAT                                      */
/*==============================================================*/
create table CAT_SOUSCAT
(
   ID_CAT               int not null,
   ID_SOUSCAT		int not null,
   primary key(ID_CAT, ID_SOUSCAT),
   foreign key (ID_CAT) references categories(ID_CAT),
   foreign key (ID_SOUSCAT) references sous_categories(ID_SOUSCAT)
)


