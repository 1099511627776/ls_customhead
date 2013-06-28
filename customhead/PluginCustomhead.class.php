<?php
/**
 * Deny direct access to this file
 */
if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginCustomhead extends Plugin {

    protected $aInherits=array(
        'entity' => array('ModuleTopic_EntityTopic'),
    );

    /**
     * Plugin Activation
     *
     * @return boolean
     */
    public function Activate() {
        return true;
    }

    /**
     * Plugin Initialization
     *
     * @return void
     */
    public function Init() {
        
    }

}