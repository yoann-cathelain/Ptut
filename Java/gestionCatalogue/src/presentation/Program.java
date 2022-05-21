package presentation;

import gestioncatalogue.dao.Produit;
import gestioncatalogue.dao.ProduitDAO;
import gestioncatalogue.metier.ProduitMetier;
import java.util.List;
/**
 *
 * @author BONARD Jerome
 */
public class Program {
    
    public static void main(String[] args) {
        
        //ProduitDAO pdao = new ProduitDAO();
        
        ProduitMetier pmet = new ProduitMetier();
        
        //Produit psearch;
        //Produit pr = new Produit("LISABO", 129);
        //Produit psearch = new Produit("LISABO", 129);
        //pdao.createProduit(pr);
        
        
        
        //psearch = pdao.getProduitById(6);
        /*
        Produit pr = pmet.getProduit(4);
        if(pr != null) {
            pr.setNomProduit("LISABON");
            pr.setPrix(829);
            pr.setCat("tables");
            pmet.updateProduit(pr);
        }
        */
        System.out.println("----------------------------------------Liste des produits---------------------------------------");
        pmet.deleteProduit(6);
        
        List<Produit> liste = pmet.getProduits();
        System.out.println("Id\tNom\t\t\t\tPrix\tDescription\t\t\tStock\tCategorie\tSous-categorie");
        System.out.println("-----------------------------------------------------------------------------------------------");
        for(Produit p : liste) {
            System.out.println(p.getIdProduit() + "\t" +p.getNomProduit() + "\t\t\t" + p.getPrix() + "\t" + p.getDescription() + "\t\t" + p.getStock() + "\t" + p.getCat() + "\t\t" + p.getSousCat());
        }
    }
}

