package gestioncatalogue.controleur;

import gestioncatalogue.vue.InterfaceGraphique;
import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author BONARD Jerome
 */
public class TestInterfaceGraphique {
 
        /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            @Override
            public void run() {
                try {
                    new InterfaceGraphique().setVisible(true);
                } catch (IOException ex) {
                    Logger.getLogger(TestInterfaceGraphique.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
        });
    }
    
    
    
}
