  <?php 
  error_reporting(0);
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
 <head>

 

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="robots" content="index, follow">
 <meta charset="UTF-8">
 <meta http-equiv="imagetoolbar" content="no">
 <meta name="revisit-after" content="7">
 <meta name="webcrawlers" content="all">
 <meta name="rating" content="general">
 <meta name="spiders" content="all"-->

 <title>cupu</title>

 <link rel="shortcut icon" href="favicon.png" />

 <!-- Bagian Stylesheets -->
 <link rel="stylesheet" href="<?php echo "$f[folder]/css/main-stylesheet.css" ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo "$f[folder]/css/jquery.fancybox.css" ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo "$f[folder]/css/shortcodes.css" ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo "$f[folder]/css/ddsmoothmenu.css" ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo "$f[folder]/css/style_slider.css" ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo "$f[folder]/css/infinitecarousel.css" ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo "$f[folder]/css/ticker.css" ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo "$f[folder]/css/paging2.css" ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo "$f[folder]/css/tags.css" ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo "$f[folder]/css/jquery.ad-gallery.css" ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo "$f[folder]/css/jScrollPane.css" ?>" type="text/css" /> <!-- added twit 07102015--> 

 <style type="text/css">
 .style2 {
  color: #0033CC;
  font-weight: bold;}
</style>

</head>

<!--========= BACKGROUND================================-->
<?php
$r=mysql_fetch_array(mysql_query("SELECT * FROM background"));
echo "<body style='background: url(img_background/$r[gambar]) top center repeat-y;'>";
?>
<!--========= AKHIR BACKGROUND================================-->

