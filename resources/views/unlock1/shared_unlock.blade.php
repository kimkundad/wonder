<html>
<head>
  <title>AcmeTrader Events</title>
    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
  <?php
    $time_fb = time();
   ?>
  <meta property="og:site_name" content="AcmeTrader Events">
  <meta property="og:url"           content="https://acmetrader.club/unlock_events_shared/{{$user->id}}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Unlock Acme and his cloner" />
  <meta property="og:image"         content="https://acmetrader.club/assets/home/img/Unlock_Acme_and_his_cloner.png" />
  <meta property="og:description"   content="{{$user->name}} สนใจ โครงการเทรดเพื่อชดเชยความเสียหายอันเกิดขึ้นจากสถานการณ์ตลาดแลกเปลี่ยนเงินตราระหว่างประเทศ (Forex) ที่ผันผวนรุนแรงสูงที่สุดในรอบ 6 ปี" />

  <meta property="fb:app_id" content="2318508461812359">
  <meta property="fb:admins" content="100002037238809">



</head>
<body>

  <!-- Load Facebook SDK for JavaScript -->

  <div class="col-md-8">
               <h3>{{$user->name}} สนใจ </h3>
               <p>โครงการเทรดเพื่อชดเชยความเสียหายอันเกิดขึ้นจากสถานการณ์ตลาดแลกเปลี่ยนเงินตราระหว่างประเทศ (Forex)</p>
               <hr>
               <img src="https://acmetrader.club/assets/home/img/Unlock_Acme_and_his_cloner.png" class="img-fluid">






             </div>

             <div id="fb-root"></div>
             <script>
window.fbAsyncInit = function() {
  FB.init({
    appId      : '2318508461812359',
    xfbml      : true,
    version    : 'v4.0'
  });
  FB.AppEvents.logPageView();
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "https://connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
</script>

  <!-- Your share button code -->
  <div class="fb-share-button"
    data-href="https://acmetrader.club/unlock_events_shared/{{$user->id}}"
    data-layout="button_count">
  </div>

</body>
</html>
