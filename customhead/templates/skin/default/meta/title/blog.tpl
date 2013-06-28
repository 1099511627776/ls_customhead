{strip}
{if $oTopic}
    {if $oTopic->getHtmlTitle()}
        {$oTopic->getHtmlTitle()}
    {else}
        {$sHtmlTitle}
    {/if}
{else}
    {$sHtmlTitle}
{/if}
{/strip}