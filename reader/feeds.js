/**
 * Feeds management
 */

// Adjust number of unread articles for the given feed
reader.adjustUnreadText = function(feedUrl, adjustment){
  // Retrieve the html content 
  var currentVal = document.getElementById(reader.unreadPrefix + feedUrl).innerHTML;
  // Extract the current int value of unread articles
  var currentIntVal = parseInt(currentVal.replace(/[()]/, '')) + adjustment;
  // Update the html content appropriately
  currentVal = (currentIntVal === 0) ? '' : currentVal.replace(/\d+/, currentIntVal);
  // Rewrite the html on the page
  document.getElementById(reader.unreadPrefix + feedUrl).innerHTML = currentVal;
}

// Update reader model
reader.updateModel = function(model){
  reader.feedAPIModel = model;
} 
 
// Add a new feed
reader.addFeed = function(){
  var newFeedUrl = document.getElementById("newFeedUrl").value;
  var feedUrlAlreadyExists = false;
  
  for(entry in localStorage){
    if(entry.substring(reader.localStorageFeedPrefix.length) === newFeedUrl){
      feedUrlAlreadyExists = true;
    }
  }
  
  if(!feedUrlAlreadyExists){
    // Init Google's Feed object with the feed's URL
    var tempFeed = new google.feeds.Feed(newFeedUrl);
    
    // Once the feed object has been loaded, update localStorage
    tempFeed.load(function(result){
      if(!result.error){
        var feedString = JSON.stringify({title: result.feed.title, read: [[0, new Date(result.feed.entries[result.feed.entries.length - 1].publishedDate).getTime()]]});
        // Add the feed to localStorage
        localStorage[reader.localStorageFeedPrefix + newFeedUrl] = feedString;
      }
      
      // Add feed to feed list
      reader.addFeedToList(newFeedUrl, feedString);
    })
  }
  
}

// Add a feed to feed list
reader.addFeedToList = function(feedUrl, feed){
  feed = JSON.parse(feed);

  // Retrieve the number of unread articles 
  var unread = 0;
  var unreadText = '';
  // Init Google's Feed object with the feed's URL
  var tempFeed = new google.feeds.Feed(feedUrl);

  // Once the feed object has been loaded, update localStorage
  tempFeed.load(function(result){
    // Update the localStorage feed model
    reader.localStorageModel = JSON.parse(localStorage[reader.localStorageFeedPrefix + feedUrl]);

    // Loop over all the entries to retrieve the number of unread articles
    for(var index in result.feed.entries){
      // If the current timestamp is not included in any read intervals, count the article as unread
      if(!reader.isInReadInterval(new Date(result.feed.entries[index].publishedDate).getTime()))
        unread++;
    }

    // If there are unread articles, display the stats next to the feed title
    // otherwise, display nothing
    unreadText = (unread > 0) ? ' (' + unread + ')' : '';

    // Display the feed title
    document.getElementById('feeds').insertAdjacentHTML('beforeEnd', '&bull; <span data-url="' 
                                                + feedUrl 
                                                + '">' 
                                                + feed.title 
                                                + '</span>'
                                                + '<b id='
                                                + reader.unreadPrefix + feedUrl
                                                + '>'
                                                + unreadText
                                                + '</b><br>');
  })

};

/**
 * Reader events
 */

// Add feed when the 'Add Feed' button is clicked
document.getElementById("addFeed").addEventListener("click", reader.addFeed)

/**
 * Load and display the feeds from localStorage
 */


// Show the feed list
for(entry in localStorage){
  if(entry.substring(0, reader.localStorageFeedPrefix.length) === reader.localStorageFeedPrefix){
    reader.addFeedToList(entry.substring(reader.localStorageFeedPrefix.length), localStorage[entry]);
  }
}
