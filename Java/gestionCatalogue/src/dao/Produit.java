package dao;

import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;
import java.util.stream.Stream;

public class Produit {
    
    private static int cpt=0;
    private int id_produit;
    private String nom_produit;
    private String description;
    private double prix;
    private int promo;
    private int stock;
    private String nom_cat;
    private String nom_sousCat;
    //private static List<Produit> listeProduits = new ArrayList<>();
	
    public enum Categorie { Chaise, Lit, Rangement, Table }
    public enum CatChaise { ChaiseBureau, ChaiseTable, ChaiseExterieur }
    public enum CatTable{ TableSalleManger, TableExterieur, TableJardin }
    public enum CatLit{ LitSimple, Litdouble, LitCanape }
    public enum CatRange{ Commode, Etagere, Tirroir }
	
    public Produit (String nom_produit, String description, double prix, int stock, String nom_cat) {
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix > 0) { this.prix = prix; }
        this.stock = stock;
        this.nom_cat = nom_cat;
        //listeProduits.add(this);
    }
	
    public Produit (int id_produit, String nom_produit, String description, double prix, int stock, String nom_cat, String nom_sousCat) {
        this.id_produit = id_produit;
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix > 0) { this.prix = prix; }
        this.stock = stock;
        this.nom_cat = nom_cat;
        this.nom_sousCat = nom_sousCat;
        //listeProduits.add(this);
    }
	
    public Produit (String nom_produit, String description, double prix, int promo, int stock, String nom_cat) {
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix > 0) { this.prix = prix; }
        if(promo <100 && promo > 0) { this.promo = promo; }
        this.stock = stock;
        this.nom_cat = nom_cat;
        //listeProduits.add(this);
    }
	
    public Produit (String nom_produit, String description, double prix, int promo, int stock, String nom_cat, String nom_sousCat) {
        this.nom_produit = nom_produit;
        this.description = description;
        if (prix > 0) { this.prix = prix; }
        if(promo <100 && promo > 0) { this.promo = promo; }
        this.stock = stock;
        this.nom_cat = nom_cat;
        this.nom_sousCat = nom_sousCat;
        //listeProduits.add(this);
	}
	
    public static int getCpt() { return cpt; }
    public static void setCpt(int cpt) { Produit.cpt = cpt; }
    public static void reduceCpt() { cpt--; }
    
    public int getIdProduit() { return id_produit; }

    public String getNomProduit() { return nom_produit; }
    public void setNomProduit(String nom_produit) { this.nom_produit = nom_produit; }

    public String getDescription() { return description; }
    public void setDescription(String description) { if (description != null) { this.description = description; } }

    public double getPrix() { return prix; }
    public void setPrix(int prix) { if (prix > 0) {this.prix = prix; } }

    public int getPromo() { return promo; }
    public void setPromo(int promo) { if(promo > 0 && promo < 100) { this.promo = promo; } }

    public int getStock() { return stock; }
    public void setStock(int stock) { this.stock = stock; }

    public String getCat() { return nom_cat; }
    public void setCat(String nom_cat) { this.nom_cat = nom_cat; 	}

    public String getSousCat() { return nom_sousCat; }
    public void setSousCat(String nom_sousCat) { this.nom_sousCat = nom_sousCat; }
	
    //public static List<Produit> getListeProduit(){ return listeProduits; }
	
    public static List<String> getCategories(){ 
        //recupere la liste des categories pour en faire une liste de String
        List<String> enumNames = Stream.of(Categorie.values())
        .map(Enum::name)
        .collect(Collectors.toList());
        return enumNames;
    }

    public static List<String> getSousCategories(Categorie cat) {
        List<String> enumNames = null;
        if (cat == Categorie.Chaise) {
            enumNames = Stream.of(CatChaise.values())
            .map(Enum::name)
            .collect(Collectors.toList()); 
         }
         if (cat == Categorie.Table) {
            enumNames = Stream.of(CatTable.values())
            .map(Enum::name)
            .collect(Collectors.toList()); 
         }
         if (cat == Categorie.Lit) {
            enumNames = Stream.of(CatLit.values())
            .map(Enum::name)
            .collect(Collectors.toList()); 
         }
         if (cat == Categorie.Rangement) {
            enumNames = Stream.of(CatRange.values())
            .map(Enum::name)
            .collect(Collectors.toList()); 
         }
         return enumNames;
    }
	
}

    
    
    /*
    public Produit(String designation, double prix) {
        this.id_produit = cpt++;
        this.nom_produit = designation;
        this.prix = prix;
    }
    */
