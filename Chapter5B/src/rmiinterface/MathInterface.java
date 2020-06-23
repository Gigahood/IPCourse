package rmiinterface;

import java.rmi.Remote;
import java.rmi.RemoteException;

public interface MathInterface extends Remote {
  Double add(Double num1, Double num2) throws RemoteException;
}
