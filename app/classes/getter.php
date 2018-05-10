<?php

class Getter {
    
    protected $instance;
    private $data;
    private $message;

    function init($instance) {
        $this->instance = $instance;
        $this->message = new Alexa_Message();
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

    private function getFileName() {
        $fn = $this->instance->getFileName();
        return "app/data/json/$fn.json";
    }

    private function getDataFromFile() {
        $file = json_decode(file_get_contents($this->getFileName()), true);
        $this->data = $file['data'];
    }

}

?>
