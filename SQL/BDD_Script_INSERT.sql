
/* INSERT */

INSERT INTO categories (id_cat, nom_cat)
  VALUES  ("1", "chaises");
INSERT INTO categories (id_cat, nom_cat)
  VALUES  ("2", "lits");
INSERT INTO categories (id_cat, nom_cat)
  VALUES  ("3", "rangements");
INSERT INTO categories (id_cat, nom_cat)
  VALUES  ("4", "tables");

INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("1", "chaises_de_bureau");
INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("2", "chaises_de_jardin");
INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("3", "chaises_de_salle_a_manger");
INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("4", "tables_de_basses");
INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("5", "tables_de_jardin");
INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("6", "tables_salle_a_manger");
INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("7", "lits_simples");
INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("8", "lits_doubles");
INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("9", "lits_superposes");
INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("10", "rangements_armoires");
INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("11", "rangements_commodes");
INSERT INTO sous_categories (id_souscat, nom_souscat)
  VALUES  ("12", "rangements_etageres");

INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("1", "1");
INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("1", "2");
INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("1", "3");
INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("2", "4");
INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("2", "5");
INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("2", "6");
INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("3", "7");
INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("3", "8");
INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("3", "9");
INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("4", "10");
INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("4", "11");
INSERT INTO cat_souscat (id_cat, id_souscat)
  VALUES  ("4", "12");

INSERT INTO produits (id_produit, nom_produit, description, prix, stock, promo)
  VALUES  ("1", "Chaise en boulot", "magnifique chaise en boulot", "50", "25", NULL);
INSERT INTO produit_cat (id_produit, id_cat, id_souscat)
  VALUES  ("1", "1", "3");
INSERT INTO produits (id_produit, nom_produit, description, prix, stock, promo)
  VALUES  ("2", "Chaise transate", "tres jolie chaise transate", "45", "200", NULL);
INSERT INTO produit_cat (id_produit, id_cat, id_souscat)
  VALUES  ("2", "1", "3");
INSERT INTO produits (id_produit, nom_produit, description, prix, stock, promo)
  VALUES  ("3", "Lit double royal", "un tres grand lit", "250", "77", NULL);
INSERT INTO produit_cat (id_produit, id_cat, id_souscat)
  VALUES  ("3", "3", "8");
INSERT INTO produits (id_produit, nom_produit, description, prix, stock, promo)
  VALUES  ("4", "Grande table de jardin", "table parfaite pour recevoir des invités", "130", "54", 40);
INSERT INTO produit_cat (id_produit, id_cat, id_souscat)
  VALUES  ("4", "2", "6");
INSERT INTO produits (id_produit, nom_produit, description, prix, stock, promo)
  VALUES  ("5", "Moyenne commode", "pleins de rangement", "149", "238", 30);
INSERT INTO produit_cat (id_produit, id_cat, id_souscat)
  VALUES  ("5", "4", "10");
INSERT INTO produits (id_produit, nom_produit, description, prix, stock, promo)
  VALUES  ("6", "Grande etagere", "pour tout vos habils", "400", "40", 60);
INSERT INTO produit_cat (id_produit, id_cat, id_souscat)
  VALUES  ("6", "4", "11");
 
INSERT INTO gestionnaires (id_gest, email, mot_de_passe, nom, prenom)
  VALUES  ("1", "jean@gmail.com", "jean", "francois", "jean");
INSERT INTO gestionnaires (id_gest, email, mot_de_passe, nom, prenom)
  VALUES  ("2", "paul@gmail.com", "paul", "gerard", "paul");

INSERT INTO clients (id_client, email, mot_de_passe, nom)
  VALUES  ("1", "betrand@gmail.com", "bertrand", "francois");
INSERT INTO clients (id_client, email, mot_de_passe, nom)
  VALUES  ("2", "thomas@gmail.com", "thomas", "francois");
INSERT INTO clients (id_client, email, mot_de_passe, nom)
  VALUES  ("3", "phillipe@gmail.com", "phillipe", "francois");