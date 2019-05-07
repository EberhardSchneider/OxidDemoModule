<?php
namespace ESch\OxidDemoModule\Model;
use oxDb;

class Basket extends Basket_parent
{
    private function getFreeShippingLimit() {
        $delivery = oxNew(\OxidEsales\Eshop\Application\Model\Delivery::class);

        // get delivery shipping rule ids from database
        $sSql = "SELECT oxid FROM oxdelivery";
        $shippingRulesIds = oxDb::getDb(true)->getAll($sSql);

        // get shipping rules which fit the following rules:
        // 1. calculate limit from payment
        // 2. set shippings costs to 0
        // then take the one with the lowest payment limit
        $activeRuleId = null;
        $minShippingLimit = 9999999;
        foreach ($shippingRulesIds as $id) {
            $delivery->load($id[0]);
            if ($delivery->oxdelivery__oxdeltype->value == 'p'
                && $delivery->oxdelivery__oxaddsum->value == '0'
                && $delivery->oxdelivery__oxaddsumtype->value == 'abs') {
                    $activeRuleId
                        = $delivery->oxdelivery__oxparam->value < $minShippingLimit
                            ? $id
                            : $activeRuleId;
                    $minShippingLimit 
                        = $delivery->oxdelivery__oxparam->value < $minShippingLimit
                            ? $delivery->oxdelivery__oxparam->value
                            : $minShippingLimit;
                }
        }

        if ($activeRuleId) {
            $delivery->load($activeRuleId[0]);
            $limit = $delivery->oxdelivery__oxparam->value;
            return floatval($limit);
        } else {
            return null;
        }
    }

    public function getDifferenceToFreeShipping() {
        $bruttoSum = $this->getBruttoSum();
        $limit = $this->getFreeShippingLimit();
        if ($limit) {
            return $limit - $bruttoSum;
        } else {
            return null;
        }
    }
}