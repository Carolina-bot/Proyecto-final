<?php

namespace App\Repository;

use App\Entity\Plato;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Plato>
 *
 * @method Plato|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plato|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plato[]    findAll()
 * @method Plato[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plato::class);
    }


    public function savePlato($id, $Nombre, $Tipo, $Altranuces, $Apio, $Cacahuetes, $Crustaceos, $Sulfitos, $Cascara, $Gluten, $Sesamo, $Huevo, $Lacteos, $Moluscos, $Mostaza, $Pescado, $Soja)
    {
        $newPlato = new Plato();

        $newPlato
            ->setId($id)
            ->setNombre($Nombre)
            ->setTipo($Tipo)
            ->setAltranuces($Altranuces)
            ->setApio($Apio)
            ->setCacahuetes($Cacahuetes)
            ->setCrustaceos($Crustaceos)
            ->setSulfitos($Sulfitos)
            ->setCascara($Cascara)
            ->setGluten($Gluten)
            ->setSesamo($Sesamo)
            ->setHuevo($Huevo)
            ->setLacteos($Lacteos)
            ->setMoluscos($Moluscos)
            ->setMostaza($Mostaza)
            ->setPescado($Pescado)
            ->setSoja($Soja);

        $this->manager->persist($newPlato);
        $this->manager->flush();
    }

    public function updatePlato(Plato $plato): Plato
    {
        $this->manager->persist($plato);
        $this->manager->flush();

        return $plato;
    }


    public function removePlato(Plato $plato)
    {
        $this->manager->remove($plato);
        $this->manager->flush();
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Plato $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Plato $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Plato[] Returns an array of Plato objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Plato
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
