<?php

class Foodplan_Getter extends Getter {

    protected function getData() {
        $events = array();
        foreach ($this->data as $item) {
            if($item['date'] > time() - (TimeSpan::One_Day) && $item['date'] < time()) {
                array_push($events, $item);
            }
        }
        return $events;
    }

    protected function getMainText() {
        $message = $this->getInstance()->getMessage();
        foreach ($this->getData() as $event) {
            switch (substr($event['summary'], 0, 1)) {
                case 'L':
                case 'M':
                    $summary = str_replace('M', '', $event['summary']);
                    $message = str_replace('%lunch%', $summary, $message);
                    break;
                case 'D':
                case 'A':
                    $summary = str_replace('A', '', $event['summary']);
                    $message = str_replace('%dinner%', $summary, $message);
                    break;
            }
        }
        return $message;
    }

}

?>