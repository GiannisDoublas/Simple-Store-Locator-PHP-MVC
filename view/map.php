<!DOCTYPE html>
<html lang="el">
  <body>
    <div class="container-fluid text-center text-md-left">
      <div class="row" >
        <div id="one" class="one col-md-4 mt-md-0 mt-0">
          <div class="listings">
          <div style="position: -webkit-sticky; position: sticky; top: 0; z-index: 1;">
          <img src="view/img/logo-sidebar.png" style="width: 100%; ">
        </div>
            <?php $this->renderSidebar(); ?>
        </div>
        </div>
        <div id="two" class="two col-md-8 mb-md-0 mb-0" >
          <?php $this->renderFilters(); ?>
          <div  id="googlemap"></div>
        </div>
      </div>
    </div>
   </body>
   <?php include 'js/google_map_js.php';?>
</html>