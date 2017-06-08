<?php
/**
 * Created by PhpStorm.
 * User: mitchelaustin
 * Date: 08/06/2017
 * Time: 14:02
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

//    public function __construct()
//    {
//        parent::__construct();
//        // your own logic
//    }
}