<?php

namespace JaztecCmsCore\Integration\Type;

abstract class Type {
    public static function instance() {
        return new $this;
    }

    /**
     * Returns the internal entity this integration represents.
     *
     * @return \JaztecCmsCore\Entity\Entity
     */
    public abstract function returnEntity();
}
