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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * MovieController
 */
class MovieController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * movieRepository
     *
     * @var \Universcience\FormationMovie\Domain\Repository\MovieRepository
     * @inject
     */
    protected $movieRepository = NULL;


    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        // old variant when @inject doens't work
        // ligne de commande, AJAX on en aurait besoin
        // $this->movieRepository = $this->objectManager->get( \Universcience\FormationMovie\Domain\Repository\MovieRepository::class );

        $moviesNumber = $this->movieRepository->countAll();
        $movies = $this->movieRepository->findAll();

        // example to retrieve titanic by Title
        // $titanic = $this->movieRepository->findOneByTitle('Titanic');

        // possible to assign many variable at once
        $this->view->assignMultiple([
            'movies' => $movies,
            'moviesNumber' => $this->movieRepository->countAll()
        ]);
    }

    /**
     * carrousel list
     *
     * @return void
     */
    public function carrouselAction()
    {
        $movies = $this->movieRepository->findLatestMovies($this->settings['carouselLimit']);
        $this->view->assign('movies', $movies);
    }
    
    /**
     * action show
     *
     * @param \Universcience\FormationMovie\Domain\Model\Movie $movie
     * @return void
     */
    public function showAction(\Universcience\FormationMovie\Domain\Model\Movie $movie)
    {
        $this->view->assign('movie', $movie);
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
     * @param \Universcience\FormationMovie\Domain\Model\Movie $newMovie
     * @return void
     */
    public function createAction(\Universcience\FormationMovie\Domain\Model\Movie $newMovie)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->movieRepository->add($newMovie);
        $this->redirect('list');

        $this->create();
    }
    
    /**
     * action edit
     *
     * @param \Universcience\FormationMovie\Domain\Model\Movie $movie
     * @ignorevalidation $movie
     * @return void
     */
    public function editAction(\Universcience\FormationMovie\Domain\Model\Movie $movie)
    {
        $this->view->assign('movie', $movie);
    }

    
    /**
     * action update
     *
     * @param \Universcience\FormationMovie\Domain\Model\Movie $movie
     * @return void
     */
    public function updateAction(\Universcience\FormationMovie\Domain\Model\Movie $movie)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->movieRepository->update($movie);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \Universcience\FormationMovie\Domain\Model\Movie $movie
     * @return void
     */
    public function deleteAction(\Universcience\FormationMovie\Domain\Model\Movie $movie)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->movieRepository->remove($movie);
        $this->redirect('list');
    }

}