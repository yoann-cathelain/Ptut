package gestioncatalogue.vue;

import gestioncatalogue.metier.Client;
import java.util.ArrayList;
import java.util.List;
import javax.swing.table.AbstractTableModel;

/**
 *
 * @author BONARD Jerome
 */

public class ClientTableModel extends AbstractTableModel {
    private final String[] columnNamesClient = { "Id Client","Nom Client", "Mot de passe", "Email"};
    private final List<Client> listeClients = new ArrayList<>();
    private final Class[] typesClient = new Class [] { java.lang.Object.class, java.lang.Object.class, java.lang.Object.class, java.lang.Object.class };
     
    public ClientTableModel() {
        super();
    }

    @Override
    public int getColumnCount() { return columnNamesClient.length; }
    
    @Override
    public int getRowCount() { return listeClients.size(); }
    
    @Override
    public String getColumnName(int columnIndex) { return columnNamesClient[columnIndex]; }
   
    @Override
    public boolean isCellEditable(int rowIndex, int columnIndex) {
        return false;
    }

    @Override
    public Class getColumnClass(int columnIndex) {
        return typesClient [columnIndex];
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        return switch (columnIndex) {
            case 0 -> listeClients.get(rowIndex).getIdClient();
            case 1 -> listeClients.get(rowIndex).getNomClient();
            case 2 -> listeClients.get(rowIndex).getMDPClient();
            case 3 -> listeClients.get(rowIndex).getEmailClient();
            default -> null;
        };
    }
    
    @Override
    //Methode Set pour permettre la mise à jour des données dans le modele de tableau
    public void setValueAt(Object value, int rowIndex, int columnIndex) {
        if(value != null){
            Client c = listeClients.get(rowIndex);     
                switch(columnIndex){
                    case 1 -> c.setNomClient((String) value);
                    case 2 -> c.setMDPClient((String) value);
                    case 3 -> c.setEmailClient((String) value);
                }
                fireTableCellUpdated(rowIndex,columnIndex);
            }
        }
  
        public void addRow(Client c) {
            listeClients.add(c);
            fireTableRowsInserted(listeClients.size() -1, listeClients.size() -1);
        }
  
        public void removeRow(int rowIndex) {
            listeClients.remove(rowIndex);
            rowIndex = rowIndex-1;
            fireTableRowsDeleted(rowIndex, rowIndex);
        }
}