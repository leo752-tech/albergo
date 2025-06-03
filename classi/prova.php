<?php

require_once 'C:\Users\Federico\OneDrive\Desktop\new\albergo\classi\Utility\autoloader.php';


//$u1 = new EUser(null, "leopoldo", "silvestri", new DateTime("2001-05-07"), "sulmona");

//$u2 = new ERegisteredUser(null, 1,"leo@gmail.com", "leomauri", "leopoldo", "silvestri", new DateTime("07-05-2001"), "sulmona");

//$s = new EExtraService(null, "trasporto", "ti trasèporta", 21.50);

//$c = new ERoom(null, "camera 01", 4, 40.9, "sweet");

//$re = new EReview(null, "brutta", 4, "non mi è piaciuta", new DateTime("05-08-2001"), 1 );

//$book = new EBooking(null, 1, new DateTime("05-08-2020"), new DateTime("15-08-2020"), 1,1000.00, null);

$r = FPersistentManager::getInstance()->getObject("EReview",2);