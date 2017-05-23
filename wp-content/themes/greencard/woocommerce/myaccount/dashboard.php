<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="row">
<p>
	<?php
		echo sprintf( esc_attr__( 'Hello %s%s%s (not %2$s? %sSign out%s)', 'woocommerce' ), '<strong>', esc_html( $current_user->display_name ), '</strong>', '<a href="' . esc_url( wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ) ) . '">', '</a>' );
	?>
</p>

<p>
	<?php
		echo sprintf( esc_attr__( 'From your account you can view your recent orders, manage  %1$sedit your password and account details%2$s.', 'woocommerce' ), '<a href="' . esc_url( wc_get_endpoint_url( 'edit-account' ) ) . '">' , '</a>');
	?>
</p>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );


?>
	<div class="fw-divider-line"><hr></div>
	<h2 class="title-style-2"><? echo __('User info table', 'foundationpress' );?></h2>
	<div class="info-table-wrap large-9 medium-12">
<?php 
$current_user = get_current_user_id();
If ($current_user ){
	$my_user = get_user_by('id', $current_user);
	$all_user_params = get_user_meta( $current_user );
?>
	<table class="info-table user-info-table">
		<tbody>
			<tr>
				<td class="title" width="50%"><? echo __('Email:', 'foundationpress' );?></td>
				<td class="info" width="50%"><? echo $my_user->user_email;?></td>
			</tr>		
			<tr>
				<td class="title"><?php echo __( 'First Name:', 'foundationpress' );?></td>
				<td class="info"><? echo get_user_meta( $current_user, 'first_name', true);?></td>
			</tr>
			<tr>
				<td class="title"><? echo __('Last Name:', 'foundationpress' );?></td>
				<td class="info"><? echo get_user_meta( $current_user, 'last_name', true);?></td>
			</tr>
			<tr>
				<td class="title"><? echo __('Marital Status', 'foundationpress' )?></td>
				<td class="info"><? echo get_user_meta( $current_user, 'marit_status', true);?></td>
			</tr>		
			<tr>
				<td class="title"><? echo __('Country of Birth', 'foundationpress' );?></td>
				<td class="info"><? echo get_user_meta( $current_user, 'birth_country', true);?></td>
			</tr>		
			<tr>
				<td class="title"><? echo __('Country of Residence', 'foundationpress' );?></td>
				<td class="info"><? echo get_user_meta( $current_user, 'country_resid', true);?></td>
			</tr>		
			<tr>
				<td class="title"><? echo __('I`m currently working:', 'foundationpress' );?></td>
				<td class="info"><? echo get_user_meta( $current_user, 'working', true);?></td>
			</tr>		
			<tr>
				<td class="title"><? echo __('I`m a High Shcool Graduate:', 'foundationpress' );?></td>
				<td class="info"><? echo get_user_meta( $current_user, 'h_school', true);?></td>
			</tr>		
			<tr>
				<td class="title"><? echo __('Mobile phone:', 'foundationpress' );?></td>
				<td class="info"><? echo get_user_meta( $current_user, 'mobile', true);?></td>
			</tr>		
			<tr>
				<td class="title"><? echo __('Phone: (Home / Office):', 'foundationpress' );?></td>
				<td class="info"><? echo get_user_meta( $current_user, 'phone', true);?></td>
			</tr>		
			<tr>
				<td class="title"><? //__('', 'foundationpress' )?></td>
				<td class="info"><? //echo get_user_meta( $current_user, '', true);?></td>
			</tr>		
		</tbody>
	</table>
<? } ?>

	</div>

	<h2 class="title-style-2"><? echo __('Green card applications', 'foundationpress' );?></h2>

	<div class="info-table-wrap large-9 medium-12">

		<table class="info-table">
			<thead>
				<tr>
					<th width="20%">No</th>
					<th width="60%"><? echo __('Name', 'foundationpress' );?></th>
					<th width="20%"><? echo __('Status', 'foundationpress' );?></th>
				</tr>
			</thead>
			<tbody>
				<tr class="separator">
					<td colspan="3"></td>
				</tr>							
