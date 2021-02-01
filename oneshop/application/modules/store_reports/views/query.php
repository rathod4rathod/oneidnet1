recieve chart
SELECT MONTH(oso.order_date) MONTH,COUNT(*) COUNT,YEAR(oso.order_date) YEAR
  FROM os_cancellation osc  left join os_orders oso  on oso.order_aid=osc.order_id
  WHERE oso.order_date BETWEEN CURDATE() - INTERVAL 12 MONTH AND CURDATE() and oso.store_id_fk=8
  GROUP BY MONTH(order_date)





cancle chart
SELECT MONTH(oso.order_date) MONTH,COUNT(*) COUNT,YEAR(oso.order_date) YEAR
  FROM os_cancellation osc  left join os_orders oso  on oso.order_aid=osc.order_id
  WHERE oso.order_date BETWEEN CURDATE() - INTERVAL 12 MONTH AND CURDATE() and oso.store_id_fk=8
  GROUP BY MONTH(oso.order_date)
  
  
  
  

select distinct(op.Category),oc.name from os_products op left join os_category oc on op.Category=oc.category_aid  where store_id=8 



   category wise sale
    
    SELECT MONTH(oss.date) MONTH,COUNT(*) COUNT,YEAR(oss.date) YEAR
  FROM os_sales oss left join os_products osp on oss.product_id_fk=osp.product_aid
  WHERE oss.date BETWEEN CURDATE() - INTERVAL 12 MONTH AND CURDATE() and osp.Category=24 and osp.store_id=8
  GROUP BY MONTH(date)
  
  
  select product_aid,name from os_products where store_id=8
  
  
   SELECT MONTH(oss.date) MONTH,COUNT(*) COUNT,YEAR(oss.date) YEAR
    FROM os_sales oss left join os_products osp on oss.product_id_fk=osp.product_aid
    WHERE oss.date BETWEEN CURDATE() - INTERVAL 12 MONTH AND CURDATE() and osp.product_aid=134 and osp.store_id=8 GROUP BY MONTH(date)
  
    
  // 10-06-2015 by venkatesh
  SELECT store_id_fk,COUNT(*) order_COUNT  FROM os_orders where store_id_fk=8  GROUP BY store_id_fk 
  union
  SELECT store_id_fk,COUNT(*) sale_COUNT  FROM os_sales where store_id_fk=8  GROUP BY store_id_fk 
  
  
  select storage as total_space,used_space from os_all_store where store_aid=8
  
  
  
  SELECT order_manager_emails,store_manager_emails FROM `os_store_settings` WHERE store_id_fk=8
  
  
  update  `os_store_settings` set order_manager_emails="5,4",store_manager_emails="6,3" where store_id_fk=8
  
  
  
SELECT MONTH(order_date) MONTH,COUNT(*) COUNT,YEAR(order_date) YEAR
  FROM os_orders
  WHERE order_date BETWEEN '20013-02-01' AND '2016-08-30' and store_id_fk=8
  GROUP BY MONTH(order_date)

SELECT * FROM os_orders  WHERE MONTH(order_date)=MONTH(CURRENT_DATE()) and store_id_fk=8