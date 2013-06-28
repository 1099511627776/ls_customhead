{strip}
{if $oTopic}
    {if $oTopic->getHtmlDescription()}
        {$oTopic->getHtmlDescription()}
    {else}
        {$sHtmlDescription}
    {/if}
{else}
    {$sHtmlDescription}
{/if}
{/strip}