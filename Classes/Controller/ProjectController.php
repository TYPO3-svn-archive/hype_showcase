<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Thomas "Thasmo" Deinhamer <thasmo@gmail.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * The project controller for the Project package
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class Tx_HypeShowcase_Controller_ProjectController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_HypeShowcase_Domain_Model_ProjectRepository
	 */
	protected $projectRepository;
	
	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->projectRepository = t3lib_div::makeInstance('Tx_HypeShowcase_Domain_Repository_ProjectRepository');
	}
	
	/**
	 * Display all project.
	 *
	 * @return string
	 */
	public function indexAction() {
		$this->view->assign('settings', $this->settings);
		$this->view->assign('projects', $this->projectRepository->findAll());
	}
	
	/**
	 * Display a single project.
	 *
	 * @param Tx_HypeShowcase_Domain_Model_Project $project
	 * @return string
	 */
	public function showAction(Tx_HypeShowcase_Domain_Model_Project $project) {
		$this->view->assign('settings', $this->settings);
		$this->view->assign('project', $project);
	}
}
?>