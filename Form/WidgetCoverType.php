<?php

namespace Victoire\Widget\CoverBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Widget\ImageBundle\Form\WidgetImageType;

class WidgetCoverType extends WidgetImageType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('opacity', null, [
            'label'          => 'widget_cover.form.opacity.label',
            'vic_help_block' => 'widget_cover.form.opacity.help_block',
        ]);
    }

    /**
    * {@inheritdoc}
    */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\CoverBundle\Entity\WidgetCover',
            'widget'             => 'Cover',
            'translation_domain' => 'victoire',
        ]);
    }
}
