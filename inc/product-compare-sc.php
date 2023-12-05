<?php 

function ntn_sc_product_compare($atts, $content = null) {
    // Process the shortcode attributes and content
    // Return the output
        
    // Check if the cookie is set
    if (isset($_COOKIE['woodmart_compare_list'])) {
        // Retrieve the cookie value
        $compareListValue = $_COOKIE['woodmart_compare_list'];

        // First decoding to remove the extra backslashes
        $compareListValue = stripslashes($compareListValue);

        // Second decoding to convert JSON to PHP array
        $compareProdIDs = json_decode($compareListValue, true);
        
        $prod_titles = 
        $prod_descriptions = 
        $prod_images = 
        $prod_descriptions = 
        $prod_images = 
        $_model_names =
        $_power_supplies =
        $_form_factors =
        $_switching_capacities =
        $_forwarding_rates =
        $_mac_tables =
        $_warranties =
        [];
        // Get posts based on IDs
        $posts = get_posts(array(
            'post__in' => $compareProdIDs,
            'post_type' => 'product',  // Adjust post type if needed
        ));

        // Check if posts were found
        if (!empty($posts)) {
            foreach ($posts as $post) {
                // Access post information
                $post_id = $post->ID;
                $prod_titles[] = '<div class="wd-compare-remove-action wd-action-btn wd-style-text wd-cross-icon">
                <a href="#" rel="nofollow" class="wd-compare-remove" data-id="' . $post_id . '"onclick="setTimeout(function() {location.reload();}, 4000)">Remove</a></div><h4>'. $post->post_title .'</h4><a href="'. get_permalink($post_id) .'" class="button product_type_simple " >Read More</a>';
                $prod_descriptions[] = $post->post_excerpt;
                $prod_images[] = get_the_post_thumbnail_url($post_id, 'thumbnail');

                $_model_names[] = get_post_meta($post_id, '_model_name', true);
                $_power_supplies[] = get_post_meta($post_id, '_power_supply', true);
                $_form_factors[] = get_post_meta($post_id, '_form_factor', true);
                $_switching_capacities[] = get_post_meta($post_id, '_switching_capacity', true);
                $_forwarding_rates[] = get_post_meta($post_id, '_forwarding_rate', true);
                $_mac_tables[] = get_post_meta($post_id, '_mac_table', true);
                
                $_rack_mount_fw[] = get_post_meta($post_id, '_rack_mount_fw', true);
                $_ngfw_throughput[] = get_post_meta($post_id, '_ngfw_throughput', true);
                $_threat_protection_throughput[] = get_post_meta($post_id, '_threat_protection_throughput', true);
                $_new_sessions_sec[] = get_post_meta($post_id, '_new_sessions_sec', true);
                $_concurrent_sessions[] = get_post_meta($post_id, '_concurrent_sessions', true);

                $_rack_mount[] = get_post_meta($post_id, '_rack_mount', true);
                $_interface[] = get_post_meta($post_id, '_interface', true);

                $_PoE_Option[] = get_post_meta($post_id, '_PoE_Option', true);
                $_Adapter[] = get_post_meta($post_id, '_Adapter', true);
                $_SIP[] = get_post_meta($post_id, '_SIP', true);
                $_Lines[] = get_post_meta($post_id, '_Lines', true);
                $_Conference_Call[] = get_post_meta($post_id, '_Conference_Call', true);
                
                $_Wi_Fi[] = get_post_meta($post_id, '_Wi_Fi', true);
                $_SSID_Security[] = get_post_meta($post_id, '_SSID_Security', true);
                $_Antena[] = get_post_meta($post_id, '_Antena', true);
                $_Mimo_Streams[] = get_post_meta($post_id, '_Mimo_Streams', true);
                $_PoE_Injector[] = get_post_meta($post_id, '_PoE_Injector', true);
                

                $_warranties[] = get_post_meta($post_id, '_warranty', true);
                $_regular_prices[] = get_post_meta($post_id, '_regular_price', true);
            }
        } else {
            echo 'No posts found.';
        }

        $htmlRet='';
        if ($compareProdIDs !== null) {
            // Do something with the PHP array
            
            $htmlRet .=  '<style>.custom_comp_table td{border: 1px solid #ccc;} .wd-compare-table{display:none;} .custom_comp_table tr td img{max-width: 150px;}</style></style><table class="custom_comp_table">';
            //    print_r($compareProdIDs_v);
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Product Image</th>';
                foreach( $prod_images as $prod_image ){
                    if($prod_image){
                        $htmlRet .=     '<td><img src='. $prod_image . '></td>';
                    }else{
                        $htmlRet .=     '<td></td>';
                    }
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Product Title</th>';
                foreach( $prod_titles as $prod_title_k=>$prod_title_v ){
                    $htmlRet .=     '<td>'. $prod_title_v . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Short Description</th>';
                foreach( $prod_descriptions as $prod_description_k=>$prod_description_v ){
                    $htmlRet .=     '<td>'. $prod_description_v . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Model</th>';
                foreach( $_model_names as $_model_name ){
                    $htmlRet .=     '<td>'. $_model_name . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Power Supply</th>';
                foreach( $_power_supplies as $_power_supply ){
                    $htmlRet .=     '<td>'. $_power_supply . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Form Factor</th>';
                foreach( $_form_factors as $_form_factor ){
                    $htmlRet .=     '<td>'. $_form_factor . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Switching Capacity</th>';
                foreach( $_switching_capacities as $_switching_capacity ){
                    $htmlRet .=     '<td>'. $_switching_capacity . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Forwarding Rate</th>';
                foreach( $_forwarding_rates as $_forwarding_rate ){
                    $htmlRet .=     '<td>'. $_forwarding_rate . '</td>';
                }
                $htmlRet .=  '</tr>';

                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>MAC Table</th>';
                foreach( $_mac_tables as $_mac_table ){
                    $htmlRet .=     '<td>'. $_mac_table . '</td>';
                }
                $htmlRet .=  '</tr>';




                
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Rack Mount Fw</th>';
                foreach( $_rack_mount_fw as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Throughput</th>';
                foreach( $_ngfw_throughput as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Threat Protection Throughput</th>';
                foreach( $_threat_protection_throughput as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>New Sessions/Sec</th>';
                foreach( $_new_sessions_sec as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Concurrent Sessions</th>';
                foreach( $_concurrent_sessions as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';



                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Rack Mount</th>';
                foreach( $_rack_mount as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Interface</th>';
                foreach( $_interface as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';


                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>_PoE_Option</th>';
                foreach( $_PoE_Option as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>_Adapter</th>';
                foreach( $_Adapter as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>_SIP</th>';
                foreach( $_SIP as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>_Lines</th>';
                foreach( $_Lines as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Conference_Call</th>';
                foreach( $_Conference_Call as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';

                

                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Wi_Fi</th>';
                foreach( $_Wi_Fi as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>SSID_Security</th>';
                foreach( $_SSID_Security as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Antena</th>';
                foreach( $_Antena as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Mimo_Streams</th>';
                foreach( $_Mimo_Streams as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>PoE_Injector</th>';
                foreach( $_PoE_Injector as $_table_data ){
                    $htmlRet .=     '<td>'. $_table_data . '</td>';
                }
                $htmlRet .=  '</tr>';




                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Warranty</th>';
                foreach( $_warranties as $_warranty ){
                    $htmlRet .=     '<td>'. $_warranty . '</td>';
                }
                $htmlRet .=  '</tr>';

                $htmlRet .=  '<tr>';
                $htmlRet .=     '<th>Price:</th>';
                foreach( $_regular_prices as $_regular_price ){
                    $htmlRet .=     '<td>'. $_regular_price . '</td>';
                }
                $htmlRet .=  '</tr>';
                $htmlRet .= '</table>';

            /*
            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'p' => ,   // id of the post you want to query
            );
            $my_posts = new WP_Query($args);  
        
           if($my_posts->have_posts()){
        
                while ( $my_posts->have_posts() ) { $my_posts->the_post(); 
        
                //  get_template_part( 'template-parts/content', 'post' ); //Your Post Content comes here
        
                  } //end the while loop
            }
            */


            foreach( $compareProdIDs as $compareProdIDs_k => $compareProdIDs_v ){




                
            //    foreach( $compareProdIDs_v as $compareProdIDs_v_k => $compareProdIDs_v_v ){
            //        $htmlRet .=  '<td>'.$compareProdIDs_v_v.'</td>';
            //    }
            }

        } else {
            // Capture and display the JSON decoding error
            echo 'Error decoding JSON: ' . json_last_error_msg();
        }
        echo $htmlRet;
    } else {
        echo 'woodmart_compare_list cookie is not set.';
    }

}
add_shortcode('custom_product_compare', 'ntn_sc_product_compare');
