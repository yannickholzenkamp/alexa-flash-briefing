<?php

class Alb_Getter extends Getter {

    private $MAX_IN_FUTURE = 604800;
    private $MESSAGE_STARTSTRING = 'Abfallwirtschaft Abholung: ';

    function build() {
        $items = $this->getNext();
        if (count($items) < 1) {
            return;
        }

        $this->getMessage()->init("ALB");
        $this->getMessage()->setTitleText("Abfallwirtschaft Abholung");
        $this->getMessage()->setMainText($this->getMainText($items));
    }

    function get() {
        return $this->getMessage()->get();
    }

    private function getNext() {
        $next = array();
        foreach ($this->getData() as $item) {
            if($item['date'] > time() && $item['date'] < time() + TimeSpan::One_Week) {
                array_push($next, $this->getItemText($item));
            }
        }
        return $next;
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

    private function getMainText($aItems) {
        $text = $this->MESSAGE_STARTSTRING;
        foreach ($aItems as $item) {
            $text .= $item;
        }
        return $text;
    }

}

?>