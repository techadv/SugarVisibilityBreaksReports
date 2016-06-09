<?php
// root/custom/data/visibility/SugarVisibilityNotes.php

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

    //global $beanFiles;
    require_once('modules/Teams/Team.php');

/**
 * Visibility class for notes
 */
class SugarVisibilityNotes extends SugarVisibility
{
    /**
     * Add visibility clauses to the FROM clause of the query
     * @param string $query
     * @return string
     */
    public function addVisibilityFrom(&$query)
    {
        global $current_user;
        $currentUserID = $current_user->id;

        if(!$current_user->is_admin){
            $query .= "LEFT JOIN opportunities as opps on notes.parent_id = opps.id LEFT JOIN opportunities_cstm as oppsc on oppsc.id_c = opps.id";
        }
        //$GLOBALS['log']->fatal('from: ' . $query);
        //var_dump('from: ' . $query);
        // die;
        // Return the modified query
        //$GLOBALS['log']->fatal('addVisibilityFrom END');
        return $query;
    }

    /**
     * Add visibility clauses to the WHERE clause of the query
     * @param string $query
     * @return string
     */
    public function addVisibilityWhere(&$query)
    {
        global $current_user;
        $currentUserID = $current_user->id;

        if(!$current_user->is_admin){
//            if($_REQUEST['view'] == 'record' or $_REQUEST['action'] == 'DetailView'){
				// If the current user set search parameters, the query will need to be appended to with an AND
				if($query){
					$query .= " AND (oppsc.bestfit_status_c = 'Completed')";
				// Otherwise just append the additional parameters
				}else{
					$query .= " (oppsc.bestfit_status_c = 'Completed')";
				}
//			}
        }
        //$GLOBALS['log']->fatal('where: ' . $query);
        //var_dump('where: ' . $query);
        // die;
        // Return the modified query
        //$GLOBALS['log']->fatal('addVisibilityWhere END');
        return $query;
    }

    public function addVisibilityFromQuery(SugarQuery $sugarQuery, array $options = array())
    {

        // We'll get it on where clause
        if ($this->getOption('where_condition')) {
            return $sugarQuery;
        }

        $join = '';
        $this->addVisibilityFrom($join, $options);
        if (!empty($join)) {
            $sugarQuery->joinRaw($join);
        }
        return $sugarQuery;
    }

    public function addVisibilityWhereQuery(SugarQuery $sugarQuery, array $options = array())
    {

        $cond = '';
        $this->addVisibilityWhere($cond);
        if (!empty($cond)) {
            $sugarQuery->whereRaw($cond);
        }
        return $sugarQuery;
    }
}