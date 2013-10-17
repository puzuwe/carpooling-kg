Feature: Authorization
  In order to be able to see Admin Interface
  As an Administrator
  I need to be able to authenticate
# Use @javascript for browser realtime emulation
  @javascript
  Scenario: Sucessfully Authenticate
    Given I am on "/admin/dashboard"
    Then I should see "Имя пользователя"
    And I should see "Пароль"
    When I fill in "username" with "admin"
    And  I fill in "password" with "password"
    And I press "_submit"
    Then I should be on "/admin/dashboard"
    And I should see "Выход"
    When I follow "Выход"
    Then should be on "/"