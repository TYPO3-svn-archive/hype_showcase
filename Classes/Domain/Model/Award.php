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
 * Feature
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_HypeShowcase_Domain_Model_Award extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * The award's title
	 *
	 * @var string
	 * @validate StringLength(minimum=1, maximum=255)
	 */
	protected $title = '';
	
	/**
	 * The award's introduction
	 *
	 * @var string
	 * @validate String
	 */
	protected $introduction = '';
	
	/**
	 * The award's description
	 *
	 * @var string
	 * @validate String
	 */
	protected $description = '';
	
	/**
	 * The award's images or icon
	 *
	 * @var string
	 * @dontvalidate
	 */
	protected $images = '';
	
	/**
	 * The award's project
	 *
	 * @var Tx_HypeShowcase_Domain_Model_Project
	 */
	protected $project;
	
	/**
	 * Constructs a new Award
	 *
	 */
	public function __construct() {
		
	}
	
	/**
	 * Sets this award's title
	 *
	 * @param string $title The award's title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * Returns the award's title
	 *
	 * @return string The award's title
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Sets the introduction for the award
	 *
	 * @param string $introduction
	 * @return void
	 */
	public function setIntroduction($introduction) {
		$this->introduction = $introduction;
	}
	
	/**
	 * Returns the introduction
	 *
	 * @return string
	 */
	public function getIntroduction() {
		return $this->introduction;
	}
	
	/**
	 * Sets the description for the award
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
	
	/**
	 * Returns the description
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * Sets this award's images
	 *
	 * @param array $images The project's images
	 * @return void
	 */
	public function setImages(array $images = array()) {
		$this->images = implode(',', $images);
	}
	
	/**
	 * Returns the award's images
	 *
	 * @return array The award's images
	 */
	public function getImages() {
		return (!empty($this->images))
			? explode(',', $this->images)
			: NULL;
	}
	
	/**
	 * Sets the award's project
	 *
	 * @param Tx_HypeShowcase_Domain_Model_Project $project The project to set
	 * @return void
	 */
	public function setProject(Tx_HypeShowcase_Domain_Model_Project $project) {
		$this->project = $project;
	}
	
	/**
	 * Returns the award's project
	 *
	 * @return Tx_HypeShowcase_Domain_Model_Project
	 */
	public function getProject() {
		return $this->project;
	}
	
	/**
	 * Returns this award as a formatted string
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->getTitle();
	}
}
?>