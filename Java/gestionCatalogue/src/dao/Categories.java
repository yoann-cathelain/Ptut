package dao;

import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.PreparedStatement;

public class Categories {
	
	public static List<String> getCategory(){
        Connection connection = null;
        List<String> listeCateg = new ArrayList<>();
        
        String url = "jdbc:mysql://localhost:3306/bdd";
        try {
        	connection = (Connection) DriverManager.getConnection(url,"root","");
        	System.out.println("Connecte avec succes");	
        }catch(SQLException e) { System.out.println(e); }
       
        String sql = "select NOM_CAT from categories";
		
        try {
        	PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
        	ResultSet rs = pst.executeQuery();
        	
        	while(rs.next()) {
        		String s = new String (rs.getString("NOM_CAT"));
        		listeCateg.add(s);
        	}
        	
        	
        } catch (SQLException e) { System.out.println(e); }
		return listeCateg;
	}
	
	public static List<String> getSousCateg (String Categ) {
        Connection connection = null;
        List<String> listeSousCateg = new ArrayList<>();
        
        String url = "jdbc:mysql://localhost:3306/bdd";
        try {
        	connection = (Connection) DriverManager.getConnection(url,"root","");
        	System.out.println("Connecte avec succes");	
        }catch(SQLException e) { System.out.println(e); }
       
        String sql = 
        		"SELECT NOM_SOUSCAT FROM cat_souscat JOIN sous_categories ON cat_souscat.ID_SOUSCAT = sous_categories.ID_SOUSCAT "
        		+ "WHERE id_cat = (select id_cat from categories where NOM_CAT = '" + Categ + "' );";
		
        try {
        	PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
        	ResultSet rs = pst.executeQuery();
        	
        	while(rs.next()) {
        		String s = new String (rs.getString("NOM_SOUSCAT"));
        		listeSousCateg.add(s);
        	}
        } catch (SQLException e) { System.out.println(e); }
		
		return listeSousCateg;
		
	}
	
	
	
}