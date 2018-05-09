<?php

class Currency_Getter extends Getter {

    private $apiResult;
    private $message;
    private $fromCur;
    private $toCur;

    function __construct($from, $to) {
        $this->fromCur = $from;
        $this->toCur = $to;
        $this->apiResult = json_decode(file_get_contents($this->buildUrl()), true);
    }

    function build() {
        if ($this->apiResult == null) {
            return;
        }

        $this->message = new Alexa_Message();
        $this->message->init("CUR");
        $this->message->setTitleText("Wechselkurs");
        $this->message->setMainText($this->getMainText());
    }

    function get() {
        return $this->message->get();
    }

    private function buildUrl() {
        return 'http://free.currencyconverterapi.com/api/v5/convert?q='.$this->getApiCurString().'&compact=y';
    }

    private function getMainText() {
        $f = $this->fromCur[1];
        $t = $this->toCur[1];
        $a = $this->getRate();
        return "Der aktuelle Wechselkurs zwischen $f und $t beträgt $a.";
    }

    private function getRate() {
        $val = $this->apiResult[$this->getApiCurString()]['val'];
        return str_replace('.',',',round($val, 3));
    }

    private function getApiCurString() {
        $f = $this->fromCur[0];
        $t = $this->toCur[0];
        return $f.'_'.$t;
    }

}

?>