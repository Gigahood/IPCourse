<?php
    require ("Page.php");

    class ServicesPage extends Page {
        private $row2buttons = array(
                                "Event Planning"    => "eventplanning.php",
                                "Outdoor Supplies"  => "outdoorsupplies.php",
                                "Photography"       => "photography.php"
                               );
        
        public function display() {
            //echo '<html><body>In function display()...</body></html>';
            
            echo "<html>\n<head>\n";
            $this->displayTitle();
            $this->displayStyles();
            echo "</head>\n<body>\n";
            $this->displayHeader();
            $this->displayMenu($this->buttons);
            $this->displayMenu($this->row2buttons);
            echo $this->content;
            $this->displayFooter(); 
            echo "</body>\n</html>\n";
           
        }
    }

    $services = new ServicesPage();

    $services->content = "<p>At Outdoor Event Supplies, we offer event planning, 
    outdoor supplies and photography.</p>";

    $services->display();
?>