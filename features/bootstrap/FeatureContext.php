<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I am not logged in 
     */
    public function iAmNotLoggedIn()
    {
        $this->assertSession()->pageTextContains("Iniciar sesión");
    }

    /**
     * @When I go to account page :page
     */
    public function iGoToAccountPage($page)
    {
        $this->visit($page);
    }

    /**
     * @Given I am logged in with user :email and password :password
     */
    public function iAmLoggedInWithUserAndPassword($email, $password)
    {
        $this->getSession()->visit($this->locatePath('/mi-cuenta'));
        $page = $this->getSession()->getPage();
        $page->fillField('email', $email);
        $page->fillField('passwd', $password);
        $page->pressButton('SubmitLogin');
    }

    /**
     * @Then I should be on the account page :page
     */
    public function iShouldBeOnTheAccountPage($page)
    {
        $this->assertPageAddress($page);
    }

    /**
     * @When I hover over :container
     */
    public function iHoverOver($container)
    {
        $this->getSession()->getPage()->find('css', $container)->mouseOver();
    }

    /**
     * @When I click on :btn
     */
    public function iClickOn($btn)
    {
        $this->getSession()->getPage()->find('css', $btn)->click();
    }

    /**
     * @When I waiting modal window :modal
     */
    public function iWaitingModalWindow($modal)
    {
        $this->getSession()->wait(5000, "$('".$modal."').is(':visible')");
    }

    /**
     * @When And I continue buying clicking on :continue
     */
    public function andIContinueBuyingClickingOn($continue)
    {
        $this->getSession()->getPage()->find('css', $continue)->click();
    }

    /**
     * @Then I should see :cart has :totalItem item in it
     */
    public function iShouldSeeHasItemInIt($cart, $totalItem)
    {
        $this->getSession()->getPage()->find('css', $cart) == $totalItem;
    }

    /**
     * @Given I am on a product page :page
     */
    public function iAmOnAProductPage($page)
    {
        $this->visit($page);
    }

    /**
     * @When I click :btn
     */
    public function iClick($btn)
    {
        $this->getSession()->getPage()->pressButton($btn);
    }

    /**
     * @Then I should see the product title :productName
     */
    public function iShouldSeeTheProductTitle($productName)
    {
        $this->getSession()->getPage()->find('css', '.cart_block_product_name') == $productName;
    }
}
