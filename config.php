<?php

class Config {

    static function define() {
        return array(
            Config::alb(),
            Config::currency()
        );
    }

    static function alb() {
        $instance = new Instance();
        $instance->setGetter(new Alb_Getter());
        $instance->setFileName('alb');
        return $instance;
    }

    static function currency() {
        $instance = new Instance();
        $instance->setGetter(new Currency_Getter());
        $instance->setLoader(new Currency_Loader());
        $instance->setCachingTime(TimeSpan::Six_Hours);
        $instance->setFileName('currency');
        $instance->setParams(array(
            'from' => array('EUR', 'Euro'),
            'to' => array('CHF', 'Schweizer Franken')
        ));
        return $instance;
    }

}

?>