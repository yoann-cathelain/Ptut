package gestioncatalogue.vue;

import gestioncatalogue.metier.Produit;
import java.util.ArrayList;
import java.util.List;
import javax.swing.table.AbstractTableModel;

/**
 *
 * @author BONARD Jerome
 */

public class ProduitTableModel extends AbstractTableModel {
    private final String[] columnNames = { "Id Produit","Nom Produit", "Description", "Prix", "En promotion", "Tx promo", "Prix reduit", "Stock", "Categorie", "Sous-categorie"};
    private final List<Produit> listeProduits = new ArrayList<>();
    private final Class[] types = new Class [] {
        java.lang.Integer.class, java.lang.Object.class, java.lang.Object.class, java.lang.Object.class, java.lang.Boolean.class,  java.lang.Object.class,  java.lang.Object.class,  java.lang.Object.class,  java.lang.Object.class, java.lang.Object.class
    };
    
    /*
    // pour autoriser ou non a editer une cellule, d'une colonne, pour la modifier.
    private final boolean[] canEdit = new boolean [] {
        false, false, false, false, true, false, false, false, false, false
    };
    */
     
    public ProduitTableModel() {
        super();
    }

    @Override
    public int getColumnCount() { return columnNames.length; }
    
    @Override
    public int getRowCount() { return listeProduits.size(); }
    
    @Override
    public String getColumnName(int columnIndex) { return columnNames[columnIndex]; }
   
    @Override
    public boolean isCellEditable(int rowIndex, int columnIndex) {
        return switch (columnIndex) {
            case 4 -> true;
            case 5 -> (Boolean) getValueAt(rowIndex, 4);
            default -> false;
        };
    }

    @Override
    public Class getColumnClass(int columnIndex) {
        return types [columnIndex];
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        return switch (columnIndex) {
            case 0 -> listeProduits.get(rowIndex).getIdProduit();
            case 1 -> listeProduits.get(rowIndex).getNomProduit();
            case 2 -> listeProduits.get(rowIndex).getDescription();
            case 3 -> listeProduits.get(rowIndex).getPrix();
            case 4 -> listeProduits.get(rowIndex).getEnPromo();
            case 5 -> listeProduits.get(rowIndex).getTx_promo();
            case 6 -> listeProduits.get(rowIndex).getPrixReduit();
            case 7 -> listeProduits.get(rowIndex).getStock();
            case 8 -> listeProduits.get(rowIndex).getCat();
            case 9 -> listeProduits.get(rowIndex).getSousCat();
            default -> null;
        };
    }
    
    @Override
    //Methode Set pour permettre la mise à jour des données dans le modele de tableau
    public void setValueAt(Object value, int rowIndex, int columnIndex) {
        if(value != null){
            Produit p = listeProduits.get(rowIndex);     
                switch(columnIndex){
                    case 2-> p.setDescription((String)value);
                    case 3 -> p.setPrix((double)value);
                    case 4 -> p.setEnPromo((boolean)value);
                    case 5 -> {
                        int tx;
                        String str = (String) value;
                        tx = Integer.parseInt((String)str);
                        p.setTx_promo((int)tx);
                    }
                    case 6 -> p.setPrixReduit((double)value);
                    case 7 -> p.setStock((int)value);
                }
                fireTableCellUpdated(rowIndex,columnIndex);
            }
        }
  
        public void addRow(Produit p) {
            listeProduits.add(p);
            fireTableRowsInserted(listeProduits.size() -1, listeProduits.size() -1);
        }
  
        public void removeRow(int rowIndex) {
            listeProduits.remove(rowIndex);
            rowIndex = rowIndex-1;
            fireTableRowsDeleted(rowIndex, rowIndex);
        }
}

//import javax.swing.table.DefaultTableModel;

/*
public class ProduitTableModel extends DefaultTableModel {
    
    private Object[] values = null;
    public static final int PRIX_INDEX = 3;
    public static final int TAUX_PROMO_INDEX = 5;
    public static final int PRIX_REDUIT_INDEX = 6;
    private final  String[] columnNames = { "Id Produit","Nom Produit", "Description", "Prix", "En promotion", "Tx promo", "Prix reduit", "Stock", "Categorie", "Sous-categorie"};
    private final Class[] types = new Class [] {
        java.lang.Integer.class, java.lang.Object.class, java.lang.Object.class, java.lang.Double.class, java.lang.Boolean.class,  java.lang.Integer.class,  java.lang.Double.class,  java.lang.Integer.class,  java.lang.Object.class, java.lang.Object.class
    };
    
    /*
    // pour autoriser ou non a editer une cellule, d'une colonne, pour la modifier.
    private final boolean[] canEdit = new boolean [] {
        false, false, false, false, true, false, false, false, false, false
    };
*/

/*     
    public ProduitTableModel(ArrayList<Produit> listeProduits) {
        super();
        for(String columnName : columnNames) addColumn(columnName);
        for(Produit p : listeProduits) {
            values = new Object[] {
                p.getIdProduit(),
                p.getNomProduit(),
                p.getDescription(),
                p.getPrix(),
                p.getEnPromo(),
                p.getTx_promo(),
                p.getPrixReduit(),
                p.getStock(),
                p.getCat(),
                p.getSousCat() };
            addRow(values);
        }
    }

    @Override
    public int getColumnCount() { return 10; }
*/   /* 
    @Override
    public int getRowCount() {        
        int i=0;
        if(values == null) {
            return 0;
        } else {
            for (Object o : values)
                if (o!=null) i++;
            return i;
        }
    }
    *//*
    @Override
    public boolean isCellEditable(int rowIndex, int columnIndex) {
        return switch (columnIndex) {
            case 4 -> true;
            case 5 -> (Boolean) getValueAt(rowIndex, 4);
            default -> false;
        };
    }
     
    @Override
    public Class getColumnClass(int columnIndex) {
        return types [columnIndex];
    }
     
}
*/