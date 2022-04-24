<div id="datatables-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <div class="datatables-boxshadow">
                
                <div class="dropdown-button-group pt-10 d-xsm-none d-sm-none d-md-block d-lg-block d-xlg-block">


                <?php
                    $property = new WP_Query(array(
                        'post_type' =>  'property',
                        'order'     => 'ASC',
                        'per_page'  => 3,
                    ));

                    $property_val_arr = array();
                    $table_row = '';
                    $nonce = wp_create_nonce("filter_nonce");
                ?>

                <?php while ( $property->have_posts() ) : $property->the_post();
                        $discount = ( (int) get_field('discount') > 0) ? get_field('discount') . '%' : '';
                        $active_class = ( (int) get_field('discount') > 0) ? 'class="active"' . '' : '';

                        $table_row .= '
                        <tr '. $active_class .'>
                            <td>-'. $discount .'</td>
                            <td>'. get_field('house_no') .'</td>
                            <td>'. get_field('area_m2') .'</td>
                            <td>'. get_field('number_of_rooms') .'</td>
                            <td>'. get_field('window_orientation') .'</td>
                            <td>'. get_field('completion') .'</td>
                        </tr>
                        ';

                        $property_val_arr['discount'][] = $discount;
                        $property_val_arr['house_no'][] = get_field('house_no');
                        $property_val_arr['area_m2'][] = get_field('area_m2');
                        $property_val_arr['number_of_rooms'][] = get_field('number_of_rooms');
                        $property_val_arr['window_orientation'][] = get_field('window_orientation');
                        $property_val_arr['completion'][] = get_field('completion');
                    endwhile;
                    
                    foreach($property_val_arr as $property_key => $property_val){
                        $property_val_arr[$property_key] = array_unique( $property_val_arr[$property_key] );
                    }
                ?>

                <div class="ml-4 mr-4 dropdown">
                    <a href="javascript:void(0)" class="button button-primary button-round">Plotas <i class="fa-solid fa-chevron-down fa-lg pl-6"></i><i class="fa-solid fa-chevron-up fa-lg pl-6"></i></a>
                    <div class="dropdown-content box-shadow">
                    <ul id="area_m2" data-nonce="<?= $nonce ?>">
                        <?php
                            foreach($property_val_arr['area_m2'] as $item)
                            {
                                echo '<li value="'. $item .'">' . $item . '</li>';
                            }
                        ?>
                    </ul>
                    </div>
                </div>
                
                <div class="ml-4 mr-4 dropdown">
                    <a href="javascript:void(0)" class="button button-primary button-round">Kambarių skaičius <i class="fa-solid fa-chevron-down fa-lg pl-6"></i><i class="fa-solid fa-chevron-up fa-lg pl-6"></i></a>
                    <div class="dropdown-content box-shadow">
                    <ul id="number_of_rooms" data-nonce="<?= $nonce ?>">
                        <?php
                            foreach($property_val_arr['number_of_rooms'] as $item)
                            {
                                echo '<li value="'. $item .'">' . $item . '</li>';
                            }
                        ?>
                    </ul>
                    </div>
                </div>
                
                <div class="ml-4 mr-4 dropdown">
                    <a href="javascript:void(0)" class="button button-primary button-round">Langų orientacija <i class="fa-solid fa-chevron-down fa-lg pl-6"></i><i class="fa-solid fa-chevron-up fa-lg pl-6"></i></a>
                    <div class="dropdown-content box-shadow">
                    <ul id="window_orientation" data-nonce="<?= $nonce ?>">
                        <?php
                            foreach($property_val_arr['window_orientation'] as $item)
                            {
                                echo '<li value="'. $item .'">' . $item . '</li>';
                            }
                        ?>
                    </ul>
                    </div>
                </div>
                
                <div class="ml-4 mr-4 dropdown">
                    <a href="javascript:void(0)" class="button button-primary button-round">Baigtumas <i class="fa-solid fa-chevron-down fa-lg pl-6"></i><i class="fa-solid fa-chevron-up fa-lg pl-6"></i></a>
                    <div class="dropdown-content box-shadow">
                    <ul id="completion" data-nonce="<?= $nonce ?>">
                        <?php
                            foreach($property_val_arr['completion'] as $item)
                            {
                                echo '<li value="'. $item .'">' . $item . '</li>';
                            }
                        ?>
                    </ul>
                    </div>
                </div>

                
                </div>

                <div class="table-container">
                <table id="property-table" class="mt-5 table">
                    <thead>
                    <tr>
                        <td>Nuolaida</td>
                        <td>Namo nr.</td>
                        <td>Plotas m2</td>
                        <td>Kambarių skaičius</td>
                        <td>Langų orientacija</td>
                        <td>Baigtumas</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?= $table_row ?>
                    </tbody>
                </table>
                </div>

            </div>
            </div>
        </div>
    </div>
</div>