<?php
namespace OpenScope\Search;

use \JsonSerializable;

class Translation implements JsonSerializable {
    private $context;
    private $word;
    private $comment;
    
    public function __construct($word) {
        $this->word = $word;
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}