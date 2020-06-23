package udpdemo;

import java.awt.BorderLayout;
import java.io.*;
import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.SocketException;
import javax.swing.*;

public class Server extends JFrame {

  private JTextArea displayArea;
  private DatagramSocket socket;    // socket to connect to client

  public Server() {
    super("Server");

    displayArea = new JTextArea();
    add(new JScrollPane(displayArea), BorderLayout.CENTER);
    setSize(400, 300);
    setVisible(true);

    try {
      socket = new DatagramSocket(5000);
    } catch (SocketException ex) {
      ex.printStackTrace();
      System.exit(1);
    }
  }

  public void waitForPackets() {
    while (true) {
      try { // receive packet, display contents, return copy to client
        byte[] data = new byte[100];    // set up packet
        DatagramPacket receivePacket = new DatagramPacket(data, data.length);

        socket.receive(receivePacket);  // wait to receive packet

        // display information from received packet
        String message = new String(receivePacket.getData(), 0, receivePacket.getLength());
        displayMessage("\nPacket received: "
                + "\nFrom host: " + receivePacket.getAddress()
                + "\nHost port: " + receivePacket.getPort()
                + "\nLength: " + receivePacket.getLength()
                + "\nContaining:\n\t"
                + message);

        sendPacketToClient(receivePacket);  // send packet to client
      } catch (IOException ex) {
        displayMessage(ex.toString() + "\n");
        ex.printStackTrace();
      }
    }
  }

  private void sendPacketToClient(DatagramPacket receivePacket) throws IOException {
    displayMessage("\n\nEcho data to client...");
    
    // create packet to send
    DatagramPacket sendPacket = new DatagramPacket(
            receivePacket.getData(), receivePacket.getLength(),
            receivePacket.getAddress(), receivePacket.getPort());
    
    socket.send(sendPacket); // send packet to client
    displayMessage("Packet sent\n");
  }

  private void displayMessage(final String messageToDisplay) {
    SwingUtilities.invokeLater(
            new Runnable() {

              @Override
              public void run() {
                displayArea.append(messageToDisplay);
              }

            }
    );
  }

}
