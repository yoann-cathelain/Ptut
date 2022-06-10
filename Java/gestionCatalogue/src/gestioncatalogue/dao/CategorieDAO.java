package gestioncatalogue.dao;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.PreparedStatement;
import static gestioncatalogue.dao.ProduitDAO.deleteProduit;
import gestioncatalogue.metier.Produit;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import javax.swing.JOptionPane;

/**
 *
 * @author BONARD Jerome
 */

public class CategorieDAO {

    // Declaration variables
    static Connection connection = initConnection();
    
    // Initialiser connection BDD
    public static Connection initConnection(){
        String url = "jdbc:mysql://localhost:3306/bdd";
        try {
            connection = (Connection) DriverManager.getConnection(url,"root","");
            System.out.println("Connecte avec succes");	
        }catch(SQLException e) { System.out.println(e); }
        return connection;
    } 
    
    // Obtenir liste des categories
    public static List<String> getCategories(){
        List<String> listeCat = new ArrayList<>();
        String sql = "select NOM_CAT from categories";
        try {
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            while(rs.next()) {
                String s = rs.getString("NOM_CAT");
                listeCat.add(s);
             }
        } catch (SQLException e) { System.out.println(e); }
        return listeCat;
    }
	
    // Obtenir liste des sous-categories
    public static List<String> getSousCategories (String Cat) {
        List<String> listeSousCat = new ArrayList<>();
        String sql = "SELECT NOM_SOUSCAT FROM cat_souscat JOIN sous_categories ON cat_souscat.ID_SOUSCAT = sous_categories.ID_SOUSCAT "
                            + "WHERE id_cat = (select id_cat from categories where NOM_CAT = '" + Cat + "' );";
        try {
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            while(rs.next()) {
                String s = rs.getString("NOM_SOUSCAT");
                listeSousCat.add(s);
             }
         } catch (SQLException e) { System.out.println(e); }
         return listeSousCat;
    }
            
    // Obtenir id pour une categorie
    public static int getIdCategorie(String nom_cat){
        int id_cat = 0;
        String sql = "SELECT id_cat from categories where nom_cat = '" + nom_cat + "';";
        try {
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            while(rs.next()) {
                id_cat = rs.getInt("ID_CAT");
             }
         } catch (SQLException e) { System.out.println(e); }
         return id_cat;
    }
            
    // Obtenir id pour une sous-categorie
    public static int getIdSousCategorie(String nom_souscat){
        int id_souscat = 0;
        String sql = "SELECT id_souscat from sous_categories where nom_souscat = '" + nom_souscat + "';";
        try {
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            while(rs.next()) {
                id_souscat = rs.getInt("ID_SOUSCAT");
             }
        } catch (SQLException e) { System.out.println(e); }
        return id_souscat;
    }
    
    // Ajouter une categorie
    public static boolean addCategorie(String nom_cat){
            String sql = "insert into categories (nom_cat) values (?)";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setString(1, nom_cat);
                pst.execute();
            } catch (SQLException e) {
                    if (e instanceof com.mysql.jdbc.exceptions.jdbc4.MySQLIntegrityConstraintViolationException) {
                        //Double entree
                        JOptionPane.showMessageDialog(null, """
                                                            Le nom de cette categorie existe deja dans la table catagorie
                                                            Veuillez changer son nom.""", "Ajout de categorie", JOptionPane.ERROR_MESSAGE);
                        return false;
                    } else {
                        //Autre SQL Exception
                    }
                }
            return true;
        }
    /*
    public static boolean addSousCategorie(String nom_cat, String nom_sousCat) {
        
    }*/
    
    public static List<Produit> deleteCategorie(String nom_cat) {
        List<Produit> searchProducts = new ArrayList<>();
        Produit searchProduct = null;
        
        String sql1 = "select id_produit, id_cat, id_souscat from produits NATURAL JOIN produit_cat NATURAL JOIN categories NATURAL JOIN sous_categories WHERE NOM_CAT = ?";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql1);
                pst.setString(1, nom_cat);
                
                ResultSet rs = pst.executeQuery();         
                while(rs.next()) {
                    int id_produit = rs.getInt("ID_PRODUIT");
                    int id_cat = rs.getInt("ID_CAT");
                    int id_sousCat = rs.getInt("ID_SOUSCAT");
                    searchProduct = new Produit(id_produit, id_cat, id_sousCat);
                    searchProducts.add(searchProduct);
                }
            } catch (SQLException e) { System.out.println(e); }
            
            for (Produit p : searchProducts) {
                deleteProduit(p.getIdProduit());
            }
            
            String sql2 = "delete from cat_souscat where id_cat=?";
            for(Produit p : searchProducts) {
                try{
                    PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql2);
                    pst.setInt(1, p.getIdCat());
                    pst.execute();
                } catch (SQLException e) { System.out.println(e); }
            }
  
            String sql3 = "delete from sous_categories where id_souscat=?";
            for(Produit p : searchProducts) { 
                try{
                    PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql3);
                    pst.setInt(1, p.getIdSousCat());
                    pst.execute();
                } catch (SQLException e) { System.out.println(e); }
           }
           
            String sql4 = "delete from categories where id_cat=?";
            for(Produit p : searchProducts) {
                try{
                    PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql4);
                    pst.setInt(1, p.getIdCat());
                    pst.execute();
                } catch (SQLException e) { System.out.println(e); }
            }
            
            String sql5 = "delete from categories where nom_cat=?";
            try{
                    PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql5);
                    pst.setString(1, nom_cat);
                    pst.execute();
                } catch (SQLException e) { System.out.println(e); }
            
            return searchProducts;
    }
   /* 
        public static List<Produit> deleteSousCategorie(String nom_sousCat) {
            List<Produit> searchProducts = new ArrayList<>();
    }
    */
        
}
