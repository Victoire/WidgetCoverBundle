<?php

namespace Victoire\Widget\CoverBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Widget\ImageBundle\Form\WidgetImageType;

/**
 * WidgetCover form type
 */
class WidgetCoverType extends WidgetImageType
{
    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
                parent::buildForm($builder, $options);
                $builder->add('opacity', null, array(
                    'label' => 'widget_cover.form.opacity.label',
                    'vic_help_block' => 'widget_cover.form.opacity.help_block'
                ));

    }

    /**
     * bind form to WidgetCover entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\CoverBundle\Entity\WidgetCover',
            'widget'             => 'Cover',
            'translation_domain' => 'victoire'
        ));
    }

    /**
     * get form name
     *
     * @return string The form name
     */
    public function getName()
    {
        return 'victoire_widget_form_cover';
    }
}
