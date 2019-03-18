<?php
/**
 * Created by PhpStorm.
 * User: eakku
 * Date: 13.11.2018
 * Time: 22:01
 */
?>
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2><p align="center">Gider</h2> </p>
                        <hr class="star-primary">
                        <label >Kapi No :</label>
                        <input type="text" name="kapi" class="form-control" style="width: 200px">
                        <label >Tutar :</label>
                        <input type="text" name="tutar" class="form-control" style="width:200px">
                        <label >Tarih :</label><br>
                        <input type="date" name="date" class="form-control" size="15" value="2012-05-05" style="width:200px"><br>

                        <label >Açıklama :</label>
                        <textarea class="form-control" rows="2" id="comment" style=width:200px></textarea>
                        <input type="submit" value="Ekle" name="ekle">
                        <br>

                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
