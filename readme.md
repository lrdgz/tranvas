vendor\bin\phpunit
vendor\bin\phpcs --standard=PSR2 app
vendor\bin\phpunit --filter=a_guest_should_not_see_event_section
