@javascript
Feature: User Login
  In order to login
  As a User
  I need to be able to see login page


  Scenario: Login page
    Given I am on "/"
    Then I should see "Login"
    When I follow "Login"
    Then I should be on "/login"
    Then I should see "Register"
    And  I should see "Forgot password?"

  Scenario: Forgot password
    Given I am on "en/resetting/request"
    Then I should see "Username or email address:"