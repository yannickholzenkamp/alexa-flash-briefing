<?php

require_once 'app/alexa/Message.php';

class AlbGetter {

    private $MAX_IN_FUTURE = 604800;
    private $MESSAGE_STARTSTRING = 'Abfallwirtschaft Abholung: ';
    private $filecontent;
    private $message;

    function __construct() {
        $this->filecontent = json_decode(file_get_contents('app/data/json/alb-2018.json'), true);
    }

    function build() {
        $item = $this->getNext();
        if ($item == null) {
            return;
        }

        $this->message = new Message();
        $this->message->init("ALB");
        $this->message->setTitleText("Abfallwirtschaft Abholung");
        $this->message->setMainText($this->getMainText($item));
    }

    function get() {
        return json_encode($this->message->get(), JSON_UNESCAPED_UNICODE);
    }

    private function getNext() {
        foreach ($this->filecontent as $item) {
            if($item['date'] > time() && $item['date'] < time() + $this->MAX_IN_FUTURE) {
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