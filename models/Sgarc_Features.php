<?php
defined( 'ABSPATH' ) or die( 'Forbidden!' );


/**
 * Class Sgarc_Features
 */
class Sgarc_Features
{

   const USER_ID = 'user_id';
   const ACTIVATION_CODE = 'activation_code';
   const LIST_NUMBER = 'list_number';
   const GPDR_ENABLED = 'gpdr_enabled';
   const ACCEPTING_CONDITIONS_TEXT = 'accepting_conditions_text';
   const ACCEPTING_CONDITIONS_REQUIRED = 'accepting_conditions_required';

   protected $userId;

   protected $activationCode;

   protected $listNumber;

   protected $gpdrEnabled;

   protected $acceptingConditionsText;

   protected $acceptingConditionsRequired;

   public function __construct($plugin_name){
       $settings = get_option($plugin_name);
       $this->initFeatures($settings);
   }

   protected function initFeatures($settings){
       $this->userId = (isset($settings[self::USER_ID]) && !empty(trim($settings[self::USER_ID]))) ? $settings[self::USER_ID] : '';
       $this->activationCode = (isset($settings[self::ACTIVATION_CODE]) && !empty(trim($settings[self::ACTIVATION_CODE]))) ? $settings[self::ACTIVATION_CODE] : '';
       $this->listNumber = (isset($settings[self::LIST_NUMBER]) && !empty(trim($settings[self::LIST_NUMBER]))) ? $settings[self::LIST_NUMBER] : '';
       $this->gpdrEnabled = (isset($settings[self::GPDR_ENABLED]) && 1 === $settings[self::GPDR_ENABLED]) ? true : false;
       $this->acceptingConditionsText = (isset($settings[self::ACCEPTING_CONDITIONS_TEXT]) && !empty(trim($settings[self::ACCEPTING_CONDITIONS_TEXT]))) ? $settings[self::ACCEPTING_CONDITIONS_TEXT] : '';
       $this->acceptingConditionsRequired = (isset($settings[self::ACCEPTING_CONDITIONS_REQUIRED]) && 1 === $settings[self::ACCEPTING_CONDITIONS_REQUIRED]) ? true : false;
   }


    /**
     * Checks whether REQUIRED fields to submit queries to the API are filled, if not,
     * @return bool
     */
    public function isValid(){
       return ('' !== $this->userId && '' !== $this->activationCode && '' !== $this->listNumber);
   }

    /**
     * Returns true if all settings to show the "condition accepting text" to the user are properly filled
     * @return bool
     */
    public function acceptingConditionsIsCompleted(){
        if(!$this->isValid()){
            return false;
        }
        return $this->gpdrEnabled && '' !== $this->acceptingConditionsText;
   }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getActivationCode()
    {
        return $this->activationCode;
    }

    /**
     * @return mixed
     */
    public function getListNumber()
    {
        return $this->listNumber;
    }

    /**
     * @return mixed
     */
    public function getGpdrEnabled()
    {
        return $this->gpdrEnabled;
    }

    /**
     * @return mixed
     */
    public function getAcceptingConditionsText()
    {
        return $this->acceptingConditionsText;
    }

    /**
     * @return mixed
     */
    public function getAcceptingConditionsRequired()
    {
        return $this->acceptingConditionsRequired;
    }


}