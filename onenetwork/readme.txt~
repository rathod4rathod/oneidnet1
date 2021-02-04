Changes in database
====================
1)change the category field values in tunnel_all_channels as per the below list:
Infotainment
General
Music
Business
Movies
Sports
Fashion
News
In style.css file, .btn-subscribe class changes and .channelitem-in changes

Query for mid term(my network): select * from tunnel_all_channels channels inner join iws_friends_list friends on channels.created_by=friends.friend_id where friends.iws_profile_id=1;

Query to get friend of friends:
 (select friend_id from iws_friends_list where iws_profile_id = 1) union ( select distinct ff.friend_id from iws_friends_list f join iws_friends_list ff on ff.iws_profile_id = f.friend_id where f.iws_profile_id = 1 );
In order to display the channels in the station suggestions panel: get the friend of friends list and write the query to get the channels with friends list.