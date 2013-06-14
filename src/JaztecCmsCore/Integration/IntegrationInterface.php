<?php

namespace JaztecCmsCore\Integration;

use JaztecCmsCore\Entity\Entity;
use JaztecCmsCore\Integration\Type as IntegratedType;

interface IntegrationInterface {

    /**
     *
     * @param string $integrationTable The table in which the relation is stored
     * @param \JaztecCmsCore\Entity\Entity $entity The entity which is integrated into the CMS.
     * @param \JaztecCmsCore\Integration\Type $type The type of integration which is required.
     */
    public function addIntegratedEntity($integrationTable, Entity $entity, IntegratedType $type);
}
