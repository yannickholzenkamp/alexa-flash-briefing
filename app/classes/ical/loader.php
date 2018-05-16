<?php

use ICal\ICal;

class Ical_Loader extends Loader {

    function load() {
        if ($this->isUpToDate()) {
            return;
        }

        try {
            $ical = new ICal('ICal.ics', array(
                'defaultSpan'                 => 2,
                'defaultTimeZone'             => 'UTC',
                'defaultWeekStart'            => 'MO',
                'disableCharacterReplacement' => false,
                'skipRecurrence'              => false,
                'useTimeZoneWithRRules'       => false,
            ));
            $ical->initUrl($this->instance->getParams()['ical_url']);
        } catch (\Exception $e) {
            die($e);
        }

        $json_array = array();

        foreach ($ical->events() as $event) {
            $date = substr_replace($event->dtstart, '-', 4, 0);
            $date = substr_replace($date, '-', 7, 0);
            array_push($json_array, array(
                'summary' => $event->summary,
                'date' => strtotime($date)
            ));
        }

        $this->setData($json_array);
        $this->writeDataToFile();
    }

}

?>