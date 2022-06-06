package gestioncatalogue.dao;

import gestioncatalogue.metier.Produit;
import com.mysql.jdbc.Connection;
import com.mysql.jdbc.PreparedStatement;
import static gestioncatalogue.dao.CategorieDAO.*;
import java.sql.SQLException;
import java.sql.ResultSet;
import java.util.ArrayList;
import javax.swing.JOptionPane;

/**
 *
 * @author BONARD Jerome
 */
public class ProduitDAO {
        
        // Declaration et initialisation des variables
        static Connection connection = initConnection();
        private static int id_produit;
        private static final Object verrou = new Object();
    
        // Recuperation de la liste de tous les produits
        public static ArrayList<Produit> getProduits() {
            ArrayList<Produit> listeProduits = new ArrayList<>();
            String sql = "SELECT ID_PRODUIT, NOM_PRODUIT, DESCRIPTION, PRIX, EN_PROMOTION, PROMO, PRIX_REDUIT, STOCK, IMG, NOM_CAT, NOM_SOUSCAT FROM produits " +
                               "NATURAL JOIN produit_cat NATURAL JOIN categories NATURAL JOIN sous_categories";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                ResultSet rs = pst.executeQuery();
                while(rs.next()) {
                    Produit p = new Produit(rs.getInt("id_produit"), rs.getString("nom_produit"), rs.getString("description"), rs.getDouble("prix"), rs.getBoolean("en_promotion"), rs.getInt("promo"), rs.getDouble("prix_reduit"), rs.getInt("stock"), rs.getString("img"), rs.getString("nom_cat"), rs.getString("nom_sousCat"));
                    listeProduits.add(p);
                }
            } catch (SQLException e) { System.out.println(e); }
 
