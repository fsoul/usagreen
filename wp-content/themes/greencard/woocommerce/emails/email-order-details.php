<?php
/**
 * Order details table shown in emails.
 *
 * Overridden email template. Add company address
 *
 * User: bilinskyi
 * Date: 08.06.17
 * Time: 12:14
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>

<?php if ( ! $sent_to_admin ) : ?>
    <h2><?php printf( __( 'Order #%s', 'woocommerce' ), $order->get_order_number() ); ?></h2>
<?php else : ?>
    <h2><a class="link" href="<?php echo esc_url( admin_url( 'post.php?post=' . $order->id . '&action=edit' ) ); ?>"><?php printf( __( 'Order #%s', 'woocommerce'), $order->get_order_number() ); ?></a> (<?php printf( '<time datetime="%s">%s</time>', date_i18n( 'c', strtotime( $order->order_date ) ), date_i18n( wc_date_format(), strtotime( $order->order_date ) ) ); ?>)</h2>
<?php endif; ?>

<table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="1">
    <thead>
    <tr>
        <th class="td" scope="col" style="text-align:left;"><?php _e( 'Product', 'woocommerce' ); ?></th>
        <th class="td" scope="col" style="text-align:left;"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
        <th class="td" scope="col" style="text-align:left;"><?php _e( 'Price', 'woocommerce' ); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php echo $order->email_order_items_table( array(
        'show_sku'      => $sent_to_admin,
        'show_image'    => false,
        'image_size'    => array( 32, 32 ),
        'plain_text'    => $plain_text,
        'sent_to_admin' => $sent_to_admin
    ) ); ?>
    </tbody>
    <tfoot>
    <?php
    if ( $totals = $order->get_order_item_totals() ) {
        $i = 0;
        foreach ( $totals as $total ) {
            $i++;
            ?><tr>
            <th class="td" scope="row" colspan="2" style="text-align:left; <?php if ( $i === 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['label']; ?></th>
            <td class="td" style="text-align:left; <?php if ( $i === 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; ?></td>
            </tr><?php
        }
    }
    ?>
    </tfoot>
</table>
<header class="title">
    <h2><?php _e( 'Address of the company', 'woocommerce' ); ?></h2>
</header>
<address>
    <p>3332 NE 190 ST</p>
    <p>Aventura, FL 33180</p>
</address>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>
