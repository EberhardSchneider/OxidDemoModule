[{$smarty.block.parent}]
[{oxstyle include=$oViewConf->getModuleUrl("oxiddemomodule", "css/style.css")}]

<div class="demo">
    [{assign var=difference value=$oxcmp_basket->getDifferenceToFreeShipping()}]
    [{if ($difference != NULL) && ($difference <= 0)}]
        <span>Free shipping.</span>
    [{elseif $difference !=NULL }]
        <span>Pay [{$difference}] [{$currency->sign}] more to get free shipping.</span>
    [{/if}]
</div>