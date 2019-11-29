<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../services/gameService.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'select':
            $userAction = $_GET['userAction'];
            $computerAction = $_GET['computerAction'];

            $game = new GameService($userAction, $computerAction);
            echo $game->computeGame();die;
            break;
    }
}
?>