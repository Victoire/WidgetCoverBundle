@mink:selenium2 @alice(Page) @alice(MediaFile) @reset-schema
Feature: Manage a Cover widget

    Background:
        Given I am on homepage

    Scenario: I can create a new Cover widget
        When I switch to "layout" mode
        Then I should see "New content"
        When I select "Cover" from the "1" select of "main_content" slot
        Then I should see "Widget (Cover)"
        And I should see "1" quantum
        When I attach image with id "1" to victoire field "a_static_widget_cover_image_widget"
        And I fill in "_a_static_widget_cover[opacity]" with "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5))"
        And I submit the widget
        Then I should see element with selector "#widget-1 .cover" containing style "/uploads/55953304833d5.jpg"
        Then I should see element with selector "#widget-1 .cover" containing style "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5))"

    Scenario: I can update a Cover widget
        Given the following WidgetMap:
            | view | action | slot         |
            | home | create | main_content |
        And the following WidgetCover:
            | widgetMap | opacity                                                 | image    | containerHeightLG | containerHeightMD | containerHeightSM | containerHeightXS |
            | home      | linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)) | victoire | 400px             | 350px             | 250px             | 150px             |
        When I reload the page
        Then I should see element with selector "#widget-1 .cover" containing style "/uploads/55dc8d8a4c9d3.jpg"
        Then I should see element with selector "#widget-1 .cover" containing style "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5))"
        When I switch to "edit" mode
        And I edit the "Cover" widget
        And I should see "Widget #1 (Cover)"
        And I should see "1" quantum
        When I attach image with id "1" to victoire field "a_static_widget_cover_image_widget"
        And I fill in "_a_static_widget_cover[opacity]" with "linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8))"
        And I submit the widget
        Then I should see element with selector "#widget-1 .cover" containing style "/uploads/55953304833d5.jpg"
        Then I should see element with selector "#widget-1 .cover" containing style "linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8))"