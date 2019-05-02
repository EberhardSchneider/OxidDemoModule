<?php
namespace ESch\OxidDemoModule\Model;

class Basket extends Basket_parent
{
    public function getFreeShippingLimit() {
        $delivery = oxNew(\OxidEsales\Eshop\Application\Model\Delivery::class);
        $delivery->load('1b842e734b62a4775.45738618'); //???
        $limit = $delivery->oxdelivery__oxparam->value;
        return $limit;
    }
}