<body class="top">

  <div class="main-content-wrapper">
    <div class="main-content">


      <!------------------------ ATAS ------------------------------>

      <div class="main-header">

        <!---------------------------- LOGO ---------------------------------->			
        <div class="logo"><?php
        $logo=mysql_query("SELECT * FROM logo ORDER BY id_logo DESC LIMIT 1");
        while($b=mysql_fetch_array($logo)){
          echo "<a href='index.php'><img height=100 src='logo/$b[gambar]'/></a>";} /*<!-- 59 to 150 04102015-->*/
          ?></div>
  <!------------------------- AKHIR LOGO --------------------------------->	

  <!------------------------- SEARCH --------------------------------->	 				
  <div class="iklanatas">
  <?php
  $iklantengah=mysql_query("SELECT * FROM iklantengah  WHERE id_iklantengah ='31' ORDER BY id_iklantengah DESC LIMIT 1");
  while($b=mysql_fetch_array($iklantengah)){
  echo "<div class='iklantengah'>
  <a href='$b[url]' title='$b[judul]'>
  <img src='foto_iklantengah/$b[gambar]' border=0 width=850 height=100></a>
  </div>";}?>
  </div>
   <!------------------------- AKHIR SEARCH --------------------------------->	 					
			
  </div>
  <!------------------------ AKHIR ATAS ------------------------------>
  

  <!------------------------ MENU ------------------------------>
  <div class="navigation">
    <div id="smoothmenu1" class="ddsmoothmenu">
      <ul>
        <?php
        function get_menu($data, $parent = 0) {
          static $i = 1;
          $tab = str_repeat(" ", $i);
          if ($data[$parent]) {
            $html = "$tab<li>";
            $i++;
            foreach ($data[$parent] as $v) {
              $child = get_menu($data, $v->id_menu);
              $html .= "$tab<li class='last'>";
              $html .= '<a class="'.$css.'" href="'.$v->link.'">'.$v->nama_menu.'</a>';
              if ($child) {
                $i--;
                $html .= "<ul>$child";
                $html .= "$tab</ul>";}
                $html .= '</li>';}
                $html .= "$tab</li>";
                return $html;}
              else {
                return false;}}

                $result = mysql_query("SELECT * FROM menu WHERE aktif='Ya' ORDER BY id_menu");
                while ($row = mysql_fetch_object($result)) {
                  $data[$row->id_parent][] = $row; }
                  $menu = get_menu($data);
                  echo "$menu";
                  ?>
                </ul>
              </div></div>
              <!------------------------ AKHIR MENU ------------------------------>		

              <!------------------------ NEWS UPDATE ------------------------------>	
              <div class="breaking-wrapper">  
                <p><b>Sekilas Info</b></p>
                <div class='horizontal-scroller'>
                  <div id='scrollingtext'>
                    <?php
                    $terkini=mysql_query("SELECT * FROM berita ORDER BY id_berita  DESC LIMIT 10");
                    while($p=mysql_fetch_array($terkini)){
                      $baca = $p[dibaca]+1;
                      $isi_berita = strip_tags($p['isi_berita']); 
                      $isi = substr($isi_berita,0,100); 
                      $isi = substr($isi_berita,0,strrpos($isi," ")); 
                      $tgl = tgl_indo($p['tanggal']);

                      echo " 
                      <img src='$f[folder]/images/ico-list-bullet-1.png' width='7' height='6'/>
                      <a href=berita-$p[judul_seo].html>$p[judul]</a>";}
                      ?>
                    </div>
                  </div> 
                  <span class="search">
                    <form method="POST" action="hasil-pencarian.html">
                      <input name="kata" type="text" class="input-text" placeholder="cari berita" />
                      <input type="submit" class="input-submit" value="" />
                    </form></span> 
                  </div>
                  <!------------------------ AKHIR NEWS UPDATE ------------------------------>	

                  <!--------- KONTEN ------------>	
                  <?php
                  include "$f[folder]/isi.php";      
                  ?>
                  <!--------- AKHIR KONTEN -------->	


                  <!--div class="mascot-euro"-->
  <!--div class="mascot">
 <!--?php
  $logo=mysql_query("SELECT * FROM logo ORDER BY id_logo DESC LIMIT 1");
  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
  while($b=mysql_fetch_array($logo)){
  echo "<a href='$iden[url]'><img height=24 width=120 src='logo/$b[gambar]'/></a>";}
  ?>
</div 04102015-->


<!----------- BAGIAN BAWAH ------------------------>
<div class="main-footer">
  <!--Find your way -->	


  <!-- BoF twitter Container  12112015-->

  <div class="twitter-ticker">
    <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/stikptik1" data-widget-id="678642123340574720">Tweets by @stikptik1</a>
    <script>
    !function(d,s,id){
     var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
     if(!d.getElementById(id)){
      js=d.createElement(s);js.id=id;
      js.src=p+"://platform.twitter.com/widgets.js";
      fjs.parentNode.insertBefore(js,fjs);
    }
  }(document,"script","twitter-wjs");
</script>
</div>



<!-- Contact Us -->	
<div class="contact_us">
  <h5>Contact Us</h5>        
  <ul>
   <li class="telephone_no">+62(021) 7222234</li>
   <li  class="mailing_address">
    Jl. Tirtayasa Raya 6
    Kebayoran Baru, Jakarta Selatan.
    Indonesia
  </li>
  <li class="email_address"><a href="#">admin@stik-ptik.ac.id</a></li>
  <li class="googlemaps"><a href="#"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.138132308809!2d106.80528368799779!3d-6.24552107187264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f165f94c7071%3A0xff13eca6814745db!2sSekolah+Tinggi+Ilmu+Kepolisian!5e0!3m2!1sid!2sid!4v1431962641082" width="400" height="150" frameborder="0" style="border:0"></iframe></a></li>
</ul>
</div>  
<!----------- COPYRIGHT ------------------------>
<div class="copyright">
  <div class="back-to-top"><a href="#top"><span class='tooltip' title='ke atas'>&nbsp;&nbsp;</span></a></div>

  Copyright © <?php $tahun=date("Y"); echo "$tahun. "; include "nama_web.php"; ?>Developed by <?php include "nama_pemilik.php";?>
</div> 


<div class="social">
  <!--<a href="hal-tentang-kami.html">
  Tentang Kami</a> <span class style=\"color:#EA1C1C;\">|</span>
  
  <a href="./wijaya2/media.php">
    Admin</a> <span class style=\"color:#EA1C1C;\"></span>-->

    <!--*added medsos at bottom 20102015*/  BoF-->
    <a href="http://www.facebook.com"target="blank"><img src="http://www.uajy.ac.id/wp-content/themes/uajy-portal/images/fb.png"  alt="Facebook" width="16"height="16" /> </a></li>
    <a href=""><img src="http://www.uajy.ac.id/wp-content/themes/uajy-portal/images/linkedin.png"  alt="Linked" width="16"height="16" /> </a></li>
    <a href="http://www.twitter.com/stikptik1" target="_blank"><img src="http://www.uajy.ac.id/wp-content/themes/uajy-portal/images/tw.png"  alt="Twitter" width="16"height="16" /> </a></li>
    <a href="" target="_blank" ><img src="http://www.uajy.ac.id/wp-content/themes/uajy-portal/images/yt.png"  alt="Youtube" width="16"height="16" /> </a></li>


    <!--*added medsos at bottom 20102015*/  EoF-->       		

    
    <!-- <a href="rss.xml" target="_blank" class="rss">RSS Feeds</a>--></div>


    <?php
  // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
else{
  mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
}

$pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
$totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
$hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
$totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
$tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
$bataswaktu       = time() - 300;
$pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

$path = "counter/";
$ext = ".png";

$tothitsgbr = sprintf("%06d", $tothitsgbr);
for ( $i = 0; $i <= 9; $i++ ){
  $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
}

echo "
<li><class='user'>Online: <span class style=\"color:#00498E;\">$pengunjungonline </span>
<class='hits'>Hits: <span class style=\"color:#00498E;\">$hits[hitstoday]</span> / $totalhits </li>";
?>
<!----------- AKHIR COPYRIGHT  ------------------------>


<!----------- AKHIR BAGIAN BAWAH ------------------------>

</div>
</div>
</div>

</body>
</html>


<!-- Bagian JavaScripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script> 
<!--script type="text/javascript" src="<?php echo "$f[folder]/js/flowplayer-3.2.4.min.js" ?>"></script-->
<script type="text/javascript" src="http://releases.flowplayer.org/swf/flowplayer-3.2.18.swf"></script>

<script src="<?php echo "$f[folder]/js/jquery.placeholder.min.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/cufon-yui.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/cufon-replace.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/font.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/jquery.fancybox.js" ?>" type="text/javascript"></script>

<script src="<?php echo "$f[folder]/js/text-scroller.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/scripts.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/ticker.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/newsticker.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/tags.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/jquery.mousewheel.js" ?>" type="text/javascript"></script> <!-- added twit 07102015-->
<script src="<?php echo "$f[folder]/js/jScrollPane.min.js" ?>" type="text/javascript"></script> <!-- added twit 07102015-->
<script src="<?php echo "$f[folder]/js/scripttweet.js" ?>" type="text/javascript"></script> <!-- added twit 07102015-->
<script src="<?php echo "$f[folder]/js/stikptiktweet.js" ?>" type="text/javascript"></script>
<script type="text/javascript" src="jScrollPane/jquery.mousewheel.js"></script>
<!--script type="text/javascript" src="jScrollPane/jScrollPane.min.js"></script-->

<script type="text/javascript">
$(document).ready(function(){
  $(function () {
    $(window).scroll(function () { });
    $('.back-to-top a').click(function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  });
});
</script>

<script src="<?php echo "$f[folder]/js3/ddsmoothmenu.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js3/menu.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js2/jquery.easing.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js2/script.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js4/infinitecarousel.js" ?>" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready( function(){  
  $('#lofslidecontent45').lofJSidernews( { interval:5000,
    easing:'easeInOutExpo',
    duration:3500,
    auto:true } );            
});
</script>


<script src="<?php echo "$f[folder]/js/easy.js" ?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){   
  $.easy.tooltip(); 
});</script>

<script type="text/javascript">
$(document).ready(function() {

 $("a#example1").fancybox();

 $("a#example2").fancybox({
  'overlayShow' : false,
  'transitionIn'  : 'elastic',
  'transitionOut' : 'elastic'
});

 $("a#example3").fancybox({
  'transitionIn'  : 'none',
  'transitionOut' : 'none'  
});

 $("a#example4").fancybox({
  'opacity'   : true,
  'overlayShow' : false,
  'transitionIn'  : 'elastic',
  'transitionOut' : 'none'
});

 $("a#example5").fancybox();

 $("a#example6").fancybox({
  'titlePosition'   : 'outside',
  'overlayColor'    : '#000',
  'overlayOpacity'  : 0.9
});

 $("a#example7").fancybox({
  'titlePosition' : 'inside'
});

 $("a#example8").fancybox({
  'titlePosition' : 'over'
});

 $("a[rel=example_group]").fancybox({
  'transitionIn'    : 'none',
  'transitionOut'   : 'none',
  'titlePosition'   : 'over',
  'titleFormat'   : function(title, currentArray, currentIndex, currentOpts) {
   return '<span id="fancybox-title-over"><span class style=\"color:#00498E;\">foto ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp;</span> ' + title : '') + '</span>';
 }
});

      /*
      *   Examples - various
      */

      $("#various1").fancybox({
        'titlePosition'   : 'inside',
        'transitionIn'    : 'none',
        'transitionOut'   : 'none'
      });

      $("#various2").fancybox();

      $("#various3").fancybox({
        'width'       : '75%',
        'height'      : '75%',
        'autoScale'     : false,
        'transitionIn'    : 'none',
        'transitionOut'   : 'none',
        'type'        : 'iframe'
      });

      $("#various4").fancybox({
        'padding'     : 0,
        'autoScale'     : false,
        'transitionIn'    : 'none',
        'transitionOut'   : 'none'
      });
    });
  </script>

  <script src="<?php echo "$f[folder]/js5/libs/modernizr-2.0.6.min.js" ?>" type="text/javascript"></script>
  <script>window.jQuery || document.write('<script src="js5/libs/jquery-1.6.2.min.js"><\/script>')</script>
  <script src="<?php echo "$f[folder]/js5/jquery.cycle.all.latest.js" ?>" type="text/javascript"></script>
  <script type="text/javascript">
  $('#test-widget ul').cycle({ fx: 'scrollUp', speed: 800, timeout: 5000, next: '#next_test', prev: '#prev_test',
  cleartype: true, cleartypeNoBg: true });</script>

  <script src="<?php echo "$f[folder]/js6/jquery.ad-gallery.js?rand=995" ?>" type="text/javascript"></script>
  
  <script type="text/javascript">
  $(function() {
    $('img.image1').data('ad-desc', 'Whoa! This description is set through elm.data("ad-desc") instead of using the longdesc attribute.<br>And it contains <strong>H</strong>ow <strong>T</strong>o <strong>M</strong>eet <strong>L</strong>adies... <em>What?</em> That aint what HTML stands for? Man...');
    $('img.image1').data('ad-title', 'Title through $.data');
    $('img.image4').data('ad-desc', 'This image is wider than the wrapper, so it has been scaled down');
    $('img.image5').data('ad-desc', 'This image is higher than the wrapper, so it has been scaled down');
    var galleries = $('.ad-gallery').adGallery();
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
      );
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
      );
  });
