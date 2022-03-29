<?php

class UploadHandler {
    public function __construct($uploads)
    {
       $this->uploads = $uploads; 
    }

    public function validate($name) {
        if(isset($this->uploads['name'])) {
            $attachments = $this->uploads['name'];

        }
    }
}