package gestioncatalogue.dao;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.PreparedStatement;
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
    
        
}
