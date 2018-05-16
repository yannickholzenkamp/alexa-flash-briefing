<?php

class Currency_Getter extends Getter {

    protected function getMainText() {
        $from = $this->getInstance()->getParams()['from'][1];
        $to = $this->getInstance()->getParams()['to'][1];
        $a = $this->getRate();
        return "Der aktuelle Wechselkurs zwischen $from und $to beträgt $a.";
    }

    private function getRate() {
        return str_replace('.',',',round($this->getData(), 2));
    }

}

?>