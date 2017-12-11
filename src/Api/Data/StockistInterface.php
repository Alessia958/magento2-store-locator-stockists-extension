<?php
declare(strict_types=1);
/**
 * Limesharp_Stockists extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category  Limesharp
 * @package   Limesharp_Stockists
 * @copyright 2016 Claudiu Creanga
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @author    Claudiu Creanga
 */
namespace Limesharp\Stockists\Api\Data;

/**
 * @api
 */
interface StockistInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const STOCKIST_ID         = 'stockist_id';
    const NAME                = 'name';
    const ADDRESS             = 'address';
    const CITY                = 'city';
    const POSTCODE            = 'postcode';
    const REGION              = 'region';
    const EMAIL               = 'email';
    const PHONE               = 'phone';
    const LATITUDE            = 'latitude';
    const LONGITUDE           = 'longitude';
    const LINK                = 'link';
    const STATUS              = 'status';
    const TYPE                = 'type';
    const COUNTRY             = 'country';
    const HEADER_IMAGE        = 'header_image';
    const CREATED_AT          = 'created_at';
    const UPDATED_AT          = 'updated_at';
    const STORE_ID            = 'store_id';
    const SCHEDULE            = 'schedule';
    const INTRO               = 'intro';
    const DESCRIPTION         = 'description';
    const DESCRIPTION_EN       = 'description_en';
    const SHORT_DESCRIPTION_EN       = 'short_description_en';    
    const DISTANCE            = 'distance';
    const STATION             = 'station';
    const RIGHT_IMAGE         = 'right_image';
    const EXTERNAL_LINK       = 'external_link';
    const BOOKABLE            = 'bookable';
    const ONLINE              = 'online';
    const CATEGORY            = 'category';
    const SCHEDULE_MONDAY     = 'schedule_monday';
    const SCHEDULE_TUESDAY    = 'schedule_tuesday';
    const SCHEDULE_WEDNESDAY  = 'schedule_wednesday';
    const SCHEDULE_THURSDAY   = 'schedule_thursday';
    const SCHEDULE_FRIDAY     = 'schedule_friday';
    const SCHEDULE_SATURDAY   = 'schedule_saturday';
    const SCHEDULE_SUNDAY     = 'schedule_sunday';
    const PRIORITY            = 'priority';
    const INFLUENTIAL         = 'influential';
    const PROMOTED         = 'promoted';
    const LEFT_IMAGE       = 'left_image';
    const BOUTIQUE_SECTION_IMAGE       = 'boutique_section_image';
    
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get schedule
     *
     * @return string
     */
    public function getSchedule();


    /**
     * Get intro
     *
     * @return string
     */
    public function getIntro();

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

        /**
     * Get description_en
     *
     * @return string
     */
     public function getDescriptionEn();

             /**
     * Get short_description_en
     *
     * @return string
     */
     public function getShortDescriptionEn();

    /**
     * Get external link
     *
     * @return string
     */
    public function getExternalLink();

    /**
     * Get distance
     *
     * @return string
     */
    public function getDistance();

    /**
     * Get station
     *
     * @return string
     */
    public function getStation();

    /**
     * Get store right image
     *
     * @return string
     */
    public function getRightImage();

    /**
     * Get store left image
     *
     * @return string
     */
     public function getLeftImage();

    /**
     * Get boutique section image
     *
     * @return string
     */
    public function getBoutiqueSectionImage();

    
    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Get store url
     *
     * @return string
     */
    public function getLink();
    
    /**
     * Get address
     *
     * @return string
     */
    public function getAddress();
    
    /**
     * Get city
     *
     * @return string
     */
    public function getCity();
    
    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode();
    
    /**
     * Get region
     *
     * @return string
     */
    public function getRegion();
    
    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();
    
    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone();
    
    /**
     * Get image
     *
     * @return string
     */
    public function getHeaderImage();
    
    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude();
    
    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude();

    /**
     * Get is active
     *
     * @return bool|int
     */
    public function getStatus();

    /**
     * Get type
     *
     * @return int
     */
    public function getType();

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry();

    /**
     * Get online
     *
     * @return string
     */
    public function getOnline();

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory();

    /**
     * Get bookable
     *
     * @return string
     */
    public function getBookable();

    /**
     * set id
     *
     * @param $id
     * @return StockistInterface
     */
    public function setId($id);

    /**
     * set name
     *
     * @param $name
     * @return StockistInterface
     */
    public function setName($name);

    /**
     * set link
     *
     * @param $link
     * @return StockistInterface
     */
    public function setLink($link);
    
    /**
     * set header image
     *
     * @param $header_image
     * @return AuthorInterface
     */
    public function setHeaderImage($header_image);
    
    /**
     * set boutique section image
     *
     * @param $boutique_section_image
     * @return AuthorInterface
     */
     public function setBoutiqueSectionImage($boutique_section_image);
     

    /**
     * set address
     *
     * @param $address
     * @return StockistInterface
     */
    public function setAddress($address);

    /**
     * set city
     *
     * @param $city
     * @return StockistInterface
     */
    public function setCity($city);
    
    /**
     * set postcode
     *
     * @param $postcode
     * @return StockistInterface
     */
    public function setPostcode($postcode);

    /**
     * set schedule
     *
     * @param $schedule
     * @return StockistInterface
     */
    public function setSchedule($schedule);

    /**
     * set schedule_monday
     *
     * @param $schedule_monday
     * @return StockistInterface
     */
    public function setScheduleMonday($schedule_monday);

     /**
    *Get schedule_monday
     *
     * @return string
     */
    public function getScheduleMonday();

     /**
     * set schedule_tuesday
     *
     * @param $schedule_tuesday
     * @return StockistInterface
     */
    public function setScheduleTuesday($schedule_tuesday);

    /**
    *Get schedule_tuesday
     *
     * @return string
     */
    public function getScheduleTuesday();

     
    /**
     * set schedule_wednesday
     *
     * @param $schedule_wednesday
     * @return StockistInterface
     */
    public function setScheduleWednesday($schedule_wednesday);

    /**
    *Get schedule_wednesday
     *
     * @return string
     */
    public function getScheduleWednesday();
     
    /**
     * set schedule_thursday
     *
     * @param $schedule_thursday
     * @return StockistInterface
     */
    public function setScheduleThursday($schedule_thursday);
   
    /**
    *Get schedule_thursday
     *
     * @return string
     */
    public function getScheduleThursday();
     
    
    /**
     * set schedule_friday
     *
     * @param $schedule_friday
     * @return StockistInterface
     */
    public function setScheduleFriday($schedule_friday);

    /**
    *Get schedule_friday
     *
     * @return string
     */
    public function getScheduleFriday();

    /**
     * set schedule_saturday
     *
     * @param $schedule_saturday
     * @return StockistInterface
     */
    public function setScheduleSaturday($schedule_saturday);

    /**
    *Get schedule_saturday
     *
     * @return string
     */
    public function getScheduleSaturday();
     
    /**
     * set schedule_sunday
     *
     * @param $schedule_sunday
     * @return StockistInterface
     */
    public function setScheduleSunday($schedule_sunday);

    /**
    *Get schedule_sunday
     *
     * @return string
     */
    public function getScheduleSunday();
     
    /**
     * set description
     *
     * @param $description
     * @return StockistInterface
     */

    public function setDescription($description);

        /**
     * set description_en
     *
     * @param $description_en
     * @return StockistInterface
     */

     public function setDescriptionEn($description_en);

         /**
     * set short_description_en
     *
     * @param $short_description_en
     * @return StockistInterface
     */

    public function setShortDescriptionEn($short_description_en);

    /**
     * set distance
     *
     * @param $distance
     * @return StockistInterface
     */
    public function setDistance($distance);

    /**
     * set station
     *
     * @param $station
     * @return StockistInterface
     */
    public function setStation($station);

    /**
     * set external link
     *
     * @param $external_link
     * @return StockistInterface
     */
    public function setExternalLink($external_link);

    /**
     * set intro
     *
     * @param $intro
     * @return StockistInterface
     */
    public function setIntro($intro);

    /**
     * set store right image
     *
     * @param $right_image
     * @return StockistInterface
     */
    public function setRightImage($right_image);

    /**
     * set store left image
     *
     * @param $left_image
     * @return StockistInterface
     */
     public function setLeftImage($left_image);

    /**
     * set region
     *
     * @param $region
     * @return StockistInterface
     */
    public function setRegion($region);

    /**
     * set email
     *
     * @param $email
     * @return StockistInterface
     */
    public function setEmail($email);
    
    /**
     * set phone
     *
     * @param $phone
     * @return StockistInterface
     */
    public function setPhone($phone);

    /**
     * set latitude
     *
     * @param $latitude
     * @return StockistInterface
     */
    public function setLatitude($latitude);
    
    /**
     * set longitude
     *
     * @param $longitude
     * @return StockistInterface
     */
    public function setLongitude($longitude);

    /**
     * Set status
     *
     * @param $status
     * @return StockistInterface
     */
    public function setStatus($status);

    /**
     * set type
     *
     * @param $type
     * @return StockistInterface
     */
    public function setType($type);

    /**
     * Set country
     *
     * @param $country
     * @return StockistInterface
     */
    public function setCountry($country);

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * set created at
     *
     * @param $createdAt
     * @return StockistInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated at
     *
     * @return string
     */
    public function getUpdatedAt();

    /**
     *Set updated at
     *
     * @param $updatedAt
     * @return StockistInterface
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Set online
     *
     * @return string
     */
    public function setOnline($online);

    /**
     * Set category
     * @param $category
     * @return string
     */
    public function setCategory($category);

    /**
    *Set bookable
     *
     * @param $bookable
     * @return string
     */
    public function setBookable($bookable);

    /**
    *Set priority
     *
     * @param $priority
     * @return int[]
     */
    public function setPriority($priority);
     
    /**
    *Set influential
     *
     * @param $influential
     * @return string
     */
    public function setInfluential($influential);
	
    /**
     * Set promoted
     *
     * @param $promoted
     * @return string
     */
	public function setPromoted($promoted);
     
     /**
     * Get priority
     *
     * @return int[]
     */
    public function getPriority();
     
    /**
     * Get influential
     *
     * @return string
     */
    public function getInfluential();

    /**
     * Get promoted
     *
     * @return string
     */
    public function getPromoted();
    
    /**
     * @param $storeId
     * @return StockistInterface
     */
    public function setStoreId($storeId);

    /**
     * @return int[]
     */
    public function getStoreId();
}
