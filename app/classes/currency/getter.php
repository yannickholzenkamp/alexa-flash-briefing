<?php

class Currency_Getter extends Getter {

    function build() {
        if ($this->getData() == null) {
            return;
        }

        $this->getMessage()->init("CUR");
        $this->getMessage()->setTitleText("Wechselkurs");
        $this->getMessage()->setMainText($this->getMainText());
    }

    private function getMainText() {
        $from = $this->instance->getParams()['from'][1];
        $to = $this->instance->getParams()['to'][1];
        $a = $this->getRate();
        return "Der aktuelle Wechselkurs zwischen $from und $to beträgt $a.";
    }

    private function getRate() {
        return str_replace('.',',',round($this->getData(), 3));
    }

}

?>