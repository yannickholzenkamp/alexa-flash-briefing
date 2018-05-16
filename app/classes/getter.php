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

    function build() {
        if ($this->getData() == null) {
            return;
        }

        $this->getMessage()->init($this->getInstance()->getUid());
        $this->getMessage()->setTitleText($this->getInstance()->getTitle());
        $this->getMessage()->setMainText($this->getMainText());
    }

    protected function getMainText() {}

    public function get() {
        return $this->message->get();
    }

    protected function getData() {
        return $this->data;
    }

    protected function getMessage() {
        return $this->message;
    }

    protected function getInstance() {
        return $this->instance;
    }

    private function getFileName() {
        $fn = $this->getInstance()->getFileName();
        return "app/data/json/$fn.json";
    }

    private function getDataFromFile() {
        $file = json_decode(file_get_contents($this->getFileName()), true);
        $this->data = $file['data'];
    }

}

?>