            return listeProduits;
        }
        
        // Creation produit dans les tables produits et produit_cat
        public static boolean createProduit(Produit p, String nom_cat, String nom_souscat) {
            boolean ajout;
            int id_cat = getIdCategorie(nom_cat);
            int id_souscat = getIdSousCategorie(nom_souscat);
            
            // Synchronized permet d attendre que le produit soit ajoute a produits pour continuer
            synchronized (verrou) {
                ajout = addProduitToProduits(p);
            }    
                if (ajout == true) {
                        // Synchronized permet d attendre de recuperer id du produit qui vient d etre ajoute dans produits
                        synchronized (verrou) {
                            id_produit = getIdProduit(p.getNomProduit());
                        }
                        // Ajout du produit dans produit_cat 
                        synchronized (verrou) {
                            addProduitToProduitCat(id_produit, id_cat, id_souscat);
                        } 
                        return true;
                } else
                        return false;
        }
        
        // Ajoute un produit dans produits
        public static boolean addProduitToProduits(Produit p) {
            String sql = "insert into produits (nom_produit, description, prix, en_promotion, promo, prix_reduit, stock, img) values (?, ?, ?, ?, ?, ?, ?, ?)";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setString(1, p.getNomProduit());
                pst.setString(2, p.getDescription());
                pst.setDouble(3, p.getPrix());
                pst.setBoolean(4, p.getEnPromo());
                pst.setInt(5, p.getTx_promo());
                pst.setDouble(6, p.getPrixReduit());
                pst.setInt(7, p.getStock());
                pst.setString(8, p.getImg());
                pst.execute();
            } catch (SQLException e) {
                    if (e instanceof com.mysql.jdbc.exceptions.jdbc4.MySQLIntegrityConstraintViolationException) {
                        //Double entree
                        JOptionPane.showMessageDialog(null, """
                                                            Le nom de ce produit existe deja dans la table produits
                                                            Veuillez changer son nom.""", "Gestion de stock - AEKI", JOptionPane.ERROR_MESSAGE);
                        return false;
                    } else {
                        //Autre SQL Exception
                    }
                
                }
            return true;
        }
        
        // Ajoute un produit dans produit_cat
        public static void addProduitToProduitCat(int id_produit, int id_cat, int id_souscat) {
            String sql = "insert into produit_cat (id_produit, id_cat, id_souscat) values (?, ?, ?)";     
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setInt(1, id_produit);
                pst.setInt(2, id_cat);
                pst.setInt(3, id_souscat);
                pst.execute();
            } catch (SQLException e) { System.out.println(e); }
        }

        // Obtenir id_produit par son nom
        public static int getIdProduit(String nom_produit) {
            String sql = "select id_produit from produits where nom_produit=?";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setString(1, nom_produit);
                ResultSet rs = pst.executeQuery();
                while(rs.next()) {
                    id_produit = rs.getInt("id_produit");
                }
            } catch (SQLException e) { System.out.println(e); }
            
            return id_produit;
        }
        
        // Obtenir id_produit du dernier produit cree
        public static int getIdProduitMax() {
            String sql = "select MAX(id_produit) from produits";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                ResultSet rs = pst.executeQuery();
                id_produit = rs.getInt("id_produit");
            } catch (SQLException e) { System.out.println(e); }
            return id_produit;
        }
       
        // Mettre a jour un produit
        public static boolean updateProduit(Produit p) {
            String sql = "update produits set nom_produit=?, description=?, prix=?, en_promotion=?, promo=?, prix_reduit=?, stock=?, img=? where id_produit=?"; 
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setString(1, p.getNomProduit());
                pst.setString(2, p.getDescription());
                pst.setDouble(3, p.getPrix());
                pst.setBoolean(4, p.getEnPromo());
                pst.setInt(5, p.getTx_promo());
                pst.setDouble(6, p.getPrixReduit());
                pst.setInt(7, p.getStock());
                pst.setString(8, p.getImg());
                pst.setInt(9, p.getIdProduit());
                pst.execute();     
            } catch (SQLException e) { System.out.println(e); }
            return true;
        }
        
        // Mettre a jour un produit en promotion
        public static boolean updateProduitPromo(Produit p) {
            String sql = "update produits set en_promotion=?, promo=?, prix_reduit=? where id_produit=?";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setBoolean(1, p.getEnPromo());
                pst.setInt(2, p.getTx_promo());
                pst.setDouble(3, p.getPrixReduit());
                pst.setInt(4, p.getIdProduit());
                pst.execute();              
            } catch (SQLException e) { System.out.println(e); }
            return true;
        }
       
        // Supprimer un produit
        public static void deleteProduit(int id_produit) {
            String sql1 = "delete from produit_cat where id_produit=?";
            String sql2 = "delete from produits where id_produit=?";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql1);
                pst.setInt(1, id_produit);
                pst.execute();
            } catch (SQLException e) { System.out.println(e); }
            
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql2);
                pst.setInt(1, id_produit);
                pst.execute();
            } catch (SQLException e) { System.out.println(e); }
        }
     
        // Rechercher un produit
        public static Produit searchProduit(String recherche, String nom_cat, String nom_sousCat) {
            // recupere 1 produit ou le nom existe et contient
            String sql = "select * from produits NATURAL JOIN produit_cat NATURAL JOIN categories NATURAL JOIN sous_categories WHERE nom_produit LIKE ? AND NOM_CAT = ? AND NOM_SOUSCAT = ?;";
            Produit searchProduct = null;
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setString(1, "%" + recherche + "%");
                pst.setString(2, nom_cat);
                pst.setString(3, nom_sousCat);
                ResultSet rs = pst.executeQuery();         
                if((rs.next())) {
                    int id = rs.getInt("ID_PRODUIT");
                    String nom_produit = rs.getString("NOM_PRODUIT");
                    String description = rs.getString("DESCRIPTION");
                    double prix = rs.getDouble("PRIX");
                    boolean en_promotion = rs.getBoolean("EN_PROMOTION");
                    int promo = rs.getInt("PROMO");
                    double prix_reduit = rs.getDouble("PRIX_REDUIT");
                    int stock = rs.getInt("STOCK");
                    String img = rs.getString("IMG");
                    searchProduct = new Produit(id, nom_produit, description, prix, en_promotion, promo, prix_reduit, stock, img, nom_cat, nom_sousCat);
                }
                if (rs.next()) {
                    JOptionPane.showMessageDialog(null, "Il existe plusieurs produits pour votre recherche.\n"
                            + "Si le produit affiché ne correspond pas au produit désiré, affinez le nom du produit recherché.",
                            "Gestion de stock - AEKI", JOptionPane.INFORMATION_MESSAGE);
                }
            } catch (SQLException e) { System.out.println(e); }          
            return searchProduct;
        }

        
}

/*       
       // Obtenir un produit par son id - Non utilise
        public Produit getProduitById(int id_produit) {
            String sql = "select * from produits where id_produit=?";
            
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setInt(1, id_produit);
                ResultSet rs = pst.executeQuery();
                if(rs.next()) {
                    Produit p = new Produit(rs.getInt("id_produit"), rs.getString("nom_produit"), rs.getString("description"), rs.getDouble("prix"), rs.getInt("promo"), rs.getInt("stock"), rs.getString("nom_cat"), rs.getString("nom_sousCat"));
                    return p;
                }
            } catch (SQLException e) { System.out.println(e); }
            
            return null;
        }
        */