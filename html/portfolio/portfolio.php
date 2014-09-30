﻿<!doctype html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--[if ie]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
    
	<title>Portfolio | Synergy - Responsive and Interactive HTML Portfolio </title>
    
	<meta name="description" content="" />
	<meta name="author" content="MEDIACREED.COM" />
        
        <link rel="stylesheet" href="css/style.css" />
        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|PT+Sans+Caption:400,700' rel='stylesheet' type='text/css' />        
        
        <!-- SCRIPT IE FIXES -->  
        <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]--> 
        <!-- END SCRIPT IE FIXES-->
      
      
        <!-- START TEMPLATE JavaScript load -->
    	<script type="text/javascript" src="js/libs/jquery-1.7.2.min.js"></script>    
        <script type="text/javascript" src="js/libs/modernizr.custom.min.js"></script> 
        <script type="text/javascript" src="js/libs/jquery.wipetouch.js"></script>   
             
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBttxrYoBq8srteD7evmDqnaK6V2Uun42o&amp;sensor=true"></script>
        
        <script type="text/javascript" src="js/libs/jquery.gmap.min.js"></script>
        <script type="text/javascript" src="js/greensock/minified/TweenMax.min.js"></script>    
        <script type="text/javascript" src="js/libs/jquery.timer.js"></script>
        <script type="text/javascript" src="js/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/libs/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="js/mediacreed/scrollbar/mc.custom.list.js"></script>
        <script type="text/javascript" src="js/mc.modules.animation.js"></script> 
        <link rel="stylesheet" href="js/video-js/video-js.min.css" media="screen" />
        <script type="text/javascript" src="js/video-js/video.min.js"></script>
        <!-- END TEMPLATE JavaScript load -->

         <?php

//include 'config.php';
require '/Users/karan.kumar/Sites/aws-php-sample/vendor/autoload.php';
use Aws\S3\S3Client;
$bucket="loadcachetest";
function getMovies($bucket,$bucketLocation)
{
    
// Instantiate the S3 client with your AWS credentials and desired AWS region
    $videoList=array();
$client = S3Client::factory(array(
    'key'    => 'AKIAIAECWXFL7BRCKRJQ',
    'secret' => 'nFVvv1nEcQvCVPQDgkoxJCA68Iy34mbeH2VxDRmE',
));

/*try {
    $result = $client->listBuckets();
    foreach ($result['Buckets'] as $bucket) {
      echo "- {$bucket['Name']}\n";
    }
} catch (Aws\S3\Exception\S3Exception $e) {
    echo "Request failed.\n";
}
echo "\n";
*/

$iterator = $client->getIterator('ListObjects', array('Bucket' => $bucket));


foreach ($iterator as $object) {
  //  echo $object['Key'] . "\n";
    $key=$object['Key'];
    $pos = strpos($key, ".mp4");
    if ($pos !== false) 
        {   
            $temp_link = $client->getObjectUrl($bucket, $key, null);
            $arr = array('video' => $temp_link, 'image' => str_replace('.mp4', '.jpg', $temp_link));
            array_push($videoList,$arr);
        }
}
return $videoList;
}
$GLOBALS['movies']=getMovies($bucket,$bucketLocation);        
?>
        
        <!--<script src="http://vjs.zencdn.net/c/video.js"></script>    
        Careful when using the online version because the destroy method throws an error.    
        Our version has the fix on destroy method. Until it updates we recommend using the JS file from the template.    
        -->
        <script>
            _V_.options.flash.swf = "js/video-js/video-js.swf";
            _V_.options.techOrder = ["html5", "flash", "links"];
            var params = {};
            params.bgcolor = "#000000";
            params.allowFullScreen = "true";       
            _V_.options.flash.params = params;
    
        </script>    
</head>

<body>

<div class="main-template-loader"></div>

