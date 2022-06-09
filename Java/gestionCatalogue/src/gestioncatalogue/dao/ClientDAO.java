package gestioncatalogue.dao;

import gestioncatalogue.metier.Client;
import com.mysql.jdbc.Connection;
import com.mysql.jdbc.PreparedStatement;
import java.sql.SQLException;
import java.sql.ResultSet;
import java.util.ArrayList;
import javax.swing.JOptionPane;

/**
 *
 * @author BONARD Jerome
 */
public class ClientDAO {
        
        // Declaration et initialisation des variables
        static Connection connection = CategorieDAO.initConnection();
        private static int id_client;
        private static final Object verrou = new Object();
    
        // Recuperation de la liste de tous les clients
        public static ArrayList<Client> getClients() {
            ArrayList<Client> listeClients = new ArrayList<>();
            String sql = "SELECT * FROM clients";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                ResultSet rs = pst.executeQuery();
                while(rs.next()) {
                    Client c = new Client(rs.getInt("id_client"), rs.getString("nom"), rs.getString("mot_de_passe"), rs.getString("email"));
                    listeClients.add(c);
                }
            } catch (SQLException e) { System.out.println(e); }
 
            return listeClients;
        }
        
        // Creation client
        public static boolean createClient(Client c) {
            boolean ajout;
                        
            // Synchronized permet d attendre que le produit soit ajoute a produits pour continuer
            synchronized (verrou) {
                ajout = addClientToClients(c);
            }    
            return ajout;
        }
        
         // Ajoute un client dans clients
        public static boolean addClientToClients(Client c) {
            String sql = "insert into clients (nom, mot_de_passe, email) values (?, ?, ?)";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setString(1, c.getNomClient());
                pst.setString(2, c.getMDPClient());
                pst.setString(3, c.getEmailClient());
                pst.execute();
            } catch (SQLException e) {
                    if (e instanceof com.mysql.jdbc.exceptions.jdbc4.MySQLIntegrityConstraintViolationException) {
                        //Double entree
                        JOptionPane.showMessageDialog(null, "Il existe déjà un compte associe à cet Email", "Ajout de Client", JOptionPane.ERROR_MESSAGE);
                        return false;
                    } else { /*Autre SQL Exception*/ }
            }
            return true;
        }
        
        // Obtenir id_client par son email
        public static int getIdClient(String email) {
            String sql = "select id_client from clients where email=?";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setString(1, email);
                ResultSet rs = pst.executeQuery();
                while(rs.next()) {
                    id_client = rs.getInt("id_client");
                }
            } catch (SQLException e) { System.out.println(e); }
            
            return id_client;
        }
        
        // Obtenir id_client du dernier client cree
        public static int getIdClientMax() {
            String sql = "select MAX(id_client) from clients";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                ResultSet rs = pst.executeQuery();
                 id_client = rs.getInt("id_client");
            } catch (SQLException e) { System.out.println(e); }
            return id_client;
        }
       
        // Mettre a jour un client
        public static boolean updateClient(Client c) {
            String sql = "update clients set nom=?, mot_de_passe=?, email=? where id_client=?"; 
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setString(1, c.getNomClient());
                pst.setString(2, c.getMDPClient());
                pst.setString(3, c.getEmailClient());
                pst.setInt(4, c.getIdClient());
                pst.execute();     
            } catch (SQLException e) { System.out.println(e); }
            return true;
        }
       
        // Supprimer un client
        public static void deleteClient(int id_client) {
            String sql = "delete from clients where id_client=?";
            try{
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setInt(1, id_client);
                pst.execute();
            } catch (SQLException e) { System.out.println(e); }
        }        
}