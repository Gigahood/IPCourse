package tcpdemo;

import java.awt.BorderLayout;
import java.awt.event.*;
import java.io.*;
import java.net.InetAddress;
import java.net.Socket;
import javax.swing.*;

public class Client extends JFrame {
  private JTextField enterField;
  private JTextArea displayArea;
  private ObjectOutputStream output;
  private ObjectInputStream input;
  private String message = "";
  private String chatServer;      // host server for this application
  private Socket client;

  public Client(String host) {
    super("Client");
    chatServer = host;    // set server to which this client connects

    enterField = new JTextField();
    enterField.setEditable(false);
    enterField.addActionListener(
            new ActionListener() {
              // send message to server
              @Override
              public void actionPerformed(ActionEvent e) {
                sendData(e.getActionCommand());
                enterField.setText("");
              }

            }
    );
    
    add(enterField, BorderLayout.NORTH);
    displayArea = new JTextArea();
    add(new JScrollPane(displayArea), BorderLayout.CENTER);
    
    setSize(300, 150);
    this.setLocation(500, 0);
    setVisible(true);
  }
  
  public void runClient() {
    try {
      connectToServer();
      getStreams();
      processConnection();
    } catch (EOFException ex) {
      displayMessage("\nClient terminated connection");
    } catch (IOException ex) {
      ex.printStackTrace();
    } finally {
      closeConnection();
    }
  }
  
  private void connectToServer() throws IOException {
    displayMessage("Attempting connection\n");
    
    // create Socket to make connection to server
    client = new Socket(InetAddress.getByName(chatServer), 12345);
    
    // display connection information
    displayMessage("Connected to: " + client.getInetAddress().getHostName());
  }
  
  private void getStreams() throws IOException {
    // set up output stream for objects
    output = new ObjectOutputStream(client.getOutputStream());
    output.flush();
    
    // set up input stream for objects
    input = new ObjectInputStream(client.getInputStream());
    
    displayMessage("\nGot I/O streams\n");
  }

  private void processConnection() throws IOException {
    setTextFieldEditable(true);
    
    do {
      try {
        message = (String)input.readObject();
        displayMessage("\n" + message);
      } catch (ClassNotFoundException ex) {
        displayMessage ("\nUnknown object type received");
      }
    } while (!message.equals("SERVER>>> TERMINATE"));
  }
  
  private void closeConnection() {
    displayMessage("\nTerminating connection\n");
    setTextFieldEditable(false);

    try {
      output.close();
      input.close();
      client.close();
    } catch (IOException ex) {
      ex.printStackTrace();
    }
  }
  
  private void sendData(String message) {
    try {
      output.writeObject("CLIENT>>> " + message);
      output.flush();
      displayMessage("\nCLIENT>>> " + message);
    } catch (IOException ioException) {
      displayArea.append("\nError writing object");
    }
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

  private void setTextFieldEditable(final boolean editable) {
    SwingUtilities.invokeLater(
            new Runnable() {

              @Override
              public void run() {
                enterField.setEditable(editable);
              }

            }
    );
  }
}
