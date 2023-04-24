<?php

namespace ArturZeAlves;

use Exads\ABTestData;

class AbTestHandler
{
    /**
     * @var ABTestData
     */
    private $abTest;

    /**
     * @param int $promoId
     */
    public function initializeAbTestData(int $promoId): void
    {
        $this->abTest = new ABTestData($promoId);
    }

    /**
     * @param int $promoId
     *
     * @return array
     */
    public function getData(int $promoId): array
    {
        $this->initializeAbTestData($promoId);
        $designs = $this->abTest->getAllDesigns();

        // Get the biggest splitPercent
        $max = max(array_map(function ($item) {
            return $item['splitPercent'];
        }, $designs));

        // Filter the design that have the biggest value on splitPercent
        $bestDesign = array_filter($designs, function ($item) use ($max) {
            return ($item['splitPercent'] == $max);
        });

        return reset($bestDesign);
    }

    /**
     * @return string
     */
    public function getPromotionName(): string
    {
        return $this->abTest->getPromotionName();
    }
}
