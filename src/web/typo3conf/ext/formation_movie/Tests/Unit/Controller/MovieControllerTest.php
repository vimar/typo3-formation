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
 * Test case for class Universcience\FormationMovie\Controller\MovieController.
 *
 * @author Vincent Mariani <vincent.mariani@smile.fr>
 */
class MovieControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Universcience\FormationMovie\Controller\MovieController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Universcience\\FormationMovie\\Controller\\MovieController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllMoviesFromRepositoryAndAssignsThemToView()
	{

		$allMovies = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$movieRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\MovieRepository', array('findAll'), array(), '', FALSE);
		$movieRepository->expects($this->once())->method('findAll')->will($this->returnValue($allMovies));
		$this->inject($this->subject, 'movieRepository', $movieRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('movies', $allMovies);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenMovieToView()
	{
		$movie = new \Universcience\FormationMovie\Domain\Model\Movie();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('movie', $movie);

		$this->subject->showAction($movie);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenMovieToMovieRepository()
	{
		$movie = new \Universcience\FormationMovie\Domain\Model\Movie();

		$movieRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\MovieRepository', array('add'), array(), '', FALSE);
		$movieRepository->expects($this->once())->method('add')->with($movie);
		$this->inject($this->subject, 'movieRepository', $movieRepository);

		$this->subject->createAction($movie);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenMovieToView()
	{
		$movie = new \Universcience\FormationMovie\Domain\Model\Movie();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('movie', $movie);

		$this->subject->editAction($movie);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenMovieInMovieRepository()
	{
		$movie = new \Universcience\FormationMovie\Domain\Model\Movie();

		$movieRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\MovieRepository', array('update'), array(), '', FALSE);
		$movieRepository->expects($this->once())->method('update')->with($movie);
		$this->inject($this->subject, 'movieRepository', $movieRepository);

		$this->subject->updateAction($movie);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenMovieFromMovieRepository()
	{
		$movie = new \Universcience\FormationMovie\Domain\Model\Movie();

		$movieRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\MovieRepository', array('remove'), array(), '', FALSE);
		$movieRepository->expects($this->once())->method('remove')->with($movie);
		$this->inject($this->subject, 'movieRepository', $movieRepository);

		$this->subject->deleteAction($movie);
	}
}
