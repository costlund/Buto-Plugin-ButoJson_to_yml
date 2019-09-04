<?php
class PluginButoJson_to_yml{
  function __construct() {
    wfPlugin::includeonce('wf/yml');
  }
  public function page_form(){
    $element = new PluginWfYml(__DIR__.'/element/form.yml');
    wfDocument::renderElement($element->get());
  }
  public function page_parse(){
    $json = wfRequest::get('json');
    $yml = null;
    if($json){
      $yml = json_decode($json, true);
      $yml = wfHelp::getYmlDump($yml);
    }
    $element = new PluginWfYml(__DIR__.'/element/parse.yml');
    $element->setByTag(array('yml' => $yml));
    wfDocument::renderElement($element->get());
  }
}
