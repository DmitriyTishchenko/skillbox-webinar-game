<?php
class Game {

    public $secret = '';
    public $try = '';

    function __construct($filename, $try){
        $this->secret = file_get_contents($filename);
        $this->try = $try;
    }

    function countBullsAndCows ($try_digits, $sec_digits){
        $bulls = 0;
        $cows = 0;
        $result = [];
            foreach ($try_digits as $k => $digit){
                foreach ($sec_digits as $k2 => $digit2){
                    if ($digit == $digit2){
                        $bulls++;
                        if ($k == $k2){
                            $cows++;
                        }
                    }
                }
            }
        $result[0] = $bulls;
        $result[1] = $cows;
        return $result;
    }

    function startGame(){
        if($this->secret === $this->try){
            print('Вы выиграли!');
        } else{
            $try_digits = str_split($this->try);
            $sec_digits = str_split($this->secret);

            $result = $this->countBullsAndCows($try_digits, $sec_digits);
            print("Совпало: $result[0] цифры\n");
            print("На своих местах: $result[1]");
        }
    }

}