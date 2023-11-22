<!DOCTYPE html>
<html lang="<?php _trans('cldr'); ?>">
<head>
    <meta charset="utf-8">
    <title><?php _trans('statement'); ?></title>
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/<?php echo get_setting('system_theme', 'invoiceplane'); ?>/css/templates.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/core/css/custom-pdf.css">
</head>
<body>
<header class="clearfix">

    <div id="logo">
        <?php echo invoice_logo_pdf(); ?>
    </div>

    <div id="client">
        <h1 class="statement-title"><?php echo _trans('statement_of_account'); ?></h1>
        <div>
            <b><?php echo $client->client_name; ?></b>
        </div>
        <?php if ($client->client_vat_id) {
            echo '<div>' . trans('vat_id_short') . ': ' . $client->client_vat_id . '</div>';
        }
        if ($client->client_tax_code) {
            echo '<div>' . trans('tax_code_short') . ': ' . $client->client_tax_code . '</div>';
        }
        if ($client->client_address_1) {
            echo '<div>' . htmlsc($client->client_address_1) . '</div>';
        }
        if ($client->client_address_2) {
            echo '<div>' . htmlsc($client->client_address_2) . '</div>';
        }
        if ($client->client_city || $client->client_state || $client->client_zip) {
            echo '<div>';
            if ($client->client_city) {
                echo htmlsc($client->client_city) . ' ';
            }
            if ($client->client_state) {
                echo htmlsc($client->client_state) . ' ';
            }
            if ($client->client_zip) {
                echo htmlsc($client->client_zip);
            }
            echo '</div>';
        }
        if ($client->client_country) {
            echo '<div>' . get_country_name(trans('cldr'), $client->client_country) . '</div>';
        }

        echo '<br/>';

        if ($client->client_phone) {
            echo '<div>' . trans('phone_abbr') . ': ' . htmlsc($client->client_phone) . '</div>';
        } ?>

    </div>
    <div id="company">
        <div class="statement-date"><?php echo _trans('statement_date') . ': ' . date_from_timestamp(time()); ?></div>
        <div><b><?php echo htmlsc(get_setting('invoice_quote_name', null)); ?></b></div>
        <?php if (get_setting('invoice_quote_vat_id', null)) {
            echo '<div>' . trans('vat_id_short') . ': ' . get_setting('invoice_quote_vat_id', null) . '</div>';
        }
        if (get_setting('invoice_quote_tax_code', null)) {
            echo '<div>' . trans('tax_code_short') . ': ' . get_setting('invoice_quote_tax_code', null) . '</div>';
        }
        if (get_setting('invoice_quote_address_1', null)) {
            echo '<div>' . htmlsc(get_setting('invoice_quote_address_1', null)) . '</div>';
        }
        if (get_setting('invoice_quote_address_2', null)) {
            echo '<div>' . htmlsc(get_setting('invoice_quote_address_2', null)) . '</div>';
        }
        if (get_setting('invoice_quote_city', null) || get_setting('invoice_quote_state', null) || get_setting('invoice_quote_zip', null)) {
            echo '<div>';
            if (get_setting('invoice_quote_city', null)) {
                echo htmlsc(get_setting('invoice_quote_city', null)) . ' ';
            }
            if (get_setting('invoice_quote_state', null)) {
                echo htmlsc(get_setting('invoice_quote_state', null)) . ' ';
            }
            if (get_setting('invoice_quote_zip', null)) {
                echo htmlsc(get_setting('invoice_quote_zip', null));
            }
            echo '</div>';
        }
        if (get_setting('invoice_quote_country', null)) {
            echo '<div>' . get_country_name(trans('cldr'), get_setting('invoice_quote_country', null)) . '</div>';
        }

        echo '<br/>';

        if (get_setting('invoice_quote_phone', null)) {
            echo '<div>' . trans('phone_abbr') . ': ' . htmlsc(get_setting('invoice_quote_phone', null)) . '</div>';
        }
        if (get_setting('invoice_quote_email', null)) {
            echo '<div>' . trans('email_abbr') . ': ' . htmlsc(get_setting('invoice_quote_email', null)) . '</div>';
        }
        ?>
    </div>

</header>

<main>

    <table class="item-table">
        <thead>
        <tr>
            <th class="item-name"><?php _trans('date'); ?></th>
            <th class="item-name"><?php _trans('transaction'); ?></th>
            <th class="item-name"><?php _trans('reference'); ?></th>
            <th class="item-name"><?php _trans('debits'); ?></th>
            <th class="item-name"><?php _trans('credits'); ?></th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($transactions as $transaction) { ?>
            <tr>
                <td><?php echo date_from_mysql($transaction->itemdate, true); ?></td>
                <td><?php echo _trans($transaction->transaction); ?></td>
                <td><?php _htmlsc($transaction->transaction_number); ?></td>
                <td class="text-right">
                    <?php echo format_currency($transaction->amount); ?>
                </td>
                <td class="text-right">
                    <?php echo format_currency($transaction->amount); ?>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

</main>

</body>
</html>
