package gestioncatalogue.metier;

public class Produit implements Comparable<Produit>{
    
    // Declaration variables
    private int id_produit;
    private String photo;
    private String nom_produit;
    private String description;
    private double prix;
    private boolean en_promotion;
    private int tx_promo;
    private double prix_reduit;
    private int stock;
    private String img;
    private int id_cat;
    private String nom_cat;
    private int id_sousCat;
    private String nom_sousCat;

    
    // Constructeurs
    public Produit (int id_produit, String nom_produit, String description, double prix, boolean en_promotion, int tx_promo, double prix_reduit, int stock) {
        this.id_produit = id_produit;
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix >= 0) { this.prix = prix; }
        this.en_promotion = en_promotion;
        this.tx_promo = tx_promo;
        this.prix_reduit = prix_reduit;
        this.stock = stock;
    }
    
    public Produit (int id_produit, String nom_produit, String description, double prix, boolean en_promotion, int tx_promo, double prix_reduit, int stock, String img) {
        this.id_produit = id_produit;
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix >= 0) { this.prix = prix; }
        this.en_promotion = en_promotion;
        this.tx_promo = tx_promo;
        this.prix_reduit = prix_reduit;
        this.stock = stock;
        this.img = img;
    }
    
    public Produit (int id_produit, String nom_produit, String description, double prix, boolean en_promotion, int tx_promo, double prix_reduit, int stock, String nom_cat, String nom_sousCat) {
        this.id_produit = id_produit;
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix >= 0) { this.prix = prix; }
        this.en_promotion = en_promotion;
        this.tx_promo = tx_promo;
        this.prix_reduit = prix_reduit;
        this.stock = stock;
        this.nom_cat = nom_cat;
        this.nom_sousCat = nom_sousCat;
    }
    
    public Produit (int id_produit, String nom_produit, String description, double prix, boolean en_promotion, int tx_promo, double prix_reduit, int stock, String img, String nom_cat, String nom_sousCat) {
        this.id_produit = id_produit;
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix >= 0) { this.prix = prix; }
        this.en_promotion = en_promotion;
        this.tx_promo = tx_promo;
        this.prix_reduit = prix_reduit;
        this.stock = stock;
        this.img = img;
        this.nom_cat = nom_cat;
        this.nom_sousCat = nom_sousCat;
    }
    
        public Produit (int id_produit, boolean en_promotion, int tx_promo, double prix_reduit) {
        this.id_produit = id_produit;
        this.en_promotion = en_promotion;
        this.tx_promo = tx_promo;
        this.prix_reduit = prix_reduit;
    }
    
    public Produit (String nom_produit, String description, double prix, boolean en_promotion, int tx_promo , double prix_reduit, int stock) {
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix > 0) { this.prix = prix; }
        this.en_promotion = en_promotion;
        this.tx_promo = tx_promo;
        this.prix_reduit = prix_reduit;
        this.stock = stock;
    }
    
    public Produit (String nom_produit, String description, double prix, boolean en_promotion, int tx_promo , double prix_reduit, int stock, String img) {
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix > 0) { this.prix = prix; }
        this.en_promotion = en_promotion;
        this.tx_promo = tx_promo;
        this.prix_reduit = prix_reduit;
        this.stock = stock;
        this.img = img;
    }
	
    public Produit (String nom_produit, String description, double prix, boolean en_promotion, int tx_promo, double prix_reduit, int stock, String nom_cat, String nom_sousCat) {
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix > 0) { this.prix = prix; }
        this.en_promotion = en_promotion;
        this.tx_promo = tx_promo;
        this.prix_reduit = prix_reduit;
        this.stock = stock;
        this.nom_cat = nom_cat;
        this.nom_sousCat = nom_sousCat;
    }
    
    public Produit (String nom_produit, String description, double prix, boolean en_promotion, int tx_promo, double prix_reduit, int stock, String img, String nom_cat, String nom_sousCat) {
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix > 0) { this.prix = prix; }
        this.en_promotion = en_promotion;
        this.tx_promo = tx_promo;
        this.prix_reduit = prix_reduit;
        this.stock = stock;
        this.img = img;
        this.nom_cat = nom_cat;
        this.nom_sousCat = nom_sousCat;
    }
    
    public Produit (int id_produit, int id_cat, int id_sousCat) {
        this.id_produit = id_produit;
        this.id_cat = id_cat;
        this.id_sousCat = id_sousCat;        
    }
   
    // Getters and setters
    public int getIdProduit() { return id_produit; }
    
    public String getPhoto() { return photo; }
    public void setPhoto(String photo) { this.photo = photo; }    

    public String getNomProduit() { return nom_produit; }
    public void setNomProduit(String nom_produit) { this.nom_produit = nom_produit; }

    public String getDescription() { return description; }
    public void setDescription(String description) { if (description != null) { this.description = description; } }

    public double getPrix() { return prix; }
    public void setPrix(double prix) { if (prix >= 0) {this.prix = prix; } }
    
    public boolean getEnPromo() { return en_promotion; }
    public void setEnPromo(boolean en_promotion) { this.en_promotion = en_promotion; }

    public int getTx_promo() { return tx_promo; }
    public void setTx_promo(int tx_promo) { if(tx_promo >= 0 && tx_promo <= 100) { this.tx_promo = tx_promo; } }

    public double getPrixReduit() { return prix_reduit; }
    public void setPrixReduit(double prix_reduit) { if (prix_reduit >= 0) {this.prix_reduit = prix_reduit; } }
    
    public int getStock() { return stock; }
    public void setStock(int stock) { this.stock = stock; }
    
    public String getImg() { return img; }
    public void setImg(String img) { this.img = img; }    

    public int getIdCat() { return id_cat; }
    public void setIdCat(int id_cat) { this.id_cat = id_cat; }
    
    public String getCat() { return nom_cat; }
    public void setCat(String nom_cat) { this.nom_cat = nom_cat; }
    
    public int getIdSousCat() { return id_sousCat; }
    public void setIdSousCat(int id_sousCat) { this.id_sousCat = id_sousCat; }

    public String getSousCat() { return nom_sousCat; }
    public void setSousCat(String nom_sousCat) { this.nom_sousCat = nom_sousCat; }

    @Override
    public int compareTo(Produit p) {
        return 0;
    }
		
}


