<?php

namespace Victoire\Widget\CoverBundle\Tests\Context;

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Knp\FriendlyContexts\Context\RawMinkContext;

class WidgetContext extends RawMinkContext
{
    /**
     * @Then /^I should see element with selector "(.+)" containing style "(.+)"$/
     */
    public function iShouldSeeBackgroundImageWithRelativeUrl($selector, $url)
    {
        $page = $this->getSession()->getPage();

        $elements = $page->findAll('css', sprintf(
            '%s[style*="%s"]',
            $selector,
            $url
        ));

        if (count($elements) < 1) {
            throw new \RuntimeException('The element with selector "'.$selector.'" containing style "'.$url.'" was not found.');
        }
    }
}
