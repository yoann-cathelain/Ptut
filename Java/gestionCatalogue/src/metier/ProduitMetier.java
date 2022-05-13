package metier;

import dao.Produit;
import dao.ProduitDAO;
import java.util.List;

/**
 *
 * @author BONARD Jerome
 */
public class ProduitMetier {
    private final ProduitDAO pdao = new ProduitDAO();
        
    public List<Produit> getProduits() { return pdao.getProduits(); }
    
    public Produit getProduit(int id_produit) { return pdao.getProduitById(id_produit); }  
        
        
    public void updateProduit(Produit pr) { pdao.updateProduit(pr); }
    
    public void deleteProduit(int id_produit) { pdao.deleteProduit(id_produit); }    
      
}
