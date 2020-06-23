package udpdemo;

import java.net.UnknownHostException;
import javax.swing.JFrame;

public class ClientTest {

  public static void main(String[] args) throws UnknownHostException {
    Client application = new Client();
    application.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    application.waitForPackets();
  }
  
}
