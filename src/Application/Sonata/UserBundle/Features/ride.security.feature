@javascript
Feature: User Rides CRUD
  In order to add new ride
  As a User
  I should be able to see ride CRUD pages.

  Scenario: Add new Ride
    Given I am on "/en/login"
    Then I fill in "username" with "admin"
    And I fill in "password" with "admin"
    And I press "_submit"
    Then I should be on "/en/"
    When I follow "Add new ride"
    Then I should be on "/en/users/6/rides/new"