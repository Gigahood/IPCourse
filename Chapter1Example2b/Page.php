<?php
class Page {
    // class Page's attributes
    public $content;
    public $title = "Outdoor Event Supplies";

    public $buttons = array("Home"      => "index.php",
                            "Contact"   => "contact.php",
                            "Order"     => "orderform.html",
                            "Services"  => "ServicesPage.php"
                       );
    
    // class Page's operations
    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function display() {
        echo "<html>\n<head>\n";
        $this->displayTitle();
        $this->displayStyles();
        echo "</head>\n<body>\n";
        $this->displayHeader();
        $this->displayMenu($this->buttons);
        echo $this->content;
        $this->displayFooter();
        echo "</body>\n</html>\n";
    }

    public function displayTitle() {
        echo "<title>" . $this->title . "</title>";
    }

    public function displayStyles() {
        ?>
        <link href="styles.css" type="text/css" rel="stylesheet">
        <?php
    }

    public function displayHeader() {
        ?>
        <!-- page header -->
        <header>
            <img src="logo.png" alt="" height="70" width="70" />
            <h1>Outdoor Event Supplies</h1>
        </header>
        <?php
    }

    public function displayMenu($buttons) {
        echo "<!-- menu -->
        <nav>";

        while (list($name, $url) = each($buttons)) {
            $this->displayButton($name, $url, !$this->isURLCurrentPage($url));
        }
        echo "</nav>\n";
    }

    public function isURLCurrentPage($url) {
        if (strpos($_SERVER['PHP_SELF'], $url) == false) {
            return false;
        } else {
            return true;
        }
    }

    public function displayButton($name, $url, $active=true) {
        if ($active) { 
            ?>
            <div class="menuitem">
                <a href="<?=$url?>">
                    <img src="s-logo.gif" alt="" height="20" width="20" />
                    <span class="menutext"><?=$name?></span>
                </a>
            </div>
            <?php
        } else {
            ?>
            <div class="menuitem">
                <img src="side-logo.gif" alt="" height="10" width="10" />
                <span class="menutext"><?=$name?></span>
            </div>
            <?php
        }
    }

    public function displayFooter() {
        ?>
        <!-- page footer --> 
        <footer>
            <p>&copy; Outdoor Event Supplies <br />
            Please see our
            <a href="legal.php">legal information page</a>.</p>
        </footer>
        <?php
    }

}