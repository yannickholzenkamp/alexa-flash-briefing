<?php

class Message {

    private $uid;
    private $updateDate;
    private $titleText;
    private $mainText;

    function init($aIdentifier) {
        $this->uid = date('Ymd').'_'.$aIdentifier;
        $this->updateDate = date('Ymd_Hi');
    }

    function setUid($aUid) {
        $this->uid = $aUid;
    }

    function setUpdateDate($aUpdateDate) {
        $this->updateDate = $aUpdateDate;
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

}

?>