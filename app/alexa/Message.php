<?php

class Message {

    private $uid;
    private $updateDate;
    private $titleText;
    private $mainText;

    function init($aIdentifier) {
        $this->uid = date('Ymd').'_'.$aIdentifier;
        $this->updateDate = $this->generateDateTime();
    }

    function setUid($aUid) {
        $this->uid = $aUid;
    }

    function setTitleText($aTitleText) {
        $this->titleText = $aTitleText;
    }

    function setMainText($aMainText) {
        $this->mainText = $aMainText;
    }

    function get() {
        return array(
            'uid' => $this->uid,
            'updateDate' => $this->updateDate,
            'titleText' => $this->titleText,
            'mainText' => $this->mainText
        );
    }

    private function generateDateTime() {
        $date = date('Y-m-d');
        $time = date('H:i:s');
        return $date.'T'.$time.'0Z';
    }

}

?>