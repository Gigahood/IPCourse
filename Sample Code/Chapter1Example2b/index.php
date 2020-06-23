<?php

require('Page.php');

$homepage = new Page();

$homepage->content = "<!-- page content -->
                            <section>
                            <h2>Welcome to Outdoor Event Supplies homepage.</h2>
                            <p>Please have a look.</p>
                            <p>We hope to hear from you soon.</p>
                            </section>";

$homepage->display();
?>