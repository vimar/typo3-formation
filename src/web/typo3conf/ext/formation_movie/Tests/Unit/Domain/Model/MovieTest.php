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
 * Test case for class \Universcience\FormationMovie\Domain\Model\Movie.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Vincent Mariani <vincent.mariani@smile.fr>
 */
class MovieTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Universcience\FormationMovie\Domain\Model\Movie
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Universcience\FormationMovie\Domain\Model\Movie();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Titanic');

		$this->assertAttributeEquals(
			'Titanic',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReleaseDateReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getReleaseDate()
		);
	}

	/**
	 * @test
	 */
	public function setReleaseDateForDateTimeSetsReleaseDate()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setReleaseDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'releaseDate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStoryLineReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getStoryLine()
		);
	}

	/**
	 * @test
	 */
	public function setStoryLineForStringSetsStoryLine()
	{
		$this->subject->setStoryLine('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'storyLine',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPosterReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getPoster()
		);
	}

	/**
	 * @test
	 */
	public function setPosterForFileReferenceSetsPoster()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setPoster($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'poster',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getGenresReturnsInitialValueForGenre()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getGenres()
		);
	}

	/**
	 * @test
	 */
	public function setGenresForObjectStorageContainingGenreSetsGenres()
	{
		$genre = new \Universcience\FormationMovie\Domain\Model\Genre();
		$objectStorageHoldingExactlyOneGenres = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneGenres->attach($genre);
		$this->subject->setGenres($objectStorageHoldingExactlyOneGenres);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneGenres,
			'genres',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addGenreToObjectStorageHoldingGenres()
	{
		$genre = new \Universcience\FormationMovie\Domain\Model\Genre();
		$genresObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$genresObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($genre));
		$this->inject($this->subject, 'genres', $genresObjectStorageMock);

		$this->subject->addGenre($genre);
	}

	/**
	 * @test
	 */
	public function removeGenreFromObjectStorageHoldingGenres()
	{
		$genre = new \Universcience\FormationMovie\Domain\Model\Genre();
		$genresObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$genresObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($genre));
		$this->inject($this->subject, 'genres', $genresObjectStorageMock);

		$this->subject->removeGenre($genre);

	}

	/**
	 * @test
	 */
	public function getActorsReturnsInitialValueForActor()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getActors()
		);
	}

	/**
	 * @test
	 */
	public function setActorsForObjectStorageContainingActorSetsActors()
	{
		$actor = new \Universcience\FormationMovie\Domain\Model\Actor();
		$objectStorageHoldingExactlyOneActors = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneActors->attach($actor);
		$this->subject->setActors($objectStorageHoldingExactlyOneActors);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneActors,
			'actors',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addActorToObjectStorageHoldingActors()
	{
		$actor = new \Universcience\FormationMovie\Domain\Model\Actor();
		$actorsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$actorsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($actor));
		$this->inject($this->subject, 'actors', $actorsObjectStorageMock);

		$this->subject->addActor($actor);
	}

	/**
	 * @test
	 */
	public function removeActorFromObjectStorageHoldingActors()
	{
		$actor = new \Universcience\FormationMovie\Domain\Model\Actor();
		$actorsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$actorsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($actor));
		$this->inject($this->subject, 'actors', $actorsObjectStorageMock);

		$this->subject->removeActor($actor);

	}
}
