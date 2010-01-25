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

/*

# VIEWS
	- LIST (byName, byType, byStatus)
	- ITEM

*/

/**
 * Project
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_HypeShowcase_Domain_Model_Project extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * The project's title
	 *
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 255)
	 */
	protected $title = '';
	
	/**
	 * A short introduction of the project
	 *
	 * @var string
	 * @validate String
	 */
	protected $introduction = '';
	
	/**
	 * A longer description of the project
	 *
	 * @var string
	 * @validate String
	 */
	protected $description = '';
	
	/**
	 * The images of the project
	 *
	 * @var string
	 * @dontvalidate
	 */
	protected $images = '';
	
	/**
	 * The features of this project
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_HypeShowcase_Domain_Model_Feature>
	 * @lazy
	 * @cascade remove
	 */
	protected $features;
	
	/**
	 * The project's client
	 *
	 * @var Tx_HypeShowcase_Domain_Model_Client
	 * @lazy
	 */
	protected $client;
	
	/**
	 * The awards of this project
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_HypeShowcase_Domain_Model_Award>
	 * @lazy
	 * @cascade remove
	 */
	protected $awards;
	
	/**
	 * Constructs a new Project
	 *
	 */
	public function __construct() {
		$this->features = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Sets this project's title
	 *
	 * @param string $title The project's title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * Returns the project's title
	 *
	 * @return string The project's title
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Sets the introduction for the project
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
	 * Sets the description for the project
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
	 * Sets this project's images
	 *
	 * @param array $images The project's images
	 * @return void
	 */
	public function setImages(array $images = array()) {
		$this->images = implode(',', $images);
	}
	
	/**
	 * Returns the project's images
	 *
	 * @return array The project's images
	 */
	public function getImages() {
		return (!empty($this->images))
			? explode(',', $this->images)
			: NULL;
	}
	
	/**
	 * Adds a feature to this project
	 *
	 * @param Tx_HypeShowcase_Domain_Model_Feature $feature
	 * @return void
	 */
	public function addFeature(Tx_HypeShowcase_Domain_Model_Feature $feature) {
		$this->features->attach($feature);
	}
	
	/**
	 * Remove a feature from this project
	 *
	 * @param Tx_HypeShowcase_Domain_Model_Feature $feature The feature to be removed
	 * @return void
	 */
	public function removeFeature(Tx_HypeShowcase_Domain_Model_Feature $feature) {
		$this->features->detach($feature);
	}
	
	/**
	 * Remove all features from this project
	 *
	 * @return void
	 */
	public function removeAllFeatures() {
		$this->features = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Returns all features of this project
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getFeatures() {
		return $this->features;
	}
	
	/**
	 * Sets the project's client
	 *
	 * @param Tx_HypeShowcase_Domain_Model_Client $client The client to set
	 * @return void
	 */
	public function setClient(Tx_HypeShowcase_Domain_Model_Client $client) {
		$this->client = $client;
	}
	
	/**
	 * Returns the project's client
	 *
	 * @return Tx_HypeShowcase_Domain_Model_Client
	 */
	public function getClient() {
		return $this->client;
	}
	
	/**
	 * Adds an award to the project
	 *
	 * @param Tx_HypeShowcase_Domain_Model_Award $award
	 * @return void
	 */
	public function addAward(Tx_HypeShowcase_Domain_Model_Award $award) {
		$this->awards->attach($award);
	}
	
	/**
	 * Remove a feature from this project
	 *
	 * @param Tx_HypeShowcase_Domain_Model_Award $award
	 * @return void
	 */
	public function removeAward(Tx_HypeShowcase_Domain_Model_Award $award) {
		$this->awards->detach($award);
	}
	
	/**
	 * Remove all awards from this project
	 *
	 * @return void
	 */
	public function removeAllAwards() {
		$this->awards = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Returns all awards of this project
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getAwards() {
		return $this->awards;
	}
	
	/**
	 * Returns this project as a formatted string
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->getTitle();
	}
}
?>