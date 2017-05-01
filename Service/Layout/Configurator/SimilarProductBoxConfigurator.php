<?php
/**
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\SimilarProductBundle\Service\Layout\Configurator;

use WellCommerce\Bundle\CoreBundle\Layout\Configurator\AbstractLayoutBoxConfigurator;
use WellCommerce\Bundle\SimilarProductBundle\Controller\Box\SimilarProductBoxController;
use WellCommerce\Component\Form\Elements\FormInterface;
use WellCommerce\Component\Form\FormBuilderInterface;

/**
 * Class SimilarProductBoxConfigurator
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
final class SimilarProductBoxConfigurator extends AbstractLayoutBoxConfigurator
{
    public function __construct(SimilarProductBoxController $controller)
    {
        $this->controller = $controller;
    }
    
    public function getType(): string
    {
        return 'SimilarProduct';
    }
    
    public function addFormFields(FormBuilderInterface $builder, FormInterface $form, $defaults)
    {
        $fieldset = $this->getFieldset($builder, $form);
        
        $fieldset->addChild($builder->getElement('tip', [
            'tip' => 'layout_box.tip.similar_product',
        ]));

        $fieldset->addChild($builder->getElement('text_field', [
            'name'  => 'limit',
            'label' => 'layout_box.label.similar_product.limit',
        ]))->setValue($this->getValue($defaults, '[limit]', 4));
    }
}
