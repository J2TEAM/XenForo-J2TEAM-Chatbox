<?php
define('AUTHOR', 'JUNO_OKYO');
define('COPYRIGHT', 'J2TEAM');

class J2TeaM_chatbox_index
{
  
  public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
  {
    $options = XenForo_Application::get('options');

    if (intval($options->j2team_chatbox_enable) === 1) {
      switch ($hookName)
      {
        case page_container_head:
          $contents .= '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700,400italic,700italic&amp;subset=latin,vietnamese">';
          break;

        case forum_list_nodes:
          $code = $template->create('j2team_chat_main', $template->getParams());
          $contents = $code . $contents;
          break;

        case page_container_js_body:
          $contents .= $template->create('j2team_chat.js', $template->getParams());
          break;
      }
    }
  }
}
