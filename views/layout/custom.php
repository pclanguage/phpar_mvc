<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $page_title; ?></title>


        <link media="all" href="<?php echo BASE_URL; ?>resources/css/style.css" type="text/css" rel="stylesheet"/>
        <link media="all" href="<?php echo BASE_URL; ?>resources/css/creator.css" type="text/css" rel="stylesheet"/> 

    </head>

    <body id="default">
        <section id="page_wrap">
            <!--Start contanier-->
            <section id="contanier">


                <!--Start headerContainer-->
                <div style="z-index: 1000;" id="headerContainer">
                    <div style="z-index: 990;" id="header">
                        <h1 id="logo">  <a href="<?php echo BASE_URL; ?>"> Logo </a> </h1>
                        <!--End of logo-->
                        <!--Start navigation-->
                        <div style="z-index: 950;" id="navigation" class="menu-main-container">
                            <div class="header_menu">
                                <div id="nav">
                                    <ul class="menu">
                                        <li><a href="<?php echo BASE_URL; ?>" class=""> Home</a>  </li>
                                        <li><a href="<?php echo BASE_URL; ?>index.php?book/books" class="">  Book</a> </li>
                                    </ul>
                                    <div class="last"></div>
                                </div>


                            </div>

                        </div>
                        <!--End of navigation-->

                    </div>
                </div>
                <!--End of headerContainer-->


                <!--Start contentContainer-->
                <div style="z-index: 940;" id="contentContainer">
                    <div style="z-index: 930;" id="content">
                        <div style="z-index: 820;" id="main">

                            <div style="padding: 10px; text-align: justify; line-height: 20px;" class="page_content">
                                <h2 class="categorytitle"><?php echo $page_title; ?></h2> 
                                <?php require_once 'views/' . $content . '.php'; ?>
                            </div>
                        </div>
                    </div>
                    <!--Start content-->

                    <div class="clear" style="z-index: 480;"></div>

                </div>

                <div style="z-index: 470;" id="footerContainer">
                    <div style="z-index: 460;" id="footer">

                        <div style="z-index: 390;" class="clear"></div>

                    </div>
                    <div style="z-index: 380;" id="bottomBarContainer">
                        <div style="z-index: 370;" id="bottomBar">
                            <div style="z-index: 360;" id="socialbuttons">
                                <div style="z-index: 360;  " id="socialbuttons">
                                    <a href="<?php echo BASE_URL; ?>"> Home</a> |


                                </div>
                            </div>

                            <div style="z-index: 350;" id="copyright">
                                @ 2013  

                            </div>
                        </div>
                    </div>              
                </div>
                <!--End of footerContainer-->




            </section>
        </section>

    </body>
</html>
