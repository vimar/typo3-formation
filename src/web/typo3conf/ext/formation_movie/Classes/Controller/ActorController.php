<?php
namespace Universcience\FormationMovie\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Vincent Mariani <vincent.mariani@smile.fr>, Smile
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * ActorController
 */
class ActorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * actorRepository
     *
     * @var \Universcience\FormationMovie\Domain\Repository\ActorRepository
     * @inject
     */
    protected $actorRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $actors = $this->actorRepository->findAll();
        $this->view->assign('actors', $actors);
    }
    
    /**
     * action show
     *
     * @param \Universcience\FormationMovie\Domain\Model\Actor $actor
     * @return void
     */
    public function showAction(\Universcience\FormationMovie\Domain\Model\Actor $actor)
    {
        $this->view->assign('actor', $actor);
    }
    
    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     *
     * @param \Universcience\FormationMovie\Domain\Model\Actor $newActor
     * @return void
     */
    public function createAction(\Universcience\FormationMovie\Domain\Model\Actor $newActor)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->actorRepository->add($newActor);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \Universcience\FormationMovie\Domain\Model\Actor $actor
     * @ignorevalidation $actor
     * @return void
     */
    public function editAction(\Universcience\FormationMovie\Domain\Model\Actor $actor)
    {
        $this->view->assign('actor', $actor);
    }
    
    /**
     * action update
     *
     * @param \Universcience\FormationMovie\Domain\Model\Actor $actor
     * @return void
     */
    public function updateAction(\Universcience\FormationMovie\Domain\Model\Actor $actor)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->actorRepository->update($actor);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \Universcience\FormationMovie\Domain\Model\Actor $actor
     * @return void
     */
    public function deleteAction(\Universcience\FormationMovie\Domain\Model\Actor $actor)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->actorRepository->remove($actor);
        $this->redirect('list');
    }

}