<?php

class Config {

    static function define() {
        return array(
            new Alb_Getter(),
            new Currency_Getter(array('EUR', 'Euro'), array('CHF', 'Schweizer Franken'))
        );
    }

}

?>