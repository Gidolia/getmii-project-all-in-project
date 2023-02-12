<?php
include "../config.php";
						    $sedd="SELECT * FROM `privacy_description`";
						    $der=$con->query($sedd);
						    $sev=$der->fetch_assoc();
						    echo $sev[description];
						    ?>