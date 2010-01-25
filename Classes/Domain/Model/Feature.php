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
class Tx_HypeShowcase_Domain_Model_Feature extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * The feature's title
	 *
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 255)
	 */
	protected $title = '';
	
	/**
	 * A short description of the feature
	 *
	 * @var string
	 * @validate String
	 */
	protected $introduction = '';
	
	/**
	 * The images of the feature
	 *
	 * @var array
	 * @dontvalidate
	 */
	protected $images = '';
	
	/**
	 * Constructs a new Feature
	 *
	 */
	public function __construct() {
		//$this->features = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Sets this feature's title
	 *
	 * @param string $title The project's title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * Returns the feature's title
	 *
	 * @return string The feature's title
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Sets the introduction for the feature
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
	 * Sets this feature's images
	 *
	 * @param array $images The feature's images
	 * @return void
	 */
	public function setImages(array $images = array()) {
		$this->images = implode(',', $images);
	}
	
	/**
	 * Returns the feature's images
	 *
	 * @return array The feature's images
	 */
	public function getImages() {
		return explode(',', $this->images);
	}
}
?>