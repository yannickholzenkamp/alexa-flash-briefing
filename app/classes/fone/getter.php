<?php

class FOne_Getter extends Getter {

    protected function getData() {
        foreach ($this->data as $item) {
            if($item['time'] > time()) {
                return $item;
            }
        }
        return null;
    }

    private function getNextRace() {
        return array(
            'location' => $this->getData()['name'],
            'dayCount' => ceil(($this->getData()['time'] - time()) / 86400),
            'dayName' => strftime('%A %d %B',$this->getData()['time'])
        );
    }

    protected function getMainText() {
        $message = $this->getInstance()->getMessage();
        $nextRace = $this->getNextRace();
        $message = str_replace('%location%', $nextRace['location'], $message);
        $message = str_replace('%dayCount%', $nextRace['dayCount'], $message);
        $message = str_replace('%dayName%', $nextRace['dayName'], $message);
        return $message;
    }

}

?>