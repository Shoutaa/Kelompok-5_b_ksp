<?php 
foreach ($db as $key){
    $logo[$key['attr']] = $key['value'];
}
// print_r($logo) ?>
<div class="container-fluid fixed">
    <div id="content">
        <div class="widget widget-4 widget-body-white widget-tabs widget-tabs-2">
            <br>
            <form method="post" action="<?php echo site_url('logo/simpan') ?>" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="header">Lokasi </label>
                        <div class="controls"> 
                            <textarea name="head" style="width:80%;"><?php echo $logo['kop_text'] ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <input type="submit" class="btn" value="Simpan">
                    </div>
                </fieldset>
            </form>
            <form method="post" action="<?php echo site_url('database/backup') ?>" class="form-horizontal">
                <div class="control-group">
                    <input type="submit" class="btn" value="Backup">
                </div>
            </form>
            <form method="post" action="<?php echo site_url('database/restore') ?>" enctype="multipart/form-data" class="form-horizontal">
                <div class="control-group">
                    <input type="file" name="db_restore">
                    <input type="submit" class="btn" value="Restore">
                </div>
            </form>
            <br><br><h5>Preview:</h5>  
            <table>
                <tr>
                    <td>
                        <img style="float:left" width="70" height="70" src="<?php echo base_url('assets/'.$logo['kop_koperasi']) ?>">
                    </td>
                    <td>
                        <div style="font-size: 18px;text-align: center;vertical-align:middle;padding:20px;">
                            <?php echo nl2br($logo['kop_text']) ?></div>
                    </td>
                    <td>
                        <img style="float:right" width="70" height="70" src="<?php echo base_url('assets/'.$logo['kop_logo']) ?>">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
