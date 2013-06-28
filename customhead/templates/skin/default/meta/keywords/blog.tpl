{strip}
{if $oTopic}
    {if $oTopic->getHtmlKeywords()}
        {$oTopic->getHtmlKeywords()}
    {else}
        {$sHtmlKeywords}
    {/if}
{else}
    {$sHtmlKeywords}
{/if}
{/strip}