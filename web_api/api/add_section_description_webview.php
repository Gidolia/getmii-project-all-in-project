<?php
include "../config.php";
						    $sedd="SELECT * FROM `add_section_description`";
						    $der=$con->query($sedd);
						    $sev=$der->fetch_assoc();
						    echo $sev[description];
						    ?>