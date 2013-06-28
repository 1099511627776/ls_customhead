<?php
class PluginCustomhead_HookCustomhead extends Hook {

    protected $sHtmlTitle = null;
    protected $sHtmlDescription = null;
    protected $sHtmlKeywords = null;
    /**
     * Register hooks
     *
     * @return void
     */
    public function RegisterHook() {
        $this->AddHook('module_viewer_display_before','hook_meta');
        $this->AddHook('template_form_add_topic_topic_begin','add_header_fields');
        $this->AddHook('template_form_add_topic_photoset_begin','add_header_fields');
        $this->AddHook('template_form_add_topic_link_begin','add_header_fields');
        $this->AddHook('topic_add_before','save_headers');
        $this->AddHook('topic_edit_before','save_headers');
        $this->AddHook('topic_edit_show','fill_headers');
    }

    /**
     * Meta hook
     *
     * @return void
     */
    public function hook_meta() {
        $sCurrentPath = Router::GetPathWebCurrent();
        $sAction = Router::GetAction();

        $sMetaDescriptionTemplate = Plugin::GetTemplatePath(__CLASS__) . 'meta/description/' . $sAction . '.tpl';
        if ($this->Viewer_TemplateExists($sMetaDescriptionTemplate)) {
            $sMetaDescription = $this->Viewer_Fetch($sMetaDescriptionTemplate);
            $this->Viewer_Assign("sHtmlDescription", htmlspecialchars($sMetaDescription));
        }

        $sMetaKeywordsTemplate = Plugin::GetTemplatePath(__CLASS__) . 'meta/keywords/' . $sAction . '.tpl';
        if ($this->Viewer_TemplateExists($sMetaKeywordsTemplate)) {
            $sMetaKeywords = $this->Viewer_Fetch($sMetaKeywordsTemplate);
            $this->Viewer_Assign("sHtmlKeywords", htmlspecialchars($sMetaKeywords));
        }

        $sMetaTitleTemplate = Plugin::GetTemplatePath(__CLASS__) . 'meta/title/' . $sAction . '.tpl';
        if ($this->Viewer_TemplateExists($sMetaTitleTemplate)) {
            $sMetaTitle = $this->Viewer_Fetch($sMetaTitleTemplate);
            $this->Viewer_Assign("sHtmlTitle", htmlspecialchars($sMetaTitle));
        }


        foreach(Config::Get('plugin.customhead.headers') as $header){
            if(preg_match($header['pattern'],$sCurrentPath)){
                $this->Viewer_Assign('sHtmlTitle',$header['title']);
                $this->Viewer_Assign('sHtmlDescription',htmlspecialchars($header['description']));
                $this->Viewer_Assign('sHtmlKeywords',htmlspecialchars($header['keywords']));
            }
        }
    }

    public function save_headers($params){
        $oTopic = $params['oTopic'];
        $oTopic->setHtmlTitle(htmlspecialchars($_POST['topic_html_title']));
        $oTopic->setHtmlKeywords(htmlspecialchars($_POST['topic_html_keywords']));
        $oTopic->setHtmlDescription(htmlspecialchars($_POST['topic_html_description']));
    }

    public function fill_headers($params){
        $oTopic = $params['oTopic'];
        $_REQUEST['topic_html_title'] = $oTopic->getHtmlTitle();
        $_REQUEST['topic_html_keywords'] = $oTopic->getHtmlKeywords();
        $_REQUEST['topic_html_description'] = $oTopic->getHtmlDescription();
    }

    public function add_header_fields(){
        return $this->Viewer_Fetch(Plugin::GetTemplatePath('customhead').'inject.headers.tpl');
    }


}