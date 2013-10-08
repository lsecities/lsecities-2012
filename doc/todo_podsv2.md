# Upgrading theme to Pods v2.x - TODO

* DONE: port helper input/people to Podsv2 (used in: event/speakers,
  event/respondents, event/chairs, event/moderators, people_group/members,
  publication_wrappers/authors, publication_wrappers/editors,
  publication_wrappers/contributors, research_output/authors,
  research_output/contributors, research_project/coordinators,
  research_project/researchers)
* DONE: port helper input/tile to Podsv2 (used in: slide/tile_NN)
* DONE (NOT NEEDED): check whether helper input/date/timepicker is still needed
  (should be provided by Podsv2)
* check whether helper pre_save/date is still needed (used in: event)
* NOT NEEDED: port input/select_categories to Podsv2 (used in: article/tags)
* port pre_save/save_categories to Podsv2 (used in: article)
* port pre_save/authors_slug to Podsv2 (used in: authors)
* NOT NEEDED: port input/wp_pages to Podsvs (used in: conference/links, list/list_pages, list/featured_item)
* DONE: port helper input/event_sessions to Podsv2 (used in: event_programme/sessions, media_item_v0/session)
* check research summaries in Conference frontpages
* check dual-language articles in newspapers (links to second language and back)
* move helpers to theme, load from theme in Pods UI
* test all helpers for any warnings in logs