<div id="template-wrapper">
    <div id="menu-container"><!-- start #menu-container -->        
        <div class="menu-content-holder"><!-- start .menu-content-holder -->
            <div class="menu-background"></div>
            <div id="template-logo" class="template-logo" data-href="#portfolio.php"></div> 
            <div id="template-menu" class="template-menu" data-current-module-type="full_width_gallery" data-side="none" data-href="#full_width_gallery.html"><!-- start #template-menu -->
                <div class="menu-option-holder">
                    <div class="menu-option-background"> </div>
                    <div class="menu-option-text">
                        <a href="#">HOME</a>
                        <div class="menu-option-sign">+</div>
                    </div>                
                    <div class="sub-menu-holder">
                        <div class="sub-menu-option-holder" data-module-type="slideshow" data-side="none">
                            <div class="sub-menu-option-background"></div>
                            <div class="sub-menu-option-text"><a href="#home_layout_1.html" data-path-href="html/home/">Home Layout 1</a></div>
                        </div>
                        <div class="sub-menu-option-holder" data-module-type="home2" data-side="none">
                            <div class="sub-menu-option-background"></div>
                            <div class="sub-menu-option-text"><a href="#home_layout_2.html" data-path-href="html/home/">Home Layout 2</a></div>
                        </div>
                        <div class="sub-menu-option-holder" data-module-type="home3" data-side="none">
                            <div class="sub-menu-option-background"> </div>
                            <div class="sub-menu-option-text"><a href="#home_layout_3.html" data-path-href="html/home/">Home Layout 3</a></div>
                        </div>
                        
                    </div>         
                </div>
                <div class="menu-option-holder">
                    <div class="menu-option-background"> </div>
                    <div  class="menu-option-text">
                        <a href="#">ABOUT US</a>
                        <div class="menu-option-sign">+</div>
                    </div>
                    <div class="sub-menu-holder">
                        <div class="sub-menu-option-holder" data-module-type="text_page" data-side="height">
                            <div class="sub-menu-option-background"></div>
                            <div class="sub-menu-option-text"><a href="#about_us.html" data-path-href="html/about_us/">About us</a></div>
                        </div>
                        <div class="sub-menu-option-holder" data-module-type="text_page" data-side="none">
                            <div class="sub-menu-option-background"></div>
                            <div class="sub-menu-option-text"><a href="#philosophy.html" data-path-href="html/about_us/">Philosophy</a></div>
                        </div>
                        <div class="sub-menu-option-holder" data-module-type="text_page" data-side="height">
                            <div class="sub-menu-option-background"> </div>
                            <div class="sub-menu-option-text"><a href="#ethics.html" data-path-href="html/about_us/">Ethics</a></div>
                        </div>
                        <div class="sub-menu-option-holder" data-module-type="text_page" data-side="none">
                            <div class="sub-menu-option-background"> </div>
                            <div class="sub-menu-option-text"><a href="#careers.html" data-path-href="html/about_us/">Careers</a></div>
                        </div>                        
                    </div>
                </div>
                <div class="menu-option-holder" data-module-type="news" data-side="height">
                    <div class="menu-option-background"> </div>
                    <div  class="menu-option-text"><a href="#news.html" data-path-href="html/news/">NEWS</a></div>
                </div>  
                <div class="menu-option-holder" data-module-type="full_width_gallery" data-side="none">
                    <div class="menu-option-background"> </div>
                    <div  class="menu-option-text"><a href="#portfolio.php" data-path-href="html/portfolio/">PORTFOLIO</a></div>
                </div> 
                <div class="menu-option-holder">
                    <div class="menu-option-background"> </div>
                    <div  class="menu-option-text"><a href="#">OUR PROJECTS</a><div class="menu-option-sign">+</div></div>
                    <div class="sub-menu-holder">
                        <div class="sub-menu-option-holder" data-module-type="page_columns" data-side="custom">
                            <div class="sub-menu-option-background"> </div>
                            <div class="sub-menu-option-text"><a href="#4_columns_projects.html" data-path-href="html/our_projects/">4 Columns Projects</a></div>
                        </div>
                        <div class="sub-menu-option-holder" data-module-type="page_columns" data-side="custom">
                            <div class="sub-menu-option-background"> </div>
                            <div class="sub-menu-option-text"><a href="#3_columns_projects.html" data-path-href="html/our_projects/">3 Columns Projects</a></div>
                        </div>
                        <div class="sub-menu-option-holder" data-module-type="page_columns" data-side="custom">
                            <div class="sub-menu-option-background"> </div>
                            <div class="sub-menu-option-text"><a href="#2_columns_projects.html" data-path-href="html/our_projects/">2 Columns Projects</a></div>
                        </div>
                    </div>
                </div>               
                <div class="menu-option-holder" data-module-type="showreel" data-side="none">
                    <div class="menu-option-background"> </div>
                    <div  class="menu-option-text"><a href="#showreel.html" data-path-href="html/showreel/">SHOWREEL</a></div>
                </div>                               
                <div class="menu-option-holder">
                    <div class="menu-option-background"> </div>
                    <div  class="menu-option-text"><a href="#">GALLERIES</a><div class="menu-option-sign">+</div></div>
                    <div class="sub-menu-holder">
                        <div class="sub-menu-option-holder" data-module-type="gallery" data-side="none">
                            <div class="sub-menu-option-background"></div>
                            <div class="sub-menu-option-text"><a href="#image_gallery.html" data-path-href="html/galleries/">Image Gallery</a></div>
                        </div>
                        <div class="sub-menu-option-holder" data-module-type="gallery" data-side="none">
                            <div class="sub-menu-option-background"> </div>
                            <div class="sub-menu-option-text"><a href="#mixed_gallery.html" data-path-href="html/galleries/">Mixed Gallery</a></div>
                        </div>                        
                    </div>
                </div>                
                <div class="menu-option-holder">
                    <div class="menu-option-background"> </div>
                    <div  class="menu-option-text"><a href="#">FEATURES</a><div class="menu-option-sign">+</div></div>
                    <div class="sub-menu-holder">
                        <div class="sub-menu-option-holder" data-module-type="full_width" data-side="custom">
                            <div class="sub-menu-option-background"></div>
                            <div class="sub-menu-option-text"><a href="#full_width_text_and_image.html" data-path-href="html/features/">Fullwidth Text + Image</a></div>
                        </div>
                        <div class="sub-menu-option-holder" data-module-type="full_width" data-side="custom">
                            <div class="sub-menu-option-background"></div>
                            <div class="sub-menu-option-text"><a href="#full_width_text_and_video.html" data-path-href="html/features/">Fullwidth Text + Video</a></div>
                        </div>
                        <div class="sub-menu-option-holder" data-module-type="fullscreen_video" data-side="none">
                            <div class="sub-menu-option-background"></div>
                            <div class="sub-menu-option-text"><a href="#fullscreen_video.html" data-path-href="html/features/">Fullscreen Video</a></div>
                        </div>
                        <div class="sub-menu-option-holder" data-module-type="pricing_tables" data-side="none">
                            <div class="sub-menu-option-background"> </div>
                            <div class="sub-menu-option-text"><a href="#pricing_tables.html" data-path-href="html/features/">Pricing Table</a></div>
                        </div>
                    </div>
                </div>
                <div class="menu-option-holder" data-module-type="contact" data-side="custom">
                    <div class="menu-option-background"> </div>
                    <div  class="menu-option-text"><a href="#contact.html" data-path-href="html/contact/">CONTACT US</a></div>
                </div>            
            </div><!-- end #template-menu -->  
            <div id="template-smpartphone-menu">
                <select>
                    <option value="#">Navigate to...</option>
                    <option value="#"> HOME +</option>
                        <option value="#home_layout_1.html">  - Home Layout 1</option>
                        <option value="#home_layout_2.html">  - Home Layout 2</option>
                        <option value="#home_layout_3.html">  - Home Layout 3</option>
                    <option value="#"> ABOUT US +</option>
                        <option value="#about_us.html">  - About us</option>
                        <option value="#philosophy.html">  - Philosophy</option>
                        <option value="#ethics.html">  - Ethics</option>
                        <option value="#careers.html">  - Careers</option>
                    <option value="#news.html"> NEWS</option>
                    <option value="#portfolio.php"> PORTFOLIO</option>
                    <option value="#"> OUR PROJECTS +</option>
                        <option value="#4_columns_projects.html">  - 4 Columns Projects</option>
                        <option value="#3_columns_projects.html">  - 3 Columns Projects</option>
                        <option value="#2_columns_projects.html">  - 2 Columns Projects</option>
                    <option value="#showreel.html"> SHOWREEL</option>    
                    <option value="#"> GALLERIES +</option>
                        <option value="#image_gallery.html">  - Image Gallery</option>
                        <option value="#mixed_gallery.html">  - Mixed Gallery</option>
                    <option value="#"> FEATURES +</option>
                        <option value="#full_width_text_and_image.html">  - Full Width Text + Image</option>
                        <option value="#full_width_text_and_video.html">  - Full Width Text + Video</option>
                        <option value="#fullscreen_video.html">  - Fullscreen Video</option>
                        <option value="#pricing_tables.html">  - Pricing Table</option>  
                    <option value="#contact.html"> CONTACT</option>
                </select>
            </div>
            <footer>    
                <div id="footer-social">            
                    <div id="footer-social-holder">
                        <ul>
                            <li class="twitter"><a href="http://www.twitter.com" target="_blank"></a></li>
                            <li class="facebook"><a href="http://www.facebook.com" target="_blank"></a></li>
                            <li class="google"><a href="http://www.google.com" target="_blank"></a></li>
                            <li class="dribbble"><a href="http://www.dribbble.com" target="_blank"></a></li>
                            <li class="flickr"><a href="http://www.flickr.com" target="_blank"></a></li>
                        </ul>
                    </div>                   
                </div>    
                <div id="footer-text"><!-- start #footer-text -->
                    <div id="footer-copyright"><a href="#">&copy;2012 YOUR-COMPANY.COM</a></div>           
                </div><!-- end #footer -->    
            </footer> 
        </div><!-- end .menu-content-holder-->
        
        <div id="menu-hider">
            <div id="menu-hider-background"></div>
            <div id="menu-hider-icon"></div>
        </div>
    </div><!-- end #menu-container -->
    
    <div id="module-container"><!-- start #module-container -->
        <div id="module-background-holder">   
            <div id="module-background-solid1" class="opacity_0"></div>     
        </div>
        <div id="module-container-holder" class="module-position-lc"  data-id="module-position-lc">
            <div id="module-full-width-gallery"  class="module-full-width-gallery " > <!-- .shadow-side-all-->
                <div id="module-full-width-holder">
                       <?php
                    foreach($GLOBALS['movies'] as $movie_info)
        {
             echo'<div class="full-width-item"><img src='.array_values($movie_info)[1].' class="opacity_0" onload="animateThumb(this)" alt=""/>
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Giuseppe</p></div>
                        </div>               
                    </div>';
                };
          
        ?>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb-video3.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="play-gallery"></div>
                            <div class="item-title"><p>Beat</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb2.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Baseball Illustration</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb-video6.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="play-gallery"></div>
                            <div class="item-title"><p>Frames</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb3.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Caricature Dr. House</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb-video1.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="play-gallery"></div>
                            <div class="item-title"><p>The Node</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb4.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Carousel Bike</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb5.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Late Days Of A Legend</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb6.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Planet Of The Apes</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb-video4.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="play-gallery"></div>
                            <div class="item-title"><p>Cee-Ee</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb7.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Shopping Spree</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb-video5.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="play-gallery"></div>
                            <div class="item-title"><p>Proteigon</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb8.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Oh My Gosh</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb9.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Media Overdose</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb10.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Qubsik Project</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb11.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Modern House</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb12.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Red Passion</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb-video2.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="play-gallery"></div>
                            <div class="item-title"><p>Opening Sequence | BUNRAKU</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb13.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Sleep Deprivation</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb14.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Streetbot</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb15.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Missed Relic</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb16.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Nothing To Lose</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb17.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Violen</p></div>
                        </div>                   
                    </div>
                    <div class="full-width-item">
                    	<img src="assets/media/portfolio/thumbs/thumb18.jpg" class="opacity_0" onload="animateThumb(this)" alt=""  />
                        <div id="thumb-image-hover" class="hover-default">
                            <div class="background opacity_6"></div>
                            <div class="zoom-gallery"></div>
                            <div class="item-title"><p>Sunset Background</p></div>
                        </div>                   
                    </div>
                </div>             
            </div>
            
        </div>
        <div id="module-scrollbar-holder_v2">
            <div id="module-scrollbar-background" class="opacity_8"></div>
            <div id="module-scrollbar-dragger"></div>
        </div>	
        
        <div id="full-width-preview"><!-- start .full-width-preview" -->
            <div class="full-width-preview-background opacity_9_7"></div>
            <div id="full-width-preview-media-holder">
                <div class="full-width-preview-media-holder-background opacity_0"></div>
                <div class="full-width-preview-media-loader"></div>
                <div id="preview-media-holder">   
                	<!--<div id="link" data-url="http://www.google.com" data-target="_blank"></div>-->
                 <?php


        foreach($GLOBALS['movies'] as $movie_info)
        {
            echo "<!-- here-->";
            echo
                    '<div id="preview-media-image" data-url='.array_values($movie_info)[1].' data-title="Custom Title 1" data-alt="Custom Alt 1"></div>
                   <div id="video-wrapper" data-video-type="standalone" data-width="640" data-height="390"
                          data-url1='.array_values($movie_info)[0].'  data-type1="video/mp4">
                    </div>';
        };
          ?>
            <div id="preview-media-image" data-url="assets/media/portfolio/images/image2.jpg" data-title="Custom Title 2" data-alt="Custom Alt 2"></div>                    
                    <div id="video-wrapper" data-video-type="vimeo" data-width="640" data-height="390"
                          data-url="http://player.vimeo.com/video/32487239?portrait=0&color=ffffff">
                    </div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image3.jpg" data-title="Custom Title 3" data-alt="Custom Alt 3"></div>
                    <div id="video-wrapper" data-video-type="vimeo" data-width="640" data-height="390"
                          data-url="http://player.vimeo.com/video/23106251?portrait=0&color=ffffff">
                    </div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image4.jpg" data-title="Custom Title 4" data-alt="Custom Alt 4"></div>
                    
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image5.jpg" data-title="Custom Title 5" data-alt="Custom Alt 5"></div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image6.jpg" data-title="Custom Title 6" data-alt="Custom Alt 6"></div>
                    
                    <div id="video-wrapper" data-video-type="vimeo" data-width="640" data-height="390"
                          data-url="http://player.vimeo.com/video/33690353?portrait=0&color=ffffff">
                    </div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image7.jpg" data-title="Custom Title 7" data-alt="Custom Alt 7"></div>
                    <div id="video-wrapper" data-video-type="vimeo" data-width="640" data-height="390"
                          data-url="http://player.vimeo.com/video/33480080?portrait=0&color=ffffff">
                    </div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image8.jpg" data-title="Custom Title 8" data-alt="Custom Alt 8"></div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image9.jpg" data-title="Custom Title 9" data-alt="Custom Alt 9"></div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image10.jpg" data-title="Custom Title 10" data-alt="Custom Alt 10"></div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image11.jpg" data-title="Custom Title 11" data-alt="Custom Alt 11"></div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image12.jpg" data-title="Custom Title 12" data-alt="Custom Alt 12"></div>
                    <div id="video-wrapper" data-video-type="vimeo" data-width="640" data-height="390"
                          data-url="http://player.vimeo.com/video/28693387?portrait=0&color=ffffff">
                    </div> 
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image13.jpg" data-title="Custom Title 13" data-alt="Custom Alt 13"></div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image14.jpg" data-title="Custom Title 14" data-alt="Custom Alt 14"></div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image15.jpg" data-title="Custom Title 15" data-alt="Custom Alt 15"></div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image16.jpg" data-title="Custom Title 16" data-alt="Custom Alt 16"></div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image17.jpg" data-title="Custom Title 17" data-alt="Custom Alt 17"></div>
                    <div id="preview-media-image" data-url="assets/media/portfolio/images/image18.jpg" data-title="Custom Title 18" data-alt="Custom Alt 18"></div>
                    
                </div>            
            </div>
            <div class="preview-arrow-close">
                <div class="preview-arrow-backg opacity_2"></div>
                <div class="preview-arrow-close-sign"></div>
            </div>
            <div class="preview-arrow-backward">
                <div class="preview-arrow-backg opacity_2"></div>
                <div class="preview-arrow-backward-sign"></div>
            </div>
            <div class="preview-arrow-forward">
                <div class="preview-arrow-backg opacity_2"></div>
                <div class="preview-arrow-forward-sign"></div>
            </div>  
			<div class="preview-smartphone-info">
                <div class="preview-smartphone-info-backg opacity_1"></div>
                <span class="show_info">SHOW INFO</span>
                <span class="hide_info">HIDE INFO</span>
            </div>			
            <div id="full-width-preview-info-holder" class="module-position-rc">
                <div id="full-width-info-container" class="full-width-info-container shadow-side-left">
                    <div class="full-width-info-holder">
                        <div class="full-width-info-holder-desc">
                            <p>Giuseppe</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Beat</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Baseball Illustration</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique. Sed elit elit, adipiscing eget molestie vulputate, euismod vitae mi. Proin posuere volutpat congue. Proin posuere volutpat congue.</span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Frames</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Caricature Dr. House</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>The Node</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Carousel Bike</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Late Days Of A Legend</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Planet Of The Apes</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Cee-Ee</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Shopping Spree</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Proteigon</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Oh My Gosh</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Media Overdose</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Qubsik Project</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Modern House</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Red Passion</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Opening Sequence | BUNRAKU </p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Sleep Deprivation</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Streetbot</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Missed Relic</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Nothing To Lose</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Violen</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>
                        <div class="full-width-info-holder-desc">
                            <p>Sunset Background</p>
                            <div class="custom-separator"></div>
                            <span>Pellentesque diam lectus, dapibus non lacinia in, vulputate sit amet dolor. Vivamus sollicitudin nunc sed augue lobortis at elementum nulla tristique.</span>
                            <span>Vivamus porta, mi non vestibulum semper, massa nisl commodo est, quis fermentum nisi risus in erat. Phasellus sed nulla vel enim mattis tristique. Ut condimentum sodales leo, et mattis urna vulputate ut. </span>
							<!-- start social facebook, twitter and pinterest -->
                            <div id="social-holder">
                                <div id="social-holder-back" class="opacity_2"></div>
                                <div data-src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthemes.mediacreed.com%2F%23portfolio&amp;send=false&amp;layout=button_count&amp;width=85&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>
                                <div data-src="https://platform.twitter.com/widgets/tweet_button.html?url=http://themes.mediacreed.com/html/synergy/#portfolio&text=Synergy - Awesome HTML Portfolio Template&via=mediacreed" 
                                     style="float:left; border:none; overflow:hidden; width:82px; height:21px; margin: 6px 5px 5px 10px;"></div>     
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fthemes.mediacreed.com%2Fhtml%2Fsynergy%2F&media=http%3A%2F%2Fthemes.mediacreed.com%2Fdesc_images%2Fprofile_preview_synergy.jpg&description=Synergy%20is%20a%20responsive%20%26%20interactive%20fullscreen%20portfolio%20for%20artists%2C%20photographers%2C%20media%20agencies%2C%20restaurants%20and%20for%20everyone%20that%20wants%20to%20showcase%20their%20portfolio%20in%20a%20professional%20way." class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>                                
                            </div>
                            <!-- end social facebook, twitter and pinterest -->
						</div>                        
                    </div>
                </div>        
            </div>        
        </div><!-- end .full-width-preview" -->
    </div><!-- end #module-container -->
</div>

<!-- START LOADING CONTAINER AND ANIMATION-->
<div id="load-container"></div>
<div id="loading-animation">
	<img src="assets/loaders/loader.gif" width="16" height="11" alt="Synergy - loading animation"/>
</div>
<!-- END LOADING CONTAINER AND ANIMATION--> 
    
</body>
</html>
