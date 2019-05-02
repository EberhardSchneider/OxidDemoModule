<?php
/**
 * This file is part of OXID eShop Logger Demo module.
 * Logger Demo module is free software:
 * you can redistribute it and/or modify it under the terms of the
 * GNU General Public License as published by the Free Software Foundation,
 * either version 3 of the License, or (at your option) any later version.
 *
 * Logger Demo module is distributed in
 * the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License
 * for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eShop Logger Demo module.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * @category      module
 * @package       loggerdemo
 * @author        OXID eSales AG
 * @link          http://www.oxid-esales.com/en/
 * @copyright (C) OXID e-Sales, 2003-2015
 */
/**
 * Metadata version
 */
$sMetadataVersion = '2.0';
/**
 * Module information
 */
 
$aModule = array(
    'id'          => 'eschoxiddemomodule',
    'title'       => [
        'de' => 'Oxid Demo Module',
        'en' => 'Oxid Demo Module',
    ],
    'description' => [
        'de' => 'Show price difference to free shipping limit',
        'en' => 'Show price difference to free shipping limit',
    ],
    'version'     => '2.0.0',
    'author'      => 'Eberhard Schneider',
    'extend' => array(
        \OxidEsales\Eshop\Application\Model\Basket::class => ESch\OxidDemoModule\Model\Basket::class,
    ),
    'blocks' => array(
        array('template' => 'layout/header.tpl', 'block'=>'dd_layout_page_header_icon_menu_minibasket', 'file'=>'/views/user.tpl'),
    )
);