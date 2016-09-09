<?php
namespace Universcience\FormationMovie\Domain\Repository;

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
 * The repository for Movies
 */
class MovieRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{


    public function findLatestMovies($limit = 3)
    {
        $query = $this->createQuery();
        return $query->setOffset(0)
            ->setLimit(intval($limit))
            ->execute();
    }

    /**
     * findAllByValue
     * Find movie by term
     *
     * @param string $value
     * @return Object $result
     */
    public function findAllByTitle($value) {

        // instancie sa requête
        $query = $this->createQuery();
        // setRespectStoragePage = FALSE => ne pas limiter les enregistrements au dossier de stockage défini
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        // setStoragePageIds(array(37)); => cherche uniquement dans le dossier système ayant comme id "37"
        // $query->getQuerySettings()->setStoragePageIds(FALSE);

        $result = $query
            ->matching($query->like('title', '%' . $value . '%'))
            ->execute();

        return $result;
    }
}