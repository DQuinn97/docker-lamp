<?php

require_once("User.class.php");

$u = new User();
$u->setName("John Doe");
$u->setEmail("XmOx3@example.com");

echo $u->getId();

$u2 = new User();
$u3 = new User();

echo $u2->getId();
echo $u3->getId();
