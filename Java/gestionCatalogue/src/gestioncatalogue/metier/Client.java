package gestioncatalogue.metier;

/**
 *
 * @author BONARD Jerome
 */
public class Client {
    
    // Declaration variables
    private int id_client;
    private String nom_client;
    private String mot_de_passe;
    private String email;
    
    // Constructeurs
    public Client (int id_client, String nom_client, String mot_de_passe, String email) {
        this.id_client = id_client;
        this.nom_client = nom_client;
        this.mot_de_passe = mot_de_passe;
        this.email = email;
    }
    
    public Client (String nom_client, String mot_de_passe, String email) {
        this.nom_client = nom_client;
        this.mot_de_passe = mot_de_passe;
        this.email = email;
    }
    
    // Getters and setters
    public int getIdClient() { return id_client; }
    
    public String getNomClient() { return nom_client; }
    public void setNomClient(String nom_client) { this.nom_client = nom_client; }    

    public String getMDPClient() { return mot_de_passe; }
    public void setMDPClient(String mot_de_passe) { this.mot_de_passe = mot_de_passe; }

    public String getEmailClient() { return email; }
    public void setEmailClient(String email) { this.email = email; } // See REGEX		
}

