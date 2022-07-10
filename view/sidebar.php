<div class="widget" id="wid<?= $number_of_item ?>">
  <h2><?= $name ?></h2>
  <div class="row">
  <div class="right">
    <div class="spacetop">
      <i class="fas fa-map-pin"></i>
      <span><?= $address ?></span>
    </div>
    <div class="spacetop">
      <i class="fas fa-phone-volume"></i>
      <span class="wspacing"><?= $phone ?></span>
    </div>
    </div>
  </div>
  <div class="row">
  <a href="javascript:google.maps.event.trigger(gmarkers[<?= $number_of_item ?>],'click');">
  <div id="bmib" class="result"><span id="output"></span><i class="fas fa-location-arrow"></i>Show on Map</div></a>
</div>
<div style="clear:both;"></div>
</div>