<?php

class Currency_Loader extends Loader {

    private $from;
    private $to;

    function __construct($from, $to) {
        $this->init('currency');
        $this->setCachingTime(TimeSpan::Six_Hours);

        $this->from = $from;
        $this->to = $to;
    }

    function load() {
        if ($this->isUpToDate()) {
            return;
        }

        $this->setData(json_decode(file_get_contents($this->buildUrl()), true));
        $this->transformData();
        $this->writeDataToFile();
    }

    private function buildUrl() {
        return 'http://free.currencyconverterapi.com/api/v5/convert?q='.$this->getApiCurString().'&compact=y';
    }

    private function getApiCurString() {
        return $this->from.'_'.$this->to;
    }

    private function transformData() {
        $val = $this->getData()[$this->getApiCurString()]['val'];
        $val = str_replace(',', '.', $val);

        $this->setData(floatval($val));
    }

}

?>