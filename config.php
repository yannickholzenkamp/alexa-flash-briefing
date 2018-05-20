<?php

class Config {

    static function define() {
        return array(
            Config::alb(),
            Config::currency(),
            Config::food(),
            Config::fone()
        );
    }

    static function alb() {
        $instance = new Instance();
        $instance->setGetter(new Alb_Getter());
        $instance->setUid('alb');
        $instance->setTitle('Abfallwirtschaft');
        return $instance;
    }

    static function currency() {
        $instance = new Instance();
        $instance->setGetter(new Currency_Getter());
        $instance->setLoader(new Currency_Loader());
        $instance->setUid('currency');
        $instance->setTitle('Wechselkurs');
        $instance->setCachingTime(TimeSpan::Six_Hours);
        $instance->setParams(array(
            'from' => array('EUR', 'Euro'),
            'to' => array('CHF', 'Schweizer Franken')
        ));
        return $instance;
    }

    static function food() {
        $instance = new Instance();
        $instance->setGetter(new Ical_Getter());
        $instance->setLoader(new Ical_Loader());
        $instance->setUid('food');
        $instance->setTitle('Essensplan');
        $instance->setCachingTime(TimeSpan::Six_Hours);
        $instance->setParams(array(
            'ical_url' => 'https://calendar.google.com/calendar/ical/g7mo110mnn08b3l577mgrggefs%40group.calendar.google.com/private-c5a999abf133d71542b309157746bc71/basic.ics'
        ));
        return $instance;
    }

    static function fone() {
        $instance = new Instance();
        $instance->setGetter(new FOne_Getter());
        $instance->setLoader(new FOne_Loader());
        $instance->setUid('fone');
        $instance->setTitle('Formel 1');
        $instance->setCachingTime(TimeSpan::One_Day);
        $instance->setParams(array(
            'season' => 2018
        ));
        return $instance;
    }

}

?>