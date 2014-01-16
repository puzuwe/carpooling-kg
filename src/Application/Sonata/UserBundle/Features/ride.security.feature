@javascript
Feature: User Rides CRUD
  In order to add new ride
  As a User
  I should be able to see ride CRUD pages.

  Scenario: Add new Ride
    Given I am on "/login"
    Then I fill in "username" with "nurali@gmail.com"
    And I fill in "password" with "nurali"
    And I press "_submit"
    Then I should be on "/"
    When I follow "New ride"
    Then I should be on "/en/users/3/rides/new"