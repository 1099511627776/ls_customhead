<?php
class PluginCustomhead_ModuleTopic_EntityTopic extends PluginCustomhead_Inherit_ModuleTopic_EntityTopic{

    ///////////////////////////////////////////////////
    public function setHtmlTitle($value){
        $this->setExtraValue('html_title',$value);
    }
    public function getHtmlTitle(){
        return $this->getExtraValue('html_title');
    }
    ///////////////////////////////////////////////////
    public function setHtmlKeywords($value){
        $this->setExtraValue('html_keywords',$value);
    }
    public function getHtmlKeywords(){
        return $this->getExtraValue('html_keywords');
    }
    ///////////////////////////////////////////////////
    public function setHtmlDescription($value){
        $this->setExtraValue('html_description',$value);
    }
    public function getHtmlDescription(){
        return $this->getExtraValue('html_description');
    }

}