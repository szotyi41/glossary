<?php
namespace OpenScope\Search;

use \JsonSerializable;

class SearchResults implements JsonSerializable {
    private $translations = [];
    private $original;
    
    public function __construct($original) {
        $this->original = $original;
    }
    
    public function addTranslation($translation) {
        $this->translations[] = $translation;
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
