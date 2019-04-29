namespace OxidEsales\OxidDemoModule\Model;
use oxDb;

class Basket extends Basket_parent
{
    public function getFreeShippingLimit() {
        $sSql = "SELECT OXPARAM FROM oxdelivery WHERE OXTITLE LIKE '%Versandkostenfrei%';"
        $aData = \OxidEsales\Eshop\Core\DatabaseProvider::getDb(\OxidEsales\Eshop\Core\DatabaseProvider::FETCH_MODE_ASSOC)->getAll($sSql);

        return $aData;
    }
}