</script>


<?php 
if ($iyasrini==2){
  ?>

  <script>
  flowplayer("player", "<?php echo "$f[folder]/flash/flowplayer-3.2.5.swf" ?>", {
    clip:  {
      autoPlay: false,
      autoBuffering: true,},

  onLoad: function() {	// called when player has finished loading
  this.setVolume(35);	// set volume property
}
});
</script>

<?php
}
elseif ($iyasrini==1){
  ?>

  <script>
  function showRelatedList(gdata, container) {
    var relatedVideos = gdata.relatedVideos;
    var content = '<em>Related Videos:</em>';
    content += '<a class="go up"></a><div class="playlist"><div class="clips low">';    

    jQuery.each( relatedVideos, function(index, item){
      content += '<a href="'+ item.url +'" '+ (index==0 ? 'class="first"' : "") +'>';
      content += item.title + "<br/>";
      content += "<em>" + Math.round(item.duration / 60) + " min</em></a>";});    

    content += '</div></div><a class="go down"></a>';
    $(container).html(content);
    $("div.playlist").scrollable({
      items:'div.clips',
      vertical:true,
      next:'a.down',
      prev:'a.up'
    });}

    $f("youtube", "<?php echo "$f[folder]/flash/flowplayer-3.2.5.swf" ?>", {
      plugins:  {
        youtube: {
          url:'flowplayer.youtube-3.2.1.swf',
          enableGdata: true,            

          onApiData: function(gdata) {
            console.log(gdata);               

            showRelatedList(gdata, "#playlistContainer");
          }}},

          onLoad: function() {	
            this.setVolume(35); },

            clip: {
              autoPlay: false,
              autoBuffering: true,
              provider: 'youtube',
              urlResolvers: 'youtube'}

            }).playlist("div.clips");
          </script>

          <?php 
        } 
        ?>

        <!--========= Copyright © 2015. Developed by: BS  ========================-->	