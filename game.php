<?php
require('lib.php');
$NewGame = new Game('secret.txt', $argv[1]);
$NewGame->startGame();