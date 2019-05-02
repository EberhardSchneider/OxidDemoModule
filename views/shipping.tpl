[{$smarty.block.parent}]
[{oxstyle include=$oViewConf->getModuleUrl("oxiddemomodule", "css/style.css")}]

<div class="demo">
 <span>
 DEMO
    You're paying: [{$oxcmp_basket->getFreeShippingLimit()}] [{$currency->sign}]
</span>
</div>