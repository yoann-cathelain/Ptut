package gestioncatalogue.dao;


import com.mysql.jdbc.Connection;
import com.mysql.jdbc.PreparedStatement;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author BONARD Jerome
 */

public class CategoriesDAO {
            static Connection connection = initConnection();
             
            public static Connection initConnection(){
                    String url = "jdbc:mysql://localhost:3306/bdd";
                    try {
                            connection = (Connection) DriverManager.getConnection(url,"root","");
                            System.out.println("Connecte avec succes");	
                    }catch(SQLException e) { System.out.println(e); }
                    return connection;
            } 
            
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
	
	
	
}
