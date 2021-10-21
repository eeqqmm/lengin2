<?php
if ( ( $loop = get_transient( 'employee_query' ) === false  ) ) {
    $loop = new WP_Query(array(
        'post_type' => 'employee',
        'posts_per_page' => -1,));
    set_transient( 'employee_query', $loop, YEAR_IN_SECONDS );
}

add_action( 'transition_post_status', 'purge_employee_transient', 10, 3 );
function purge_employee_transient( $new_status, $old_status, $post ) {
    if (  $post->post_type == 'employee' ) {
        delete_transient( 'employee_query' );
    }
}