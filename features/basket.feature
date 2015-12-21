Feature: Basket
  In order to add a product to the basket
  As a website user
  I need to add the product to my basket
  And I should see the product in the basket

  @javascript
  Scenario: Add a product to the basket and top cart increases
    Given I am on homepage
    When I hover over ".product-image-container a"
    And I click on "a.ajax_add_to_cart_button span"
    And I waiting modal window "#layer_cart"
    And And I continue buying clicking on "span.continue span"
    And I hover over ".shopping_cart a"
    Then I should see ".shopping_cart .ajax_cart_quantity" has "1" item in it

  @javascript
  Scenario: Add a product to basket from product page
    Given I am on a product page "/blusas/2-blusa.html"
    When I click "Añadir al carrito"
    And I waiting modal window "#layer_cart"
    And And I continue buying clicking on "span.continue span"
    And I hover over ".shopping_cart a"
    Then I should see the product title "Blusa"