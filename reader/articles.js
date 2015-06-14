/**
 * Articles display
 */

// Mark the article corresponding to the given timestamp as read in the current feed
reader.markAsRead = function(timestamp){
  // Prepare the arrays that we will write to localStorage
  reader.timestampToFormat = timestamp;
  if(reader.formatReadArray()){
    // Decrease the number of unread article if a new timestamp was marked as read
    reader.adjustUnreadText(reader.feedAPIModel.feed.feedUrl, -1);
  }
  // Update localStorage
  localStorage[reader.localStorageFeedPrefix + reader.feedAPIModel.feed.feedUrl] = JSON.stringify(reader.localStorageModel);
  reader.timestampToFormat = [];
}

// Check whether a timestamp represents a read article in the current feed 
reader.isInReadInterval = function(timestamp){
  for(var interval in reader.localStorageModel.read){
    if(timestamp <= reader.localStorageModel.read[interval][1] && timestamp >= reader.localStorageModel.read[interval][0]){
      return interval;
    }
  }
  return false;
}

// Rearranges the 'read' array with new timestamps so that it is always well formed
// Returns true if the 
reader.formatReadArray = function(){
  var currentTimestamp = 0;
  var previousTimestamp = 0;
  var nextTimestamp = 0;
  var currentInterval = false;
  var previousInterval = false;
  var nextInterval = false;
  var entryNum = 0;
  
  // Loop over feed entries
  for(var entry in reader.feedAPIModel.feed.entries){
    // Initialize interval variables
    currentInterval = false;
    previousInterval = false;
    nextInterval = false;
    
    // Convert the index to int
    entryNum = parseInt(entry, 10);
    
    // Retrieve the current entry's timestamp
    currentTimestamp = new Date(reader.feedAPIModel.feed.entries[entry].publishedDate).getTime();

    // If the current timestamp is in the timestampsToFormat array
    if(reader.timestampToFormat == currentTimestamp){
    
      // Check whether the current timestamp is included in any read intervals
      currentInterval = reader.isInReadInterval(currentTimestamp);
      
      // If it's not included in any of the read intervals
      if(currentInterval === false){
        // Retrieve, if possible, the previous entry's timestamp (more recent one)
        if(reader.feedAPIModel.feed.entries[entryNum - 1]){
          previousTimestamp = new Date(reader.feedAPIModel.feed.entries[entryNum - 1].publishedDate).getTime();
          previousInterval = reader.isInReadInterval(previousTimestamp);
        }
        
        // Retrieve, if possible, the next entry's timestamp (older one)
        if(reader.feedAPIModel.feed.entries[entryNum + 1]){
          nextTimestamp = new Date(reader.feedAPIModel.feed.entries[entryNum + 1].publishedDate).getTime();
          nextInterval = reader.isInReadInterval(nextTimestamp);
        }
        
        // No neighbor is in an interval: new singleton interval
        if(previousInterval === false && nextInterval === false){
          reader.localStorageModel.read.push([currentTimestamp, currentTimestamp]);
        }
        // Both neighbors are in invervals: HOLY MERGE
        else if(previousInterval !== false && nextInterval !== false){
            reader.localStorageModel.read[nextInterval][1] = reader.localStorageModel.read[previousInterval][1];
            reader.localStorageModel.read.splice(previousInterval, 1);
        }
        // Next neighbor is in an interval, the previous one is not: expand the first interval to the new timestamp
        else if(nextInterval !== false){
          if(reader.localStorageModel.read[nextInterval][0] > currentTimestamp){
            reader.localStorageModel.read[nextInterval][0] = currentTimestamp;
          }
          else{
            reader.localStorageModel.read[nextInterval][1] = currentTimestamp;
          }
        }
        // Previous neighbor is in an interval, the next one is not: expand the first interval to the new timestamp
        else{
          if(reader.localStorageModel.read[previousInterval][0] > currentTimestamp){
            reader.localStorageModel.read[previousInterval][0] = currentTimestamp; 
          }
          else{
            reader.localStorageModel.read[previousInterval][1] = currentTimestamp; 
          }
        }
        return true;
      }
    }
  }
  return false;
}
 
