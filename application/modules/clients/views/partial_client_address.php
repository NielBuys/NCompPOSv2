<span class="client-reference-line">
    <?php echo($client->client_ref ? htmlsc($client->client_ref) . '<br>' : ''); ?>
</span>

<span class="client-contact-name">
    <?php echo($client->client_contact_name ? htmlsc($client->client_contact_name) . '<br>' : ''); ?>
</span>

<span class="client_email">
    <?php echo($client->client_email ? htmlsc($client->client_email) . '<br>' : ''); ?>
</span>
<span class="client_phone">
    <?php echo($client->client_phone ? htmlsc($client->client_phone) . '<br>' : ''); ?>
</span>

<?php $this->load->helper('country'); ?>

<span class="client-address-street-line">
    <?php echo($client->client_address_1 ? htmlsc($client->client_address_1) . '<br>' : ''); ?>
</span>
<span class="client-address-street-line">
    <?php echo($client->client_address_2 ? htmlsc($client->client_address_2) . '<br>' : ''); ?>
</span>
<span class="client-adress-town-line">
    <?php echo($client->client_city ? htmlsc($client->client_city) . ' ' : ''); ?>
    <?php echo($client->client_state ? htmlsc($client->client_state) . ' ' : ''); ?>
    <?php echo($client->client_zip ? htmlsc($client->client_zip) : ''); ?>
</span>
<span class="client-adress-country-line">
    <?php echo($client->client_country ? '<br>' . get_country_name(trans('cldr'), $client->client_country) : ''); ?>
</span>
