<?php

namespace AppBundle\Repository;
use AppBundle\Entity\Film;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * FilmRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FilmRepository extends \Doctrine\ORM\EntityRepository
{

    public function getAllFilm(int $page,int $nbPerPage)
    {
        $query = $this->createQueryBuilder('f')->getQuery();

        $query->setFirstResult(($page-1) * $nbPerPage)
        ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    public function searchFilm(string $search){

        $query = $this->createQueryBuilder('search')
            ->select('f')
            ->from(Film::class, 'f')
            ->where('f.name LIKE :word')
            ->setParameter('word','%'.$search.'%')
            ->getQuery()
            ->getResult()
        ;
        return $query;
    }
}
