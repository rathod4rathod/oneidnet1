var all_notifications=[];
var notify_status="latest";
$(document).ready(function(){
    pushNotifications();
});
function pushNotifications(){
$.ajax({
        url:oneidnet_url+"notifications/pushNotifies",
        type:"post",
        success:function(data){      
            //alert(data);
            var obj=JSON.parse(data);            
            for(var key in obj){
                if(key==="store_followers"){
                    var new_arry=[obj[key],"https://oneshop.oneidnet.com","The followers count of your store(s)"];
                    all_notifications["store_data"]=new_arry;
                }
                if(key==="co_followers"){
                    var new_arry=[obj[key],"https://coffice.oneidnet.com","The followers count of your company profile"];
                    all_notifications["co_data"]=new_arry;
                }
                if(key==="np_profile_view"){
                    var new_arry=[obj[key],"https://netpro.oneidnet.com","The count of your netpro profile"];
                    all_notifications["np_data"]=new_arry;
                }
                if(key==="cv_views_cnt"){
                    var new_arry=[obj[key],"https://netpro.oneidnet.com","The view count of your cv"];
                    all_notifications["cv_data"]=new_arry;
                }
                if(key==="store_reviews_cnt"){
                    var new_arry=[obj[key],"https://oneshop.oneidnet.com","The review count of your store(s)"];
                    all_notifications["stores_reviews_data"]=new_arry;
                }
                if(key==="product_reviews_cnt"){
                    var new_arry=[obj[key],"https://oneshop.oneidnet.com","The review count of your products"];
                    all_notifications["products_reviews_data"]=new_arry;
                }
                if(key==="frnds_request_cnt"){
                    var new_arry=[obj[key],"https://www.oneidnet.com","The friends requests count"];
                    all_notifications["frnds_requests_data"]=new_arry;
                }
                if(key==="notifications_cnt"){
                    var new_arry=[obj[key],"https://www.oneidnet.com","The notifications count"];
                    all_notifications["notifications_data"]=new_arry;
                }
                if(key==="msgs_cnt"){
                    var new_arry=[obj[key],"https://www.oneidnet.com","The messages count"];
                    all_notifications["messages_data"]=new_arry;
                }
                //all_notifications=new_arry;
            }
            //all_notifications=obj;
            //var new_arry=[data+" Store followers","https://oneshop.oneidnet.com","The followers count for your store"];
            //all_notifications.push(new_arry);
        }
    });
}
document.addEventListener('DOMContentLoaded', function ()
{
    if(Notification.permission !== "granted")
    {
        Notification.requestPermission();
    }    
});
document.addEventListener('DOMContentLoaded', function ()
{
	//setTimeout(pushNotifications(),35000);
    setTimeout(function(){        
        var url =oneidnet_url;
        var fcnt=parseInt(all_notifications["frnds_requests_data"][0]);
        if(fcnt!==0){
            var title="People waiting to connect with you";
			var desc ="You have total "+fcnt+" friends waiting to connect with you!";
            allNotifications(title,desc,url);		        
        }        
    }, 30000);
	setTimeout(function(){        
        var url =oneidnet_url;        
        var ncnt=parseInt(all_notifications["notifications_data"][0]);
        if(ncnt!==0){
			var desc ="You have received "+ncnt+" new notifications";
            allNotifications("System has new notifications waiting for you",desc,url);		        
        }        
    }, 40000);
    setTimeout(function(){              
        var desc ="Someone sent message(s) to you!";
        var url ="https://www.oneidnet.com";
        var cnt=parseInt(all_notifications["messages_data"][0]);
        if(cnt!==0){
            var title="You have received "+cnt+" messages";
            allNotifications(title,desc,url);		        
        }
    }, 50000);
    setTimeout(function(){
        var x = Math.floor((Math.random() * 4) + 1); // Random number between 1 to 10 
        //var title =all_notifications[0][0];
        //var desc =all_notifications[0][2];
        //var url =all_notifications[0][1];
        var cnt =parseInt(all_notifications["store_data"][0]);        
        if(cnt!==0){
			var desc ="Your store(s) has got total "+cnt+" new followers";
        	var url =all_notifications["store_data"][1];
            var title="People are liking your store:";
            allNotifications(title,desc,url);		        
        }
    }, 60000); //calls every 1 minutes    
    setTimeout(function(){
        //var x = Math.floor((Math.random() * 4) + 1); // Random number between 1 to 10         
        var cnt =parseInt(all_notifications["co_data"][0]);
        var desc =all_notifications["co_data"][2];
        var url =all_notifications["co_data"][1]; 
        //alert(cnt);
        if(cnt!==0){
            var title=cnt+" Company followers";
            allNotifications(title,desc,url);
        }        
    }, 70000); //calls every 1 minutes
    setTimeout(function(){
        //var x = Math.floor((Math.random() * 4) + 1); // Random number between 1 to 10         
        var cnt =parseInt(all_notifications["np_data"][0]);        
        //alert(cnt);
        if(cnt!==0){
			var desc ="Your Netpro profile got "+all_notifications["np_data"][2]+" new views!";
		    var url =all_notifications["np_data"][1];
            allNotifications("People seems interested in your profile",desc,url);
        }        
    }, 80000); //calls every 1 minutes
    setTimeout(function(){        
        var cnt =parseInt(all_notifications["cv_data"][0]);
        var desc =all_notifications["cv_data"][2];
        var url =all_notifications["cv_data"][1];
        //alert(cnt);
        if(cnt!==0){
            var title=cnt+" CV profile views";
            allNotifications(title,desc,url);
        }        
    }, 90000); //calls every 1 minutes
    setTimeout(function(){        
        var cnt =parseInt(all_notifications["stores_reviews_data"][0]);
        var url =all_notifications["stores_reviews_data"][1];
        //alert(cnt);
        if(cnt!==0){
            var title="Someone rated your store";
			var desc="Your store(s) in Oneshop got "+cnt+" new reviews!";
            allNotifications(title,desc,url);
        }        
    }, 100000); //calls every 1 minutes
    setTimeout(function(){        
        var cnt =parseInt(all_notifications["products_reviews_data"][0]);
        var url =all_notifications["products_reviews_data"][1];
        //alert(cnt);
        if(cnt!==0){
            var desc="Your product(s) in Oneshop got "+cnt+" new reviews!";
            allNotifications("People shared review about your product",desc,url);
        }        
    }, 110000); //calls every 1 minutes
    
});
function allNotifications(title,desc,url)
{

    if (Notification.permission !== "granted")
    {
        Notification.requestPermission();
    }
    else
    {
        var notification = new Notification(title, {
            icon:'https://www.oneidnet.com/assets/Images/oneidnetlogo.png',
            body: desc
        });

        /* Remove the notification from Notification Center when clicked.*/
        notification.onclick = function () {
            window.open(url);
        };

        /* Callback function when the notification is closed. */
        notification.onclose = function () {
            console.log('Notification closed');
        };

    }
}
