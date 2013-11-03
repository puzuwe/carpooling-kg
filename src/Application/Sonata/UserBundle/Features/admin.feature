@javascript
Feature: Authorization
  In order to see Admin Interface
  As an Administrator
  I need to be able to authenticate
# Use @javascript for browser realtime emulation
  Scenario: Sucessfully Authenticate
    Given I am on "admin/login"
    When I fill in "_username" with "admin"
    And  I fill in "password" with "admin"
    And I press "_submit"
    Then I should be on "/admin/dashboard"
    And I should see "Logout"
    When I follow "Logout"
    Then should be on "/"