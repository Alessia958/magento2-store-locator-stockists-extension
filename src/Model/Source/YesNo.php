<?php

namespace Limesharp\Stockists\Model\Source;


class YesNo implements \Magento\Framework\Option\ArrayInterface
{
    //Here you can __construct Model

    public function toOptionArray()
    {
        // return your data
        return [['value' => 'yes', 'label' => __('yes')], ['value' => 'no', 'label' => __('no')]];
    }
}