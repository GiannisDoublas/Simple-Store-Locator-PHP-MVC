<div class="row">
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-8" id="filters">
            <div style="text-align: center;">
                <form action="" method="POST" id="search">
                    <div class="row">
                        <div class="select" id="city">
                            <select required id="mid" class="" name="city" form="search">
                            <?php 
                                foreach ($filters as $filter) {
                                    echo '<option value="'.$filter['id'].'" class="greece">'.$filter['perioxi'].'</option>';
                                }
                            ?>     
                            </select>
                        </div>
                        <div class="search">
                            <button type="submit">SEARCH</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    </div>
</div>