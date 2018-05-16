<?php

class Alb_Getter extends Getter {

    private $MAX_IN_FUTURE = 604800;
    private $MESSAGE_STARTSTRING = 'Abfallwirtschaft Abholung: ';
    private $items = array();

    function build() {
        $this->getNext();
        if (count($this->items) < 1) {
            return;
        }

        $this->getMessage()->init($this->getInstance()->getUid());
        $this->getMessage()->setTitleText($this->getInstance()->getTitle());
        $this->getMessage()->setMainText($this->getMainText());
    }

    private function getNext() {
        foreach ($this->getData() as $item) {
            if($item['date'] > time() && $item['date'] < time() + TimeSpan::One_Week) {
                array_push($this->items, $this->getItemText($item));
            }
        }
    }

    private function getItemText($aItem) {
        $itemType = $aItem['type'];
        $itemDays = ceil(($aItem['date'] - time()) / 86400);
        $itemDayName = strftime('%A',$aItem['date']);
        switch ($itemDays) {
            case 1:
                return "$itemType morgen. ";
            default:
                return "$itemType am $itemDayName. ";
        }
    }

    protected function getMainText() {
        $text = $this->MESSAGE_STARTSTRING;
        foreach ($this->items as $item) {
            $text .= $item;
        }
        return $text;
    }

}

?>