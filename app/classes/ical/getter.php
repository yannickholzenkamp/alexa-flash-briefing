<?php

class Ical_Getter extends Getter {

    private $MESSAGE_STARTSTRING = 'Zum Abendessen gibt es heute: ';
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
            if($item['date'] > time() - (TimeSpan::One_Day) && $item['date'] < time()) {
                return $item;
            }
        }
        return null;
    }

    protected function getMainText() {
        return $this->MESSAGE_STARTSTRING . ' ' . $this->item['summary'];
    }

}

?>