<?php
namespace Universcience\FormationMovie\Domain\Model;

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
 * Movie
 */
class Movie extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';
    
    /**
     * releaseDate
     *
     * @var \DateTime
     */
    protected $releaseDate = null;
    
    /**
     * storyLine
     *
     * @var string
     */
    protected $storyLine = '';
    
    /**
     * poster
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $poster = null;
    
    /**
     * genres
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Universcience\FormationMovie\Domain\Model\Genre>
     * @cascade remove
     */
    protected $genres = null;
    
    /**
     * actors
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Universcience\FormationMovie\Domain\Model\Actor>
     */
    protected $actors = null;
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the releaseDate
     *
     * @return \DateTime $releaseDate
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }
    
    /**
     * Sets the releaseDate
     *
     * @param \DateTime $releaseDate
     * @return void
     */
    public function setReleaseDate(\DateTime $releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }
    
    /**
     * Returns the storyLine
     *
     * @return string $storyLine
     */
    public function getStoryLine()
    {
        return $this->storyLine;
    }
    
    /**
     * Sets the storyLine
     *
     * @param string $storyLine
     * @return void
     */
    public function setStoryLine($storyLine)
    {
        $this->storyLine = $storyLine;
    }
    
    /**
     * Returns the poster
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $poster
     */
    public function getPoster()
    {
        return $this->poster;
    }
    
    /**
     * Sets the poster
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $poster
     * @return void
     */
    public function setPoster(\TYPO3\CMS\Extbase\Domain\Model\FileReference $poster)
    {
        $this->poster = $poster;
    }
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->genres = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->actors = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Adds a Genre
     *
     * @param \Universcience\FormationMovie\Domain\Model\Genre $genre
     * @return void
     */
    public function addGenre(\Universcience\FormationMovie\Domain\Model\Genre $genre)
    {
        $this->genres->attach($genre);
    }
    
    /**
     * Removes a Genre
     *
     * @param \Universcience\FormationMovie\Domain\Model\Genre $genreToRemove The Genre to be removed
     * @return void
     */
    public function removeGenre(\Universcience\FormationMovie\Domain\Model\Genre $genreToRemove)
    {
        $this->genres->detach($genreToRemove);
    }
    
    /**
     * Returns the genres
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Universcience\FormationMovie\Domain\Model\Genre> $genres
     */
    public function getGenres()
    {
        return $this->genres;
    }
    
    /**
     * Sets the genres
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Universcience\FormationMovie\Domain\Model\Genre> $genres
     * @return void
     */
    public function setGenres(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $genres)
    {
        $this->genres = $genres;
    }
    
    /**
     * Adds a Actor
     *
     * @param \Universcience\FormationMovie\Domain\Model\Actor $actor
     * @return void
     */
    public function addActor(\Universcience\FormationMovie\Domain\Model\Actor $actor)
    {
        $this->actors->attach($actor);
    }
    
    /**
     * Removes a Actor
     *
     * @param \Universcience\FormationMovie\Domain\Model\Actor $actorToRemove The Actor to be removed
     * @return void
     */
    public function removeActor(\Universcience\FormationMovie\Domain\Model\Actor $actorToRemove)
    {
        $this->actors->detach($actorToRemove);
    }
    
    /**
     * Returns the actors
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Universcience\FormationMovie\Domain\Model\Actor> $actors
     */
    public function getActors()
    {
        return $this->actors;
    }
    
    /**
     * Sets the actors
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Universcience\FormationMovie\Domain\Model\Actor> $actors
     * @return void
     */
    public function setActors(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $actors)
    {
        $this->actors = $actors;
    }

}