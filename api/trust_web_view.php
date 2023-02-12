<?php
include "../config.php";
						    $sedd="SELECT * FROM `suscription_price`";
						    $der=$con->query($sedd);
						    $sev=$der->fetch_assoc();
						    echo $sev[trusted_description];
						    ?>