<?php

class Alb_Getter extends Getter {

    private $MAX_IN_FUTURE = 604800;
    private $MESSAGE_STARTSTRING = 'Abfallwirtschaft Abholung: ';

    function build() {
        $item = $this->getNext();
        if ($item == null) {
            return;
        }

        $this->getMessage()->init("ALB");
        $this->getMessage()->setTitleText("Abfallwirtschaft Abholung");
        $this->getMessage()->setMainText($this->getMainText($item));
    }

    function get() {
        return $this->getMessage()->get();
    }

    private function getNext() {
        foreach ($this->getData() as $item) {
            if($item['date'] > time() && $item['date'] < time() + TimeSpan::One_Week) {
                return $item;
            }
        }
        return null;
    }

    private function getMainText($aItem) {
        $itemType = $aItem['type'];
        $itemDays = ceil(($aItem['date'] - time()) / 86400);
        $itemDayName = strftime('%A',$aItem['date']);
        switch ($itemDays) {
            case 1:
                return $this->MESSAGE_STARTSTRING."$itemType morgen.";
            default:
                return $this->MESSAGE_STARTSTRING."$itemType am $itemDayName.";
        }
    }

}

?>