// Display articles from a feed 
reader.displayArticles = function(){
  if(!reader.feedAPIModel.error){
    
    // Clear its content 
    reader.articles.innerHTML = "";
    
    // Display the feed's title as a link
    reader.articles.insertAdjacentHTML('beforeEnd', "<h1><a href='" 
                        + reader.feedAPIModel.feed.link 
                        + "' target='_blank'>" 
                        + reader.feedAPIModel.feed.title 
                        + "</a></h1><br>");
                        
    // Loop over feed items
    reader.feedAPIModel.feed.entries = reader.feedAPIModel.feed.entries; // Leave the choice to the user
    for(var i = 0; i < reader.feedAPIModel.feed.entries.length; i++){
      var entry = reader.feedAPIModel.feed.entries[i];
      // Retrieve item data...
      title = entry.title;
      link = entry.link;
      content = entry.content;
      publishedDate = new Date(entry.publishedDate);
      
      if(reader.isInReadInterval(publishedDate.getTime()) === false){
        // ...and display them!
        reader.articles.insertAdjacentHTML('beforeEnd', "<div class='article' data-date='" 
                            + publishedDate.getTime() 
                            + "' data-url='" 
                            + reader.feedAPIModel.feed.feedUrl
                            + "'><h2><a href='" 
                            + link 
                            + "' target='_blank'>" 
                            + title
                            + "</a></h2>"
                            + publishedDate.toLocaleDateString() 
                            + " @ " 
                            + publishedDate.toLocaleTimeString()  
                            + "<br>"
                            + "<br>"
                            + content
                            + "</div>");
      }
    }
  }
}

// Show a feed
reader.showFeed = function(url){
  // Update the localStorage feed model
  reader.localStorageModel = JSON.parse(localStorage[reader.localStorageFeedPrefix + url]);
  
  if(url !== 'all'){
    // Init Google's Feed object with the feed's URL
    var feed = new google.feeds.Feed(url);
    
    // Once the feed object has been loaded, incrementally show the articles
    // Show the first x articles and load the others while doing so
    feed.setNumEntries(100);
    
    // The result is implicitly passed to the callback function
    feed.load(function(result){
      reader.updateModel(result);
      reader.displayArticles(); 

      // Initialize the scroll
      reader.articles.scrollTop = 0;
    });
    // Load the next 100 articles
    // feed.includeHistoricalEntries();
    // feed.setNumEntries(100);
    
    // feed.load(function(result){
      // reader.updateModel(result);
      // for(var index in result.feed.entries){
        // console.log(new Date(result.feed.entries[index].publishedDate).getTime());
      // }
    // });
    
  }
  else{
    // reader.showAllFeeds();
    for(feed in localStorage){
      if(feed.substring(0, reader.localStorageFeedPrefix.length) === reader.localStorageFeedPrefix){
        
      }
    }
  }
}


/**
 * Reader events
 */

reader.articles.addEventListener("scroll", function(e){
  var articles = this.getElementsByClassName("article");
  var tempTimestampsToFormat = [];
  
  // Loop over every feed entry
  for(var index in articles){
    if(!isNaN(index)){
      // reader.scrollOffset + 1 is useful in the case where the user
      // clicks on an article to mark it as read. This prevents the 
      // reader from marking the articles before this one as read.
      if(articles[index].offsetTop - reader.articles.scrollTop < reader.scrollOffset + 1){
        // Push the timestamp into the temporary timestamp array 
        if(tempTimestampsToFormat.indexOf(articles[index].getAttribute('data-date')) === -1){
          tempTimestampsToFormat.push(articles[index].getAttribute('data-date'));
        }
      }
    }
  }
  // Mark the last article coming into the viewpoint as read
  reader.markAsRead(tempTimestampsToFormat[tempTimestampsToFormat.length - 1] || 0);
});

// Show feed when a link is clicked in the feed list
reader.feeds.addEventListener("click", function(e){
  if(e.target && e.target.nodeName == "SPAN"){
    reader.showFeed(e.target.getAttribute("data-url"));
  }
  e.preventDefault();
});

// When the user clicks on an article, we bring it to the top and mark it as read
reader.articles.addEventListener("click", function(e){
  if(e.target && e.target.id !== 'articles' && e.target.nodeName !== 'A'){
    // Climb up the ladder until we get to the article container
    // Temp var to hold e.target's value and be modified
    var temp = e.target;
    while(temp.className != 'article'){
      temp = temp.parentNode;
    }
    // Scroll
    reader.articles.scrollTop = temp.offsetTop - reader.scrollOffset;
  }
}, false);

