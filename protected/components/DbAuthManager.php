<?php

/**
 * DbAuthManager
 * @author dimon
 */
class DbAuthManager extends CDbAuthManager {

	/**
	 * @var string the name of the table storing authorization items. Defaults to 'AuthItem'.
	 */
	public $itemTable = 'auth_item';

	/**
	 * @var string the name of the table storing authorization item hierarchy. Defaults to 'AuthItemChild'.
	 */
	public $itemChildTable = 'auth_item_child';

	/**
	 * @var string the name of the table storing authorization item assignments. Defaults to 'AuthAssignment'.
	 */
	public $assignmentTable = 'auth_assignment';

}