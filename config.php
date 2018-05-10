<?php

class Config {

    static function define() {
        return array(
            Config::alb(),
            Config::currency()
        );
    }

    static function alb() {
        $alb = new Instance();
        $alb->setGetter(new Alb_Getter());
        $alb->setFileName('alb');
        return $alb;
    }

    static function currency() {
        $currency = new Instance();
        $currency->setGetter(new Currency_Getter());
        $currency->setLoader(new Currency_Loader());
        $currency->setCachingTime(TimeSpan::Six_Hours);
        $currency->setFileName('currency');
        $currency->setParams(array(
            'from' => array('EUR', 'Euro'),
            'to' => array('CHF', 'Schweizer Franken')
        ));
        return $currency;
    }

}

?>