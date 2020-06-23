package tcpdemo;

import java.awt.BorderLayout;
import java.awt.event.*;
import java.io.*;
import java.net.ServerSocket;
import java.net.Socket;
import javax.swing.*;

public class Server extends JFrame {

  private JTextField enterField;
  private JTextArea displayArea;
  private ObjectOutputStream output;  // output stream to client
  private ObjectInputStream input;    // input stream from client
  private ServerSocket server;        // server socket
  private Socket connection;          // connection to client
  private int counter = 1;            // to count the number of connections

  public Server() {
    super("Server");
    enterField = new JTextField();
    enterField.setEditable(false);
    enterField.addActionListener(
            new ActionListener() {

              // send message to client
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
    setVisible(true);
  }

  public void runServer() {
    try {
      server = new ServerSocket(12345, 100);
      while (true) {
        try {
          waitForConnection();
          getStreams();
          processConnection();
        } catch (EOFException ex) {
          displayMessage("\nServer terminated connection");
        } finally {
          closeConnection();
          counter++;
        }
      }
    } catch (IOException ex) {
      ex.printStackTrace();
    }
  }

  private void waitForConnection() throws IOException {
    displayMessage("Waiting for connection\n");
    connection = server.accept();
    displayMessage("Connection " + counter + " received from: "
            + connection.getInetAddress().getHostName());
  }

  private void getStreams() throws IOException {
    // set up output stream for objects
    output = new ObjectOutputStream(connection.getOutputStream());
    output.flush();

    // set up input stream for objects
    input = new ObjectInputStream(connection.getInputStream());

    displayMessage("\nGot I/O streams\n");
  }

  private void processConnection() throws IOException {
    String message = "Connection successful";
    sendData(message);

    setTextFieldEditable(true);

    do {
      try {
        message = (String) input.readObject();
        displayMessage("\n" + message);
      } catch (ClassNotFoundException ex) {
        displayMessage("\nUnknown object type received");
      }
    } while (!message.equals("CLIENT>>> TERMINATE"));
  }

  private void closeConnection() {
    displayMessage("\nTerminating connection\n");
    setTextFieldEditable(false);

    try {
      output.close();
      input.close();
      connection.close();
    } catch (IOException ex) {
      ex.printStackTrace();
    }
  }

  private void sendData(String message) {
    try {
      output.writeObject("SERVER>>> " + message);
      output.flush(); 
      displayMessage("\nSERVER>>> " + message);
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
