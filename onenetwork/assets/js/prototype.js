function is_Valid_Email(t){var e=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,n=!1;return e.test(t)&&(n=!0),n}function is_AplhabeticSeriesOnly(t){var e=/^[A-Za-z.-]+(\s*[A-Za-z.-]+)*$/i,n=!1;return e.test(t)&&(n=!0),n}function is_Alpha_Neumeric_Dot_Only(t){var e=/^[a-z][a-z0-9\.]*$/i,n=!1;return e.test(t)&&(n=!0),n}function is_Valid_Mobile_Number(t){var e=/^[0-9-+]+$/,n=!1;return e.test(t)&&(n=!0),n}function callAJAX(t,e,n,r,a){$.ajax({type:"POST",url:t,data:e,beforeSend:r,complete:a,success:n,error:function(t,e,n){console.log("error"+e)}})}function globalGet(t,e){$.get(t,e)}function isValidKeywords(t){var e=/^[a-zA-Z0-9\s]+\,[a-zA-Z0-9\s]+$/,n=/^[a-zA-Z0-9]+$/,r=e.test(t)||n.test(t);return r}function isEmpty(t){return 0===t.length?!1:!0}function isValidLength(t,e){return e.length<=t?!1:!0}
