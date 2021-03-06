<?php

/**
 * Apptha
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.apptha.com/LICENSE.txt
 *
 * ==============================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * ==============================================================
 * This package designed for Magento COMMUNITY edition
 * Apptha does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * Apptha does not provide extension support in case of
 * incorrect edition usage.
 * ==============================================================
 *
 * @category    Apptha
 * @package     Apptha_Airhotels
 * @version     0.2.9
 * @author      Apptha Team <developers@contus.in>
 * @copyright   Copyright (c) 2014 Apptha. (http://www.apptha.com)
 * @license     http://www.apptha.com/LICENSE.txt
 *
 */

/**
 * Subscription Type Edit block
 */
class Apptha_Airhotels_Block_Adminhtml_Subscriptiontype_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    /**
     * creating the Construct Method
     */
    public function __construct() {
        /**
         * Calling the parent Construct Method.
         */
        parent::__construct ();
        /**
         * Defining block
         */
        $this->_objectId = 'id';
        $this->_blockGroup = 'airhotels';
        /**
         * Defining controller
         */
        $this->_controller = 'adminhtml_subscriptiontype';
        /**
         * Add the Update Button
         */
        $this->_updateButton ( 'delete', 'label', Mage::helper ( 'airhotels' )->__ ( 'Delete Type' ) );
        /**
         * Add the button
         */
        $this->_addButton ( 'saveandcontinue', array (
                'label' => Mage::helper ( 'adminhtml' )->__ ( 'Save And Continue Edit' ),
                'onclick' => 'saveAndContinueEdit()',
                'class' => 'save'
        ), - 100 );
        /**
         * Update button for save label
         */
        $this->_updateButton ( 'save', 'label', Mage::helper ( 'airhotels' )->__ ( 'Save Type' ) );
        $this->_formScripts [] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('subscriptiontype_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'subscriptiontype_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'subscriptiontype_content');
                }
            }
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }    
    /**
     * Function Name: getHeaderText()
     * Set Header Text
     *
     * @see Mage_Adminhtml_Block_Widget_Container::getHeaderText()
     */
    public function getHeaderText() {
        if (Mage::registry ( 'subscriptiontype_data' ) && Mage::registry ( 'subscriptiontype_data' )->getId ()) {
            /**
             * Return header text.
             */
            return Mage::helper ( 'airhotels' )->__ ( "Edit Type  " . '%s', '"' . $this->htmlEscape ( Mage::registry ( 'subscriptiontype_data' )->getTitle () ) . '"' );
        } else {
            /**
             * Return header text.
             */
            return Mage::helper ( 'airhotels' )->__ ( 'Add Type' );
        }
    }
}