// Global reader object
var reader = {};
 
/**
 * Reader globals
 */

// Make links on the sidebar clickable
reader.feeds = document.getElementById("feeds");

// Key in localStorage
reader.localStorageFeedPrefix = 'reader_';

// Prefix for number of unread articles
reader.unreadPrefix = 'unread_';

// Retrieve the articles
reader.articles = document.getElementById("articles");

// Feed API model
reader.feedAPIModel = 0;

// localStorage feed model for the current feed
reader.localStorageModel = 0;

// Timestamps of read articles that we have to integrate into the read intervals
reader.timestampToFormat = 0;  

// Offset to take into account when the user clicks on an article
reader.scrollOffset = 20;
