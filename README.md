Mini PHP MVC framework by phpactiverecord
==============================
Project Summary: 

1. Mini PHP MVC framework

       - this follows MVC pattern and URL follows module/controller/action
       - Directory structure : 
- root

  - Config : contain all configurable file like config.php, database.php
  
  - Controllers
        o   Module name
              Controller file

  - appController.php : parent controller where initialize all common variable or method  
  
  -Lib: contain all library file like activerecord lib, ImageWorkshop lib etc 

  -Models
        o   Module name
               Model file
  -Resources
        o   Css
        o   Js
        o   images
   -Uploads : contain all uploaded images or file
   
   -Views
         o   Module name
              Controller name
                 File for every action name
                 
   -Index.php : root page
  
2. php active record  apply
       - For Model, here used PHPActiveRecord - http://www.phpactiverecord.org/ 
       
3. Image process by ImageWorkShop
       - For Image thumb or re-size, here used ImageWorkShop library  -http://phpimageworkshop.com/

Installation: 
 1. update BASE_URL from root/index.php 
 2. Create database named 'active_record' where user is root password blank. then import schema active_record.sql from db folder  
 3. If you want to change database config
 4. and browse accroding your base URl
