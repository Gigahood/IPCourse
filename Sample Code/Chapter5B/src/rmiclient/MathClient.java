package rmiclient;

import java.rmi.registry.LocateRegistry;
import java.rmi.registry.Registry;
import javax.swing.JOptionPane;
import rmiinterface.MathInterface;

public class MathClient {
  
  public static void main(String[] args) {
    String host = (args.length < 1) ? null: args[0];
    
    try {
      Registry registry = LocateRegistry.getRegistry(host);
      MathInterface stub = (MathInterface)registry.lookup("Math");
      Double n1 = Double.parseDouble(JOptionPane.showInputDialog("Enter first number: "));
      Double n2 = Double.parseDouble(JOptionPane.showInputDialog("Enter second number: "));
      Double result = stub.add(n1, n2);
      JOptionPane.showMessageDialog(null, n1 + " + " + n2 + " = " + result);
    } catch (Exception e) {
      System.err.println("Client exception: " + e.toString());
      e.printStackTrace();
    }
  }
  
}
