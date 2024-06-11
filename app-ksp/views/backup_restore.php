<!DOCTYPE html>
<html>
<head>
    <title>Backup & Restore</title>
</head>
<body>
    <h1>Backup & Restore</h1>

    <?php if($this->session->flashdata('success')): ?>
        <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <form action="<?php echo site_url('main/backup'); ?>" method="post">
        <button type="submit">Backup Database</button>
    </form>

    <form action="<?php echo site_url('main/restore'); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="backup_file" accept=".sql, .zip" required>
        <button type="submit">Restore Database</button>
    </form>
</body>
</html>
