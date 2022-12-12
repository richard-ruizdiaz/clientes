
<div class="container">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

    <h2 align="center">HVN TV</h2>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
<style>
 #clappr{ width: 100%;height: 100%;position: relative; min-height: 320px; margin-bottom: 25px;}
 #clappr > div{ width:100%;height:100%;position: absolute;}
</style>
<!-- Paste the following into the <body> -->
<div id="clappr"></div>
<script>
 var player = new Clappr.Player({
  source:
       "https://59ce1298bfb98.streamlock.net:443/hvntv/hvntv/playlist.m3u8"
   ,
    parentId: "#clappr",
  width: '100%',
  height: '100%',
  autoPlay: true,
    //gaAccount: 'UA-44332211-1',
  //gaTrackerName: 'MyPlayerInstance'
  });
</script>     
</div></div></div>