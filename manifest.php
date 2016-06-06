<?php

/* * *******************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 * ****************************************************************************** */
// 
$manifest = array(
    'acceptable_sugar_versions' =>
    array(
        'regex_matches' => Array(
            '7\.[0-9]\.[0-9]+(\.[0-9]*)?',
        )
    ),
    array(
        'acceptable_sugar_flavors' =>
        array(
            0 => 'PRO',
            1 => 'ULT',
            2 => 'ENT',
            3 => 'CE',
        ),
    ),
    'readme' => '',
    'key' => '',
    'author' => 'TAI - Chris Book - 2016',
    'description' => 'Visibility Breaks Report',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'Visibility Breaks Report',
    'published_date' => '2016-06-03-11:32:00',
    'type' => 'module',
    'version' => 1,
);
$installdefs = array(
    'id' => 'Visibility Breaks Report',
    'copy' =>
    array(
        0 =>
        array(
            'from' => '<basepath>/Files/custom/data/visibility/SugarVisibilityOpportunities.php',
            'to' => 'custom/data/visibility/SugarVisibilityOpportunities.php',
        ),
        1 =>
        array(
            'from' => '<basepath>/Files/custom/Extension/modules/Opportunities/Ext/Vardefs/opportunitiesVisibility.php',
            'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/opportunitiesVisibility.php',
        ),
    ),
	'language'=> array (
		array(
			'from'=> '<basepath>/Files/custom/Extension/modules/Opportunities/Ext/Language/bestfit_status.en_us.lang.php',
			'to_module'=> 'Opportunities',
			'language'=>'en_us'
		),
	),
	'custom_fields' => array(
        //Text
        array(
            'name' => 'bestfit_status_c',
            'label' => 'LBL_BESTFIT_STATUS',
            'type' => 'varchar',
            'module' => 'Opportunities',
            'help' => 'Status of BestFit analysis',
            'comment' => 'Status of BestFit analysis',
            'default_value' => '',
            'max_size' => 15,
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => false, // true or false
            'importable' => 'true', // 'true', 'false', 'required'
            'duplicate_merge' => false, // true or false
        ),
	),
);
