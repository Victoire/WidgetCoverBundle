<?php
namespace Victoire\Widget\CoverBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Widget\ImageBundle\Entity\WidgetImage;

/**
 * WidgetCover
 *
 * @ORM\Table("vic_widget_cover")
 * @ORM\Entity
 */
class WidgetCover extends WidgetImage
{

    /**
     * To String function
     * Used in render choices type (Especially in VictoireWidgetRenderBundle)
     * //TODO Check the generated value and make it more consistent
     *
     * @return String
     */
    public function __toString()
    {
        return '#'.$this->id.' - '.$this->id;
    }


}
