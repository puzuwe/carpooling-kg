@javascript
Feature: Switch between languages
  In order to see pages in many languages
  As a user
  I need to be able to switch between languages
  Scenario: Switch to english language
    Given I am on "/"
    Then I should see "English"
    When I follow "English"
    Then I should see "smart ridesharing"
  Scenario: Switch to russian
    Given I am on "/"
    Then I should see "Русский"
    When I follow "Русский"
    Then I should see "поиск попутчиков"