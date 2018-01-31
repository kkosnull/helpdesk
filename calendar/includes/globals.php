<?php
/*
 * Copyright 2010 Sean Proctor
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

if ( !defined('IN_PHPC') ) {
       die("Hacking attempt");
}

$month_names = array(
                1 => __('Ιανουάριος'),
                __('Φεβρουάριος'),
                __('Μάρτιος'),
                __('Απρίλιος'),
                __('Μάιος'),
                __('Ιούνιος'),
                __('Ιούλιος'),
                __('Αύγουστος'),
                __('Σεπτέμβριος'),
                __('Οκτόμβριος'),
                __('Νοέμβριος'),
                __('Δεκέμβριος'),
                );

$day_names = array(
                __('Κυριακή'),
		__('Δευτέρα'),
		__('Τρίτη'),
		__('Τετάρτη'),
		__('Πέμπτη'),
		__('Παρασκευή'),
		__('Σάββατο'),
                );

$short_month_names = array(
		1 => __('Ιαν'),
		__('Φεβ'),
		__('Mar'),
		__('Απρ'),
		__('Μαι'),
		__('Ιουν'),
		__('Ιουλ'),
		__('Αυγ'),
		__('Σεπτ'),
		__('Οκτ'),
		__('Νοε'),
		__('Δεκ'),
                );

// config stuff
define('PHPC_CHECK', 1);
define('PHPC_TEXT', 2);
define('PHPC_DROPDOWN', 3);
define('PHPC_MULTI_DROPDOWN', 4);

$sort_options = array(
                'start_date' => __('Start Date'),
                'subject' => __('Subject')
                );

$order_options = array(
                'ASC' => __('Ascending'),
                'DESC' => __('Descending')
                );

?>
