<?php

// root/custom/data/visibility/SugarVisibilityOpportunities.php

//-----
//Created:
// - TAI Chris Book 06/03/2016
//-----
//  Prevent users from viewing certain Opportunities in List View
//-----

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
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
 ********************************************************************************/

/**
 * Visibility class for Opportunities
 */
class SugarVisibilityOpportunities extends ACLVisibility
{
    /**
     * Add visibility clauses to the FROM clause of the query
     * @param string $query
     * @return string
     */
    public function addVisibilityFrom(&$query){

		return $query;
    }

    /**
     * Add visibility clauses to the WHERE clause of the query
     * @param string $query
     * @return string
     */
    public function addVisibilityWhere(&$query){
        global $current_user;
// - TAI Chris Book June 2016		
        if(!$current_user->is_admin){
            // If the current user set search parameters, the query will need to be appended to with an AND
            if($query){
                $query .= " AND (opportunities_cstm.bestfit_status_c = 'Completed')";
            // Otherwise just append the additional parameters
            }else{
                $query .= " (opportunities_cstm.bestfit_status_c = 'Completed')";
            }
        }		
// -			
        //$GLOBALS['log']->fatal('AccountVisibility whereQuery: ['.$query.']');
        // Return the modified query
        return $query;
    }
}