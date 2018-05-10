<?php

class Currency_Loader extends Loader {

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
        $from = $this->instance->getParams()['from'][0];
        $to = $this->instance->getParams()['to'][0];
        return $from.'_'.$to;
    }

    private function transformData() {
        $val = $this->getData()[$this->getApiCurString()]['val'];
        $val = str_replace(',', '.', $val);

        $this->setData(floatval($val));
    }

}

?>