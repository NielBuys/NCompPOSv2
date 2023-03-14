<!DOCTYPE html>
<html lang="<?php echo trans('cldr'); ?>">
<head>
    <title><?php echo trans('invoice_list'); ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/<?php echo get_setting('system_theme', 'invoiceplane'); ?>/css/reports.css" type="text/css">
</head>
<body>

<h3 class="report_title">
    <?php echo trans('invoice_list'); ?><br/>
    <small><?php echo $from_date . ' - ' . $to_date ?></small>
</h3>

<table>
    <tr>
        <th><?php echo trans('date'); ?></th>
        <th><?php echo trans('invoice'); ?></th>
        <th><?php echo trans('client'); ?></th>
        <th class="amount"><?php echo trans('amount'); ?></th>
    </tr>
    <?php
    $sum = 0;

    foreach ($results as $result) {
        ?>
        <tr>
            <td><?php echo date_from_mysql($result->invoice_date_created, true); ?></td>
            <td><?php echo $result->invoice_number; ?></td>
            <td><?php echo format_client($result); ?></td>
            <td class="amount"><?php echo format_currency($result->invoice_total);
                $sum = $sum + $result->invoice_total; ?></td>
        </tr>
        <?php
    }

    if (!empty($results)) {
        ?>
        <tr>
            <td colspan=3><?php echo trans('total'); ?></td>
            <td class="amount"><?php echo format_currency($sum); ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
