<?php

class Instance {

    private $getter;
    private $loader;
    private $uid;
    private $title;
    private $message;
    private $cachingTime;
    private $params;

    function __construct($uid) {
        $this->setUid($uid);
    }

    function setGetter($getter) {
        $this->getter = $getter;
    }

    function setLoader($loader) {
        $this->loader = $loader;
    }

    function setUid($uid) {
        $this->uid = $uid;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    function setCachingTime($cachingTime) {
        $this->cachingTime = $cachingTime;
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

    function getUid() {
        return $this->uid;
    }

    function getFilename() {
        return $this->uid;
    }

    function getTitle() {
        return $this->title;
    }

    function getMessage() {
        return $this->message;
    }

    function getCachingTime() {
        return $this->cachingTime;
    }

    function getParams() {
        return $this->params;
    }

}

?>