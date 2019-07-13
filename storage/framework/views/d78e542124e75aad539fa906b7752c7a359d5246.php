<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo e(asset('').auth()->guard('admin')->user()->image); ?>" class="img-circle"
          alt="<?php echo e(auth()->guard('admin')->user()->first_name); ?> <?php echo e(auth()->guard('admin')->user()->last_name); ?> Image">
      </div>
      <div class="pull-left info">
        <p><?php echo e(auth()->guard('admin')->user()->first_name); ?> <?php echo e(auth()->guard('admin')->user()->last_name); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('labels.online')); ?></a>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header"><?php echo e(trans('labels.navigation')); ?></li>
      <li class="treeview <?php echo e(Request::is('admin/dashboard/this_month') ? 'active' : ''); ?>">
        <a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>">
          <i class="fa fa-dashboard"></i> <span><?php echo e(trans('labels.header_dashboard')); ?></span>
        </a>
      </li>

      <li class="treeview 
        <?php echo e(Request::is('admin/languages') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/addlanguages') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/editlanguages/*') ? 'active' : ''); ?> ">
        <a href="<?php echo e(URL::to('admin/languages')); ?>">
          <i class="fa fa-language" aria-hidden="true"></i> <span> <?php echo e(trans('labels.languages')); ?> </span>
        </a>
      </li>

      

      <li class="treeview 
        <?php echo e(Request::is('admin/listingManufacturer') ? 'active' : ''); ?>

        <?php echo e(Request::is('admin/view_addManufacturer') ? 'active' : ''); ?>

        <?php echo e(Request::is('admin/view_editManufacturer/*') ? 'active' : ''); ?>

        <?php echo e(Request::is('admin/addManufacturer/*') ? 'active' : ''); ?>

        <?php echo e(Request::is('admin/updateManufacturer/*') ? 'active' : ''); ?>

        <?php echo e(Request::is('admin/deleteManufacturer/*') ? 'active' : ''); ?> ">
        <a href="<?php echo e(URL::to('admin/listingManufacturer')); ?>">
          <i class="fa fa-industry" aria-hidden="true"></i> <span><?php echo e(trans('labels.link_manufacturer')); ?></span>
        </a>
      </li>


      <li class="treeview 
          <?php echo e(Request::is('admin/listingCategory') ? 'active' : ''); ?> 
          <?php echo e(Request::is('admin/view_addCategory') ? 'active' : ''); ?>

          <?php echo e(Request::is('admin/view_editCategory/*') ? 'active' : ''); ?> 
          <?php echo e(Request::is('admin/listingSubCategory') ? 'active' : ''); ?> 
          <?php echo e(Request::is('admin/view_addSubCategory') ? 'active' : ''); ?>

          <?php echo e(Request::is('admin/view_editSubCategory/*') ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa fa-bars" aria-hidden="true"></i>
          <span><?php echo e(trans('labels.link_categories')); ?> </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="
            <?php echo e(Request::is('admin/listingCategory') ? 'active' : ''); ?>

            <?php echo e(Request::is('admin/view_addCategory') ? 'active' : ''); ?> 
            <?php echo e(Request::is('admin/view_editCategory/*') ? 'active' : ''); ?>">
            <a href="<?php echo e(URL::to('admin/listingCategory')); ?>">
              <i class="fa fa-circle-o"></i>
              <?php echo e(trans('labels.link_main_categories')); ?>

            </a>
          </li>
          <li class="<?php echo e(Request::is('admin/listingSubCategory') ? 'active' : ''); ?>  
            <?php echo e(Request::is('admin/view_addSubCategory') ? 'active' : ''); ?>  
            <?php echo e(Request::is('admin/view_editSubCategory/*') ? 'active' : ''); ?>">
            <a href="<?php echo e(URL::to('admin/listingSubCategory')); ?>">
              <i class="fa fa-circle-o"></i>
              <?php echo e(trans('labels.link_sub_categories')); ?>

            </a>
          </li>
        </ul>
      </li>

      <li
        class="treeview 
        <?php echo e(Request::is('admin/listingProduct') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/view_addProduct') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/view_editProduct/*') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/addProduct') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/updateProduct/*') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/deleteProduct/*') ? 'active' : ''); ?>  

        <?php echo e(Request::is('admin/listingProductOption') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/view_addProductOption') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/view_editProductOption/*') ? 'active' : ''); ?>

        <?php echo e(Request::is('admin/addProductOption') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/updateProductOption') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/deleteProductOption') ? 'active' : ''); ?>


        <?php echo e(Request::is('admin/listingProductOptionValue') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/view_addProductOptionValue') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/view_editProductOptionValue/*') ? 'active' : ''); ?>

        <?php echo e(Request::is('admin/addProductOptionValue') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/updateProductOptionValue') ? 'active' : ''); ?> 
        <?php echo e(Request::is('admin/deleteProductOptionValue') ? 'active' : ''); ?>  

        <?php echo e(Request::is('admin/attributes') ? 'active' : ''); ?>  
        <?php echo e(Request::is('admin/addattributes') ? 'active' : ''); ?>  
        <?php echo e(Request::is('admin/editattributes/*') ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa fa-database"></i> <span><?php echo e(trans('labels.link_products')); ?></span> <i
            class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li
            class="
            <?php echo e(Request::is('admin/listingProduct') ? 'active' : ''); ?> 
            <?php echo e(Request::is('admin/view_addProduct') ? 'active' : ''); ?> 
            <?php echo e(Request::is('admin/view_editProduct/*') ? 'active' : ''); ?>">
            <a href="<?php echo e(URL::to('admin/listingProduct')); ?>">
              <i class="fa fa-circle-o"></i>
              <?php echo e(trans('labels.link_all_products')); ?>

            </a>
          </li>
          <li
            class="
            <?php echo e(Request::is('admin/listingProductOption') ? 'active' : ''); ?> 
            <?php echo e(Request::is('admin/view_addProductOption') ? 'active' : ''); ?> 
            <?php echo e(Request::is('admin/view_editProductOption/*') ? 'active' : ''); ?>

            <?php echo e(Request::is('admin/addProductOption') ? 'active' : ''); ?> 
            <?php echo e(Request::is('admin/updateProductOption') ? 'active' : ''); ?> 
            <?php echo e(Request::is('admin/deleteProductOption') ? 'active' : ''); ?>  ">
            <a href="<?php echo e(URL::to('admin/listingProductOption')); ?>">
              <i class="fa fa-circle-o"></i>
              Option
            </a>
          </li>
          <li
            class="
            <?php echo e(Request::is('admin/listingProductOptionValue') ? 'active' : ''); ?> 
            <?php echo e(Request::is('admin/view_addProductOptionValue') ? 'active' : ''); ?> 
            <?php echo e(Request::is('admin/view_editProductOptionValue/*') ? 'active' : ''); ?>

            <?php echo e(Request::is('admin/addProductOptionValue') ? 'active' : ''); ?> 
            <?php echo e(Request::is('admin/updateProductOptionValue') ? 'active' : ''); ?> 
            <?php echo e(Request::is('admin/deleteProductOptionValue') ? 'active' : ''); ?>  
            ">
            <a href="<?php echo e(URL::to('admin/listingProductOptionValue')); ?>">
              <i class="fa fa-circle-o"></i>
              Option Value
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview 
          <?php echo e(Request::is('admin/listingCustomer') ? 'active' : ''); ?>  
          <?php echo e(Request::is('admin/addCustomers') ? 'active' : ''); ?> 
          <?php echo e(Request::is('admin/editCustomers/*') ? 'active' : ''); ?>">
        <a href="<?php echo e(URL::to('admin/listingCustomer')); ?>">
          <i class="fa fa-users" aria-hidden="true"></i>
          <span><?php echo e(trans('labels.link_customers')); ?></span>
        </a>
      </li>
      <li class="treeview 
                      <?php echo e(Request::is('admin/listingCountry') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/view_addCountry') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/view_editCountry/*') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/addCountry') ? 'active' : ''); ?>   
                      <?php echo e(Request::is('admin/updateCountry/*') ? 'active' : ''); ?>   
                      <?php echo e(Request::is('admin/deleteCountry') ? 'active' : ''); ?>                    
                      <?php echo e(Request::is('admin/listingCity') ? 'active' : ''); ?>

                      <?php echo e(Request::is('admin/addCity') ? 'active' : ''); ?>

                      <?php echo e(Request::is('admin/addNewCity') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/editCity/*') ? 'active' : ''); ?>

                      <?php echo e(Request::is('admin/deleteCity') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/listingArea') ? 'active' : ''); ?>

                      <?php echo e(Request::is('admin/addArea') ? 'active' : ''); ?>

                      <?php echo e(Request::is('admin/addNewArea') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/editArea/*') ? 'active' : ''); ?>

                      <?php echo e(Request::is('admin/deleteArea') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/listingDistrict') ? 'active' : ''); ?>

                      <?php echo e(Request::is('admin/addDistrict') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/addNewDistrict') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/editDistrict/*') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/deleteDistrict') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/listingZone') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/addZone') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/addNewZone') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/editZone/*') ? 'active' : ''); ?>

                      <?php echo e(Request::is('admin/deleteZone') ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa fa-money" aria-hidden="true"></i>
          <span><?php echo e(trans('labels.location')); ?></span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo e(Request::is('admin/listingCountry') ? 'active' : ''); ?> 
                        <?php echo e(Request::is('admin/view_addCountry') ? 'active' : ''); ?> 
                        <?php echo e(Request::is('admin/view_editCountry/*') ? 'active' : ''); ?> 
                        <?php echo e(Request::is('admin/addCountry') ? 'active' : ''); ?> 
                        <?php echo e(Request::is('admin/updateCountry/*') ? 'active' : ''); ?>

                        <?php echo e(Request::is('admin/deleteCountry') ? 'active' : ''); ?> ">
            <a href="<?php echo e(URL::to('admin/listingCountry')); ?>">
              <i class="fa fa-circle-o"></i>
              <?php echo e(trans('labels.link_countries')); ?>

            </a>
          </li>
          <li class="<?php echo e(Request::is('admin/listingCity') ? 'active' : ''); ?> 
                       <?php echo e(Request::is('admin/addCity') ? 'active' : ''); ?>

                       <?php echo e(Request::is('admin/editCity?*') ? 'active' : ''); ?>

                       <?php echo e(Request::is('admin/deleteCity') ? 'active' : ''); ?>">
            <a href="<?php echo e(URL::to('admin/listingCity')); ?>">
              <i class="fa fa-circle-o"></i>
              <?php echo e(trans('labels.cities')); ?>

            </a>
          </li>
          <li class="<?php echo e(Request::is('admin/listingArea') ? 'active' : ''); ?> 
                       <?php echo e(Request::is('admin/addArea') ? 'active' : ''); ?>

                       <?php echo e(Request::is('admin/addNewArea') ? 'active' : ''); ?> 
                       <?php echo e(Request::is('admin/editArea/*') ? 'active' : ''); ?>

                       <?php echo e(Request::is('admin/deleteArea') ? 'active' : ''); ?>">
            <a href="<?php echo e(URL::to('admin/listingArea')); ?>">
              <i class="fa fa-circle-o"></i>
              <?php echo e(trans('labels.link_area')); ?>

            </a>
          </li>
          <li class="<?php echo e(Request::is('admin/listingDistrict') ? 'active' : ''); ?> 
                       <?php echo e(Request::is('admin/addDistrict') ? 'active' : ''); ?> 
                       <?php echo e(Request::is('admin/addNewDistrict') ? 'active' : ''); ?> 
                       <?php echo e(Request::is('admin/editDistrict/*') ? 'active' : ''); ?>

                       <?php echo e(Request::is('admin/deleteDistrict') ? 'active' : ''); ?> ">
            <a href="<?php echo e(URL::to('admin/listingDistrict')); ?>">
              <i class="fa fa-circle-o"></i>
              <?php echo e(trans('labels.link_district')); ?>

            </a>
          </li>
          <li class="<?php echo e(Request::is('admin/listingZone') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/addZone') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/addNewZone') ? 'active' : ''); ?> 
                      <?php echo e(Request::is('admin/editZone/*') ? 'active' : ''); ?>

                      <?php echo e(Request::is('admin/deleteZone') ? 'active' : ''); ?>">
            <a href="<?php echo e(URL::to('admin/listingZone')); ?>">
              <i class="fa fa-circle-o"></i>
              <?php echo e(trans('labels.link_zones')); ?>

            </a>
          </li>
        </ul>
      </li>

      

      

      <li
        class="treeview 
          <?php echo e(Request::is('admin/listingOrder') ? 'active' : ''); ?> 
          <?php echo e(Request::is('admin/view_addOrder') ? 'active' : ''); ?> 
          <?php echo e(Request::is('admin/view_editOrder/*') ? 'active' : ''); ?>">
        <a href="<?php echo e(URL::to('admin/listingOrder')); ?>">
          <i class="fa fa-list-ul" aria-hidden="true"></i> <span>
            <?php echo e(trans('labels.link_orders')); ?></span>
        </a>
      </li>

      

      

      

      

      

      
    </ul>
  </section>
</aside>