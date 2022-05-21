package gestioncatalogue.dao;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.PreparedStatement;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.ResultSet;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author BONARD Jerome
 */
public class ProduitDAO {
        public Connection connection;
    
        public ProduitDAO() {
                String url = "jdbc:mysql://localhost:3306/bdd";

                try {
                    connection = (Connection) DriverManager.getConnection(url,"root","");
                    System.out.println("Connecte avec succes");


                }catch(SQLException e) { System.out.println(e); }
        }
        
        public List<Produit> getProduits() {
            List<Produit> liste = new ArrayList<>();
            String sql = "SELECT produits.ID_PRODUIT, NOM_PRODUIT, DESCRIPTION, PRIX, STOCK, NOM_CAT, NOM_SOUSCAT FROM produit_cat " +
                                               "INNER JOIN produits ON produit_cat.ID_PRODUIT = produits.ID_PRODUIT " +
                                                "INNER JOIN categories ON produit_cat.ID_CAT = categories.ID_CAT " +
                                                "INNER JOIN sous_categories ON produit_cat.ID_SOUSCAT = sous_categories.ID_SOUSCAT";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                ResultSet rs = pst.executeQuery();
                while(rs.next()) {
                    Produit p = new Produit(rs.getInt("id_produit"), rs.getString("nom_produit"), rs.getString("description"), rs.getDouble("prix"),rs.getInt("stock"), rs.getString("nom_cat"), rs.getString("nom_sousCat"));
                    liste.add(p);
                }
            } catch (SQLException e) { System.out.println(e); }
            
            return liste;
        }
        
        public void createProduit(Produit p) {
            // insert into produit_cat id article et id produit et sous cat
            String sql = "insert into produits (id_produit, nom_produit, prix, description, stock, nom_cat, nom_souscat) values (?, ?, ?, ?, ?)";
            
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                
                pst.setString(1, p.getNomProduit());
                
                pst.setDouble(2, p.getPrix());
                pst.execute();
            } catch (SQLException e) { System.out.println(e); }
            
        }
       
        public Produit getProduitById(int id_produit) {
            String sql = "select * from produits where id_produit=?";
            
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setInt(1, id_produit);
                ResultSet rs = pst.executeQuery();
                if(rs.next()) {
                    Produit p = new Produit(rs.getInt("id_produit"), rs.getString("nom_produit"), rs.getString("description"), rs.getDouble("prix"),rs.getInt("stock"), rs.getString("nom_cat"), rs.getString("nom_sousCat"));
                    return p;
                }
            } catch (SQLException e) { System.out.println(e); }
            
            return null;
            
        }
       
       
        public void updateProduit(Produit pr) {
            String sql = "update produits set designation=?, prix=?, categorie=? where id_produit=?";
            
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setString(1, pr.getNomProduit());
                pst.setDouble(2, pr.getPrix());
                pst.setString(3, pr.getCat());
                pst.setInt(4, pr.getIdProduit());
                
                pst.execute();
                              
            } catch (SQLException e) { System.out.println(e); }            
        }
       
        public void deleteProduit(int id_produit) {
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
}
