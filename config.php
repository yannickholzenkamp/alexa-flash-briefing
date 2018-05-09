<?php

class Config {

    static function getter() {
        return array(
            new Alb_Getter(),
            new Currency_Getter(array('EUR', 'Euro'), array('CHF', 'Schweizer Franken'))
        );
    }

}

?>