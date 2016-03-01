<?php

namespace Victoire\Widget\CoverBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\WidgetBundle\Entity\WidgetSlotInterface;
use Victoire\Widget\ImageBundle\Entity\WidgetImage;

/**
 * WidgetCover.
 *
 * @ORM\Table("vic_widget_cover")
 * @ORM\Entity
 */
class WidgetCover extends WidgetImage implements WidgetSlotInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="opacity", type="string", length=255, nullable=true)
     */
    protected $opacity;

    /**
     * To String function
     * Used in render choices type (Especially in VictoireWidgetRenderBundle)
     * //TODO Check the generated value and make it more consistent.
     *
     * @return string
     */
    public function __toString()
    {
        return '#'.$this->id.' - '.$this->id;
    }

    /**
     * Get opacity.
     *
     * @return string
     */
    public function getOpacity()
    {
        return $this->opacity;
    }

    /**
     * Set opacity.
     *
     * @param string $opacity
     *
     * @return $this
     */
    public function setOpacity($opacity)
    {
        $this->opacity = $opacity;

        return $this;
    }
}
