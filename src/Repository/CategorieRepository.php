<?php

namespace App\Repository;

use App\Entity\Categorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categorie>
 *
 * @method Categorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorie[]    findAll()
 * @method Categorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }

    public function findpcn(): array
    {
        // automatically knows to select Products
        // the "p" is an alias you'll use in the rest of the query
        $qb = $this->createQueryBuilder('p')
            ->where('p.cat_nom = :PC')
            ->setParameter('PC', 'PC');
           // ->orderBy('p.price', 'ASC');

        // if (!$includeUnavailableProducts) {
        //     $qb->andWhere('p.available = TRUE');
        // }

        $query = $qb->getQuery();

        return $query->execute();

        // to get just one result:
        // $product = $query->setMaxResults(1)->getOneOrNullResult();
    }

    public function findSousCat(): array
    {
        // automatically knows to select Products
        // the "p" is an alias you'll use in the rest of the query
        $qb = $this->createQueryBuilder('p')
            ->where('p.cat_parent > :n')
            ->setParameter('n', 0);
           // ->orderBy('p.price', 'ASC');

        // if (!$includeUnavailableProducts) {
        //     $qb->andWhere('p.available = TRUE');
        // }

        $query = $qb->getQuery();

        return $query->execute();

        // to get just one result:
        // $product = $query->setMaxResults(1)->getOneOrNullResult();
    }
    
    public function findCatSql(): array{
        $conn = $this->getEntityManager()->getConnection();


        $sql = '
            SELECT * FROM categorie p
            WHERE p.cat_parent_id is not null
            ';

        $resultSet = $conn->executeQuery($sql);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    public function findId($cat_nom): Categorie
    {
        $qb = $this->createQueryBuilder('p')
        ->where('p.cat_nom = :cat_nom')
        ->setParameter('cat_nom', $cat_nom);
        $query = $qb->getQuery();

        return $query->getOneOrNullResult();
    }

    public function findIdSql(string $cat_nom): array{
        $conn = $this->getEntityManager()->getConnection();


        $sql = '
            SELECT id FROM categorie p
            WHERE p.cat_nom = :cat_nom
            ';

        $resultSet = $conn->executeQuery($sql, ['cat_nom' => $cat_nom]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }
//    /**
//     * @return Categorie[] Returns an array of Categorie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Categorie
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
