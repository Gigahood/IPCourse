package rmiserver;

import java.rmi.RemoteException;
import java.rmi.registry.LocateRegistry;
import java.rmi.registry.Registry;
import java.rmi.server.UnicastRemoteObject;
import rmiinterface.MathInterface;

public class MathServer implements MathInterface {
  @Override
  public Double add(Double num1, Double num2) throws RemoteException {
    return num1 + num2;
  }
  
  public static void main(String[] args) {
    try {
      MathServer server = new MathServer();
      MathInterface stub = (MathInterface)UnicastRemoteObject.exportObject(server, 0);
      
      Registry registry = LocateRegistry.getRegistry();
      registry.bind("Math", stub);
      
      System.err.println("Server ready");
    } catch (Exception e) {
      System.err.println("Server exception: " + e.toString());
      e.printStackTrace();
    }
  }
  
  
}
