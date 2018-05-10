<?php

class Instance {

    private $getter;
    private $loader;
    private $cachingTime;
    private $fileName;
    private $params;

    function setGetter($getter) {
        $this->getter = $getter;
    }

    function setLoader($loader) {
        $this->loader = $loader;
    }

    function setCachingTime($cachingTime) {
        $this->cachingTime = $cachingTime;
    }

    function setFileName($fileName) {
        $this->fileName = $fileName;
    }

    function setParams($params) {
        $this->params = $params;
    }

    function getGetter() {
        return $this->getter;
    }

    function getLoader() {
        return $this->loader;
    }

    function getCachingTime() {
        return $this->cachingTime;
    }

    function getFileName() {
        return $this->fileName;
    }

    function getParams() {
        return $this->params;
    }

}

?>