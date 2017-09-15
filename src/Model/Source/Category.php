<?php

namespace Limesharp\Stockists\Model\Source;


class Category implements \Magento\Framework\Option\ArrayInterface
{
    //Here you can __construct Model

    public function toOptionArray()
    {
        // return your data
        return [['value' => 'boutique', 'label' => __('boutique')], ['value' => 'negozio', 'label' => __('negozio')]];
    }
}