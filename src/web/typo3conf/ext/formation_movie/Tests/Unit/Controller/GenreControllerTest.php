<?php
namespace Universcience\FormationMovie\Tests\Unit\Controller;
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
 * Test case for class Universcience\FormationMovie\Controller\GenreController.
 *
 * @author Vincent Mariani <vincent.mariani@smile.fr>
 */
class GenreControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Universcience\FormationMovie\Controller\GenreController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Universcience\\FormationMovie\\Controller\\GenreController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllGenresFromRepositoryAndAssignsThemToView()
	{

		$allGenres = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$genreRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\GenreRepository', array('findAll'), array(), '', FALSE);
		$genreRepository->expects($this->once())->method('findAll')->will($this->returnValue($allGenres));
		$this->inject($this->subject, 'genreRepository', $genreRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('genres', $allGenres);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenGenreToView()
	{
		$genre = new \Universcience\FormationMovie\Domain\Model\Genre();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('genre', $genre);

		$this->subject->showAction($genre);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenGenreToGenreRepository()
	{
		$genre = new \Universcience\FormationMovie\Domain\Model\Genre();

		$genreRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\GenreRepository', array('add'), array(), '', FALSE);
		$genreRepository->expects($this->once())->method('add')->with($genre);
		$this->inject($this->subject, 'genreRepository', $genreRepository);

		$this->subject->createAction($genre);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenGenreToView()
	{
		$genre = new \Universcience\FormationMovie\Domain\Model\Genre();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('genre', $genre);

		$this->subject->editAction($genre);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenGenreInGenreRepository()
	{
		$genre = new \Universcience\FormationMovie\Domain\Model\Genre();

		$genreRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\GenreRepository', array('update'), array(), '', FALSE);
		$genreRepository->expects($this->once())->method('update')->with($genre);
		$this->inject($this->subject, 'genreRepository', $genreRepository);

		$this->subject->updateAction($genre);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenGenreFromGenreRepository()
	{
		$genre = new \Universcience\FormationMovie\Domain\Model\Genre();

		$genreRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\GenreRepository', array('remove'), array(), '', FALSE);
		$genreRepository->expects($this->once())->method('remove')->with($genre);
		$this->inject($this->subject, 'genreRepository', $genreRepository);

		$this->subject->deleteAction($genre);
	}
}
