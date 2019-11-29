<?php

include '../model/gameModel.php';

class GameService
{
    private $userAction = null;
    private $computerAction = null;

    function __construct(string $userAction, string $computerAction)
    {
        $this->userAction = $userAction;
        $this->computerAction = $computerAction;
        $this->computeGame();
    }

    function computeGame()
    {
        echo EVAL_GAME[$this->userAction][$this->computerAction];die;
        return EVAL_GAME[$this->userAction][$this->computerAction];
    }
}

?>