<?php

class Getter {
    
    private $fileName;
    private $data;
    private $message;
    private $loader;

    protected function init($fileName) {
        $this->message = new Alexa_Message();
        $this->setFileName($fileName);
        $this->executeLoader();
        $this->getDataFromFile();
    }

    protected function build() {}

        public function get() {
        return $this->message->get();
    }

    protected function getData() {
        return $this->data;
    }

    protected function getMessage() {
        return $this->message;
    }

    protected function setLoader($loader) {
        $this->loader = $loader;
    }

    private function setFileName($fn) {
        $this->fileName = "app/data/json/$fn.json";
    }

    private function getDataFromFile() {
        $file = json_decode(file_get_contents($this->fileName), true);
        $this->data = $file['data'];
    }

    private function executeLoader() {
        if ($this->loader == null) {
            return;
        }

        $this->loader->load();
    }

}

?>
