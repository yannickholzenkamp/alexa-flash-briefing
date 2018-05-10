<?php

class Loader {

    private $fileName;
    private $data;
    private $cachingTime = 0;

    protected function init($fileName) {
        $this->setFileName($fileName);
    }

    protected function load() {}

    protected function setData($data) {
        $this->data = $data;
    }

    protected function getData() {
        return $this->data;
    }

    protected function setCachingTime($cachingTime) {
        $this->cachingTime = $cachingTime;
    }

    protected function writeDataToFile() {
        $json = array(
            'updated' => time(),
            'data' => $this->data
        );
        file_put_contents($this->fileName, json_encode($json));
    }

    protected function isUpToDate() {
        return $this->getUpdatedTime() > (time() - $this->cachingTime);
    }

    private function getUpdatedTime() {
        $file = json_decode(file_get_contents($this->fileName), true);
        return $file['updated'];
    }

    private function setFileName($fn) {
        $this->fileName = "app/data/json/$fn.json";
    }

}

?>
