Preferably, I'd like to be able to run this report without having to log into Twitter.  
If this is possible, then I'd like a field for the Twitter User ID.  If we need to log in to Twitter to access the API, then we can do an authorize and use the active account.

Next, the web page should have 4 buttons:"Retweets This Month", "Mentions This Month", "Retweets Last Month", 
"Mentions Last Month".  When one of the buttons is pressed, need to go to Twitter, to the specified account, 
and get retweets or mentions, create a table with the following headers:

Date | Time | Twitter User | Reach | Retweet/Mention | Tweet

Note that this page should not time out because there could be very many retweets each month. 

Date: The date of the retweet/mention
Time: The time of the retweet/mention
Twitter User: @xxxxxxxx, the person who retweeted/mentioned
Reach: The number of people who saw the retweet / mention (If we can get the count of people at the time of the 

retweet/mention, that is best, but if not, then get the current follower count)
Retweet/Mention:  This will just be a constant depending on the button pressed, Retweet or Mention. 
Tweet: The full tweet that was retweeted

Also show sum of the total mention reach, retweet reach, count of mentions, and count of the retweets.  
Present these 4 values at the top of the page below the buttons and above the table results.

At the top of the page, add a 5th button that says "Export Results", which creates a csv either for download, 
or just opens the csv using whatever program the person has locally.
