<?php

class FOne_Loader extends Loader {

    function load() {
        if ($this->isUpToDate()) {
            return;
        }

        $this->setData(json_decode(file_get_contents($this->buildUrl()), true));
        $this->transformData();
        $this->writeDataToFile();
    }

    private function buildUrl() {
        $season = $this->instance->getParams()['season'];
        return "http://ergast.com/api/f1/$season.json";
    }

    private function transformData() {
        $data = array();
        foreach ($this->getData()['MRData']['RaceTable']['Races'] as $race) {
            array_push($data, array(
                'time' => strtotime($race['date'].' '.$race['time']),
                'name' => $race['raceName']
            ));
        }

        $this->setData($data);
    }

}

?>