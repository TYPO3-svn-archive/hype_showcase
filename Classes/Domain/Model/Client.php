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
 * Client
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_HypeShowcase_Domain_Model_Client extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * The client's title
	 *
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 255)
	 */
	protected $title = '';
	
	/**
	 * The client's introduction
	 *
	 * @var string
	 * @validate String
	 */
	protected $introduction = '';
	
	/**
	 * The client's description
	 *
	 * @var string
	 * @validate String
	 */
	protected $description = '';
	
	/**
	 * The client's images
	 *
	 * @var string
	 * @dontvalidate
	 */
	protected $images = '';
	
	/**
	 * The client's branch name
	 *
	 * @var string
	 * @validate StringLength(minimum=0, maximum=255)
	 */
	protected $branch = '';
	
	/**
	 * The client's website address
	 *
	 * @var string
	 * @validate StringLength(minimum=0, maximum=255)
	 */
	protected $website = '';
	
	/**
	 * The client's projects
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_HypeShowcase_Domain_Model_Project>
	 * @lazy
	 * @cascade remove
	 */
	protected $projects;
	
	/**
	 * Constructs a new Client
	 *
	 */
	public function __construct() {
		$this->projects = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Sets this client's title
	 *
	 * @param string $title The client's title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * Returns the client's title
	 *
	 * @return string The client's title
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Sets the client's introduction
	 *
	 * @param string $introduction
	 * @return void
	 */
	public function setIntroduction($introduction) {
		$this->introduction = $introduction;
	}
	
	/**
	 * Returns the client's introduction
	 *
	 * @return string
	 */
	public function getIntroduction() {
		return $this->introduction;
	}
	
	/**
	 * Sets the client' description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
	
	/**
	 * Returns the client's description
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * Sets this client's images
	 *
	 * @param array $images The client's images
	 * @return void
	 */
	public function setImages(array $images = array()) {
		$this->images = implode(',', $images);
	}
	
	/**
	 * Returns the client's images
	 *
	 * @return array The client's images
	 */
	public function getImages() {
		return (!empty($this->images))
			? explode(',', $this->images)
			: NULL;
	}
	
	/**
	 * Sets this client's branch name
	 *
	 * @param string $images The client's branch name
	 * @return void
	 */
	public function setBranch($branch = '') {
		$this->branch = $branch;
	}
	
	/**
	 * Returns the client's branch name
	 *
	 * @return string The client's branch name
	 */
	public function getBranch() {
		return $this->branch;
	}
	
	/**
	 * Sets this client's website address
	 *
	 * @param string $images The client's website address
	 * @return void
	 */
	public function setWebsite($website = '') {
		$this->website = $website;
	}
	
	/**
	 * Returns the client's website address
	 *
	 * @return string The client's website address
	 */
	public function getWebsite() {
		return $this->website;
	}
	
	/**
	 * Adds a project to this client
	 *
	 * @param Tx_HypeShowcase_Domain_Model_Project $project
	 * @return void
	 */
	public function addAward(Tx_HypeShowcase_Domain_Model_Project $project) {
		$this->projects->attach($project);
	}
	
	/**
	 * Remove a project from this client
	 *
	 * @param Tx_HypeShowcase_Domain_Model_Project $project
	 * @return void
	 */
	public function removeAward(Tx_HypeShowcase_Domain_Model_Project $project) {
		$this->projects->detach($project);
	}
	
	/**
	 * Remove all projects of this client
	 *
	 * @return void
	 */
	public function removeAllProjects() {
		$this->projects = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Returns all projects of this client
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getProjects() {
		return $this->projects;
	}
	
	/**
	 * Returns this client as a formatted string
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->getTitle();
	}
}
?>