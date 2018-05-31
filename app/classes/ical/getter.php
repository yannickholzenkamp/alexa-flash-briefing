<?php

class Ical_Getter extends Getter {

    protected function getData() {
        foreach ($this->data as $item) {
            if($item['date'] > time() - (TimeSpan::One_Day) && $item['date'] < time()) {
                return $item;
            }
        }
        return null;
    }

    protected function getMainText() {
        return str_replace('%event%', $this->getData()['summary'], $this->getInstance()->getMessage());
    }

}

?>