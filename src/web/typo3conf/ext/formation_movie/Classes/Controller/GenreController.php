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
 * GenreController
 */
class GenreController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * genreRepository
     *
     * @var \Universcience\FormationMovie\Domain\Repository\GenreRepository
     * @inject
     */
    protected $genreRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $genres = $this->genreRepository->findAll();
        $this->view->assign('genres', $genres);
    }
    
    /**
     * action show
     *
     * @param \Universcience\FormationMovie\Domain\Model\Genre $genre
     * @return void
     */
    public function showAction(\Universcience\FormationMovie\Domain\Model\Genre $genre)
    {
        $this->view->assign('genre', $genre);
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
     * @param \Universcience\FormationMovie\Domain\Model\Genre $newGenre
     * @return void
     */
    public function createAction(\Universcience\FormationMovie\Domain\Model\Genre $newGenre)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->genreRepository->add($newGenre);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \Universcience\FormationMovie\Domain\Model\Genre $genre
     * @ignorevalidation $genre
     * @return void
     */
    public function editAction(\Universcience\FormationMovie\Domain\Model\Genre $genre)
    {
        $this->view->assign('genre', $genre);
    }
    
    /**
     * action update
     *
     * @param \Universcience\FormationMovie\Domain\Model\Genre $genre
     * @return void
     */
    public function updateAction(\Universcience\FormationMovie\Domain\Model\Genre $genre)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->genreRepository->update($genre);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \Universcience\FormationMovie\Domain\Model\Genre $genre
     * @return void
     */
    public function deleteAction(\Universcience\FormationMovie\Domain\Model\Genre $genre)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->genreRepository->remove($genre);
        $this->redirect('list');
    }

}