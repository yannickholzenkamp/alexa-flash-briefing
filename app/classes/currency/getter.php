<?php

class Currency_Getter extends Getter {

    private $from;
    private $to;

    function build() {
        if ($this->getData() == null) {
            return;
        }

        $this->getMessage()->init("CUR");
        $this->getMessage()->setTitleText("Wechselkurs");
        $this->getMessage()->setMainText($this->getMainText());
    }

    private function getMainText() {
        $f = $this->from;
        $t = $this->to;
        $a = $this->getRate();
        return "Der aktuelle Wechselkurs zwischen $f und $t beträgt $a.";
    }

    private function getRate() {
        return str_replace('.',',',round($this->getData(), 3));
    }

}

?>