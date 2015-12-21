Feature: User Login
   In order to access the account page 
  As a authenticated user 
  I want to be able to make login and logout 

  @javascript
  Scenario: Not logged in users should not be able to access the account page.
    Given I go to the homepage
    And I am not logged in 
    When I go to account page "/mi-cuenta"
    Then I should be on "/inicio-sesion"

  @javascript
  Scenario: Logged in user should be able to access the account page.
    Given I am logged in with user "test1@develex.es" and password "112233"
    When I go to account page "/mi-cuenta"
    Then I should be on the account page "/mi-cuenta"

  @javascript
  Scenario: Logged in user should not be able to access login page.
    Given I am logged in with user "test1@develex.es" and password "112233"
    When I go to "/inicio-sesion"
    Then I should be on the account page "/mi-cuenta"

  @javascript
  Scenario: Logged in user should be able to logout.
    Given I am logged in with user "test1@develex.es" and password "112233"
    When I follow "Cerrer sesión"
    Then I should be on "/inicio-sesion"