<? if (get_user_meta( $current_user, 'status_lottery', true)){?>
				<tr>
					<td><?php echo __('Progress', 'foundationpress' ); ?></td>
					<td><? echo get_user_meta( $current_user, 'site_comment', true);?></td>
					<td><? echo get_user_meta( $current_user, 'status_lottery', true);?></td>
				</tr>	
<? } else { ?>
				<tr>
					<td colspan="3" class="title center info-line"><? echo __('No Green card applications', 'foundationpress' );?></td>
				</tr>		
<? } ?>
				<tr class="separator">
					<td colspan="3"></td>
				</tr>						
			</tbody>				
		</table>

	</div>

<?php

$my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
	'order-number'  => __( 'Order', 'woocommerce' ),
	'order-date'    => __( 'Date', 'woocommerce' ),
	'order-status'  => __( 'Status', 'woocommerce' ),
	'order-total'   => __( 'Total', 'woocommerce' ),
	'order-actions' => '&nbsp;',
) );

$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
	'numberposts' => $order_count,
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => wc_get_order_types( 'view-orders' ),
	'post_status' => array_keys( wc_get_order_statuses() )
) ) );
?>
	<div class="info-table-wrap large-9 medium-12">
	<h2 class="title-style-2"><? echo __( 'Recent Orders', 'foundationpress' );?></h2>
	<table class="shop_table shop_table_responsive my_account_orders">

		<thead>
			<tr>
				<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
					<th class="<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
<?php

if ( $customer_orders ) { ?>

			<?php foreach ( $customer_orders as $customer_order ) :
				$order      = wc_get_order( $customer_order );
				$item_count = $order->get_item_count();
				?>
				<tr class="order">
					<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
						<td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

							<?php elseif ( 'order-number' === $column_id ) : ?>
								<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
									<?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
								</a>

							<?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo date( 'Y-m-d', strtotime( $order->order_date ) ); ?>" title="<?php echo esc_attr( strtotime( $order->order_date ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></time>

							<?php elseif ( 'order-status' === $column_id ) : ?>
								<?php echo wc_get_order_status_name( $order->get_status() ); ?>

							<?php elseif ( 'order-total' === $column_id ) : ?>
								<?php echo sprintf( _n( '%s for %s item', '%s for %s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ); ?>

							<?php elseif ( 'order-actions' === $column_id ) : ?>
								<?php
									$actions = array(
										'pay'    => array(
											'url'  => $order->get_checkout_payment_url(),
											'name' => __( 'Pay', 'woocommerce' )
										),
										'view'   => array(
											'url'  => $order->get_view_order_url(),
											'name' => __( 'View', 'woocommerce' )
										),
										'cancel' => array(
											'url'  => $order->get_cancel_order_url( wc_get_page_permalink( 'myaccount' ) ),
											'name' => __( 'Cancel', 'woocommerce' )
										)
									);

									if ( ! $order->needs_payment() ) {
										unset( $actions['pay'] );
									}

									if ( ! in_array( $order->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_cancel', array( 'pending', 'failed' ), $order ) ) ) {
										unset( $actions['cancel'] );
									}

									if ( $actions = apply_filters( 'woocommerce_my_account_my_orders_actions', $actions, $order ) ) {
										foreach ( $actions as $key => $action ) {
											echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
										}
									}
								?>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
<?php } else { ?>
				<tr class="order">
					<td colspan="5" class="title center info-line">No orders</td>
				</tr>
				<tr class="order">
					<td colspan="5" class="title center warning-line"><a href="/shop/"><?php echo __('You have choise subscrible to GREEN CARD LOTTERY', 'foundationpress' ); ?></a></td>
				</tr>
<?php } ?>
		</tbody>
	</table>
</div>

<?php

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );
?>
</div>