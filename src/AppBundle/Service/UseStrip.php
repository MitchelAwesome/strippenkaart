<?php
/**
 * Created by PhpStorm.
 * User: mitchelaustin
 * Date: 02/06/2017
 * Time: 18:26
 */

namespace AppBundle\Service;


use AppBundle\Entity\Lid;
use AppBundle\Entity\Strip;
use Doctrine\ORM\EntityManager;

class UseStrip
{

    /** @var EntityManager**/
    protected $em;


    /**
     * @param EntityManager $em
    **/
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function useStripOfUser(Strip $strip)
    {

        $strip->setUsedAt(new \DateTime('now'));
        $strip->setUsed(true);

        $this->em->persist($strip);
        $this->em->flush();

        return true;


    }

    public function restoreStrip(Strip $strip)
    {

        $strip->setUsedAt(NULL);
        $strip->setUsed(false);

        $this->em->persist($strip);
        $this->em->flush();

        return true;

    }

}