$.get(onenetwork_url+"official_badge/obadgeMonitorTpl",function(i){$("#official_badge_div").html(i)}),$(document).on("change","#officialbadge_module",function(){var i="",o="";i=$(this).val(),o=$("#officialbadge_type").val(),callAJAX(onenetwork_url+"official_badge/obadgeMonitorTpl",{official_badgename:i,officialbadge_type:o},function(i){$("#official_badge_div").html(i)},function(){},function(){}),callAJAX(onenetwork_url+"official_badge/submodules",{official_badgename:i},function(i){$("#officialbadge_type").html(i)},function(){},function(){})}),$(document).on("change","#officialbadge_type",function(){var i=$(this).val(),o=$("#officialbadge_module").val();callAJAX(onenetwork_url+"official_badge/obadgeMonitorTpl",{official_badgename:o,officialbadge_type:i},function(i){$("#official_badge_div").html(i)},function(){},function(){})});