<?php

namespace Universcience\FormationMovie\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Vincent Mariani <vincent.mariani@smile.fr>, Smile
 *
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
 * Test case for class \Universcience\FormationMovie\Domain\Model\Genre.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Vincent Mariani <vincent.mariani@smile.fr>
 */
class GenreTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Universcience\FormationMovie\Domain\Model\Genre
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Universcience\FormationMovie\Domain\Model\Genre();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getValueReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getValue()
		);
	}

	/**
	 * @test
	 */
	public function setValueForStringSetsValue()
	{
		$this->subject->setValue('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'value',
			$this->subject
		);
	}
}
