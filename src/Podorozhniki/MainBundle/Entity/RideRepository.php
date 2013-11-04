<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 04.11.13
 * Time: 13:02
 */

namespace Podorozhniki\MainBundle\Entity;


use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;

class RideRepository extends EntityRepository
{

    public function PaginateFindAll($paginator, Request $request, $page_range)
    {
        $query = $this->getEntityManager()->createQuery("select r from PodorozhnikiMainBundle:Ride r");
        $rides = $paginator->paginate($query, $request->query->get('page', 1), $page_range);
        return $rides;
    }

    public function PaginateFindAllByUser($paginator, Request $request, $page_range, $user){
        $query = $this->getEntityManager()->createQuery("select r from PodorozhnikiMainBundle:Ride r where r.user = :usert")->setParameter("usert",$user);
        $rides = $paginator->paginate($query,$request->query->get('page',1),$page_range);
        return $rides;
    }
} 