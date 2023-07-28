<?php

class Controller {
    public $model;

    public function renderJSON($data) {
        echo json_encode($data);
    }
}