<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 6.1.2017
 * Time: 13:27
 */

namespace Dynamo\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dynamo\Bundle\PortalBundle\Entity\CreatedAtInterface;
use Dynamo\Bundle\PortalBundle\Entity\Traits\CreatedAtTrait;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Class User
 * @package Dynamo\Bundle\UserBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="dynamo_user")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\AttributeOverrides({
 *     @ORM\AttributeOverride(
 *         name="email",
 *         column=@ORM\Column(type="string", name="email", length=50, unique=false, nullable=true)
 *     ),
 *     @ORM\AttributeOverride(
 *         name="emailCanonical",
 *         column=@ORM\Column(type="string", name="email_canonical", length=50, unique=true, nullable=true)
 *     )
 * })
 */
class User extends BaseUser implements CreatedAtInterface
{
    use CreatedAtTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="chat_color", type="string", length=6, nullable=true)
     */
    private $chatColor;

    /**
     * @var string
     * @ORM\Column(name="first_name", type="string", length=24, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(name="last_name", type="string", length=32, nullable=true)
     */
    private $lastName;

    /**
     * @var \DateTime
     * @ORM\Column(name="birth_date", type="date", nullable=true, nullable=true)
     */
    private $birthDate;

    /**
     * @var string
     * @ORM\Column(name="birth_place", type="string", length=50, nullable=true)
     */
    private $birthPlace;

    /**
     * @var string
     * @ORM\Column(name="address", type="string", length=50, nullable=true)
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(name="phone", type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @var string
     * @ORM\Column(name="avatar", type="string", length=100, nullable=true)
     */
    private $avatar;

    /**
     * @var \DateTime
     * @ORM\Column(name="member_from", type="date", nullable=true)
     */
    private $memberFrom;

    /**
     * @var \DateTime
     * @ORM\Column(name="member_till", type="date", nullable=true)
     */
    private $memberTill;

    /**
     * @var string
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var boolean
     * @ORM\Column(name="send_emails", type="boolean")
     */
    private $sendEmails = 1;

    /**
     * @var string
     * @ORM\Column(name="membership", type="string", length=16, nullable=false)
     */
    private $membership;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getChatColor()
    {
        return $this->chatColor;
    }

    /**
     * @param string $chatColor
     */
    public function setChatColor($chatColor)
    {
        $this->chatColor = $chatColor;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * @param string $birthPlace
     */
    public function setBirthPlace($birthPlace)
    {
        $this->birthPlace = $birthPlace;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return \DateTime
     */
    public function getMemberFrom()
    {
        return $this->memberFrom;
    }

    /**
     * @param \DateTime $memberFrom
     */
    public function setMemberFrom($memberFrom)
    {
        $this->memberFrom = $memberFrom;
    }

    /**
     * @return \DateTime
     */
    public function getMemberTill()
    {
        return $this->memberTill;
    }

    /**
     * @param \DateTime $memberTill
     */
    public function setMemberTill($memberTill)
    {
        $this->memberTill = $memberTill;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return bool
     */
    public function isSendEmails()
    {
        return $this->sendEmails;
    }

    /**
     * @param bool $sendEmails
     */
    public function setSendEmails($sendEmails)
    {
        $this->sendEmails = $sendEmails;
    }

    /**
     * @return string
     */
    public function getMembership()
    {
        return $this->membership;
    }

    /**
     * @param string $membership
     */
    public function setMembership($membership)
    {
        $this->membership = $membership;
    }
}