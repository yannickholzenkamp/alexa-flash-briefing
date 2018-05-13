<?php

class Loader {

    protected $instance;
    private $data;

    function init($instance) {
        $this->instance = $instance;
        $this->cachingTime = $instance->getCachingTime();
    }

    function load() {}

    protected function setData($data) {
        $this->data = $data;
    }

    protected function getData() {
        return $this->data;
    }

    protected function writeDataToFile() {
        $json = array(
            'updated' => time(),
            'data' => $this->data
        );
        file_put_contents($this->getFileName(), json_encode($json));
    }

    protected function isUpToDate() {
        return $this->getUpdatedTime() > (time() - $this->instance->getCachingTime());
    }

    private function getUpdatedTime() {
        if (!file_exists($this->getFileName())) {
            return 0;
        }
        $file = json_decode(file_get_contents($this->getFileName()), true);
        return $file['updated'];
    }

    private function getFileName() {
        $fn = $this->instance->getFileName();
        return "app/data/json/$fn.json";
    }

}

?>
