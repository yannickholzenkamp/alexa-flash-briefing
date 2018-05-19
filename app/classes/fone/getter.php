<?php

class FOne_Getter extends Getter {

    private $MESSAGE_STARTSTRING = 'Das nächste Formel 1 Rennen ist: ';
    private $item;

    function build() {
        $this->item = $this->getNext();
        if ($this->item == null) {
            return;
        }

        $this->getMessage()->init($this->getInstance()->getUid());
        $this->getMessage()->setTitleText($this->getInstance()->getTitle());
        $this->getMessage()->setMainText($this->getMainText());
    }

    private function getNext() {
        foreach ($this->getData() as $item) {
            if($item['time'] > time()) {
                return $item;
            }
        }
        return null;
    }

    private function getItemText() {
        $item = $this->item;
        $location = $item['name'];
        $days = ceil(($item['time'] - time()) / 86400);
        $dayName = strftime('%A den %d %B',$item['time']);
        switch ($days) {
            case 1:
                return "$location morgen. ";
            default:
                return "$location am $dayName. ";
        }
    }

    protected function getMainText() {
        return $this->MESSAGE_STARTSTRING . ' ' . $this->getItemText();
    }

}

?>