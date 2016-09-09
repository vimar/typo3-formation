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
 * Test case for class Universcience\FormationMovie\Controller\ActorController.
 *
 * @author Vincent Mariani <vincent.mariani@smile.fr>
 */
class ActorControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Universcience\FormationMovie\Controller\ActorController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Universcience\\FormationMovie\\Controller\\ActorController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllActorsFromRepositoryAndAssignsThemToView()
	{

		$allActors = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$actorRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\ActorRepository', array('findAll'), array(), '', FALSE);
		$actorRepository->expects($this->once())->method('findAll')->will($this->returnValue($allActors));
		$this->inject($this->subject, 'actorRepository', $actorRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('actors', $allActors);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenActorToView()
	{
		$actor = new \Universcience\FormationMovie\Domain\Model\Actor();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('actor', $actor);

		$this->subject->showAction($actor);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenActorToActorRepository()
	{
		$actor = new \Universcience\FormationMovie\Domain\Model\Actor();

		$actorRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\ActorRepository', array('add'), array(), '', FALSE);
		$actorRepository->expects($this->once())->method('add')->with($actor);
		$this->inject($this->subject, 'actorRepository', $actorRepository);

		$this->subject->createAction($actor);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenActorToView()
	{
		$actor = new \Universcience\FormationMovie\Domain\Model\Actor();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('actor', $actor);

		$this->subject->editAction($actor);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenActorInActorRepository()
	{
		$actor = new \Universcience\FormationMovie\Domain\Model\Actor();

		$actorRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\ActorRepository', array('update'), array(), '', FALSE);
		$actorRepository->expects($this->once())->method('update')->with($actor);
		$this->inject($this->subject, 'actorRepository', $actorRepository);

		$this->subject->updateAction($actor);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenActorFromActorRepository()
	{
		$actor = new \Universcience\FormationMovie\Domain\Model\Actor();

		$actorRepository = $this->getMock('Universcience\\FormationMovie\\Domain\\Repository\\ActorRepository', array('remove'), array(), '', FALSE);
		$actorRepository->expects($this->once())->method('remove')->with($actor);
		$this->inject($this->subject, 'actorRepository', $actorRepository);

		$this->subject->deleteAction($actor);
	}
}
