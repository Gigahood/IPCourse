package udpdemo;

import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.IOException;
import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;
import java.net.SocketException;
import java.net.UnknownHostException;
import javax.swing.*;

public class Client extends JFrame {

    private JTextField enterField;
    private JTextArea displayArea;
    private DatagramSocket socket;
    private InetAddress serverAddress;

    public Client() throws UnknownHostException {
        super("Client");
        String serverIP = InetAddress.getLocalHost().getHostAddress();
        serverAddress = InetAddress.getByName(serverIP);

        enterField = new JTextField("Type message here");
        enterField.addActionListener(
                new ActionListener() {

            @Override
            public void actionPerformed(ActionEvent e) {
                try {   // create and send packets
                    String message = e.getActionCommand();
                    displayArea.append("\nSending packets containing: " + message + "\n");

                    byte[] data = message.getBytes(); // convert to bytes

                    // create sendPacket
                    DatagramPacket sendPacket = new DatagramPacket(data, data.length,
                            serverAddress.getLocalHost(), 5000);

                    socket.send(sendPacket);   // send packet
                    displayArea.append("Packet sent\n");
                    displayArea.setCaretPosition(displayArea.getText().length());
                    enterField.setText("");
                } catch (IOException ex) {
                    displayMessage(ex.toString() + "\n");
                    ex.printStackTrace();
                }
            }

        }
        );

        add(enterField, BorderLayout.NORTH);

        displayArea = new JTextArea();
        add(new JScrollPane(displayArea), BorderLayout.CENTER);
        setSize(400, 300);
        setLocation(500, 0);
        setVisible(true);

        try { // create DatagramSocket for sending and receiving packets
            socket = new DatagramSocket();
        } catch (SocketException ex) {
            ex.printStackTrace();
            System.exit(1);
        }
    }

    public void waitForPackets() {
        while (true) {
            try {
                byte[] data = new byte[100];   // set up packet
                DatagramPacket receivePacket = new DatagramPacket(data, data.length);

                socket.receive(receivePacket);  // wait for packet

                // display packet contents
                String message = new String(receivePacket.getData(), 0, receivePacket.getLength());
                displayMessage("\nPacket received: "
                        + "\nFrom host: " + receivePacket.getAddress()
                        + "\nHost port: " + receivePacket.getPort()
                        + "\nLength: " + receivePacket.getLength()
                        + "\nContaining: \n\t"
                        + message);
            } catch (IOException ex) {
                displayMessage(ex.toString() + "\n");
                ex.printStackTrace();
            }
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
}
