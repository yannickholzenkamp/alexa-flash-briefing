<?php

class Currency_Getter extends Getter {

    private $from;
    private $to;

    function __construct($from, $to) {
        $this->from = $from[1];
        $this->to = $to[1];

        $this->setLoader(new Currency_Loader($from[0], $to[0]));
        $this->init('currency');
    }

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