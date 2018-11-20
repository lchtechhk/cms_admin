<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo e(asset('').auth()->guard('admin')->user()->image); ?>" class="img-circle" alt="<?php echo e(auth()->guard('admin')->user()->first_name); ?> <?php echo e(auth()->guard('admin')->user()->last_name); ?> Image">
        </div>
        <div class="pull-left info">
          <p><?php echo e(auth()->guard('admin')->user()->first_name); ?> <?php echo e(auth()->guard('admin')->user()->last_name); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('labels.online')); ?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><?php echo e(trans('labels.navigation')); ?></li>
        <li class="treeview <?php echo e(Request::is('admin/dashboard/this_month') ? 'active' : ''); ?>">
          <a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>">
            <i class="fa fa-dashboard"></i> <span><?php echo e(trans('labels.header_dashboard')); ?></span>
          </a>
        </li>
        
        <li class="treeview <?php echo e(Request::is('admin/languages') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addlanguages') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editlanguages/*') ? 'active' : ''); ?> ">
          <a href="<?php echo e(URL::to('admin/languages')); ?>">
            <i class="fa fa-language" aria-hidden="true"></i> <span> <?php echo e(trans('labels.languages')); ?> </span>
          </a>
        </li>
        
        
        <li class="treeview <?php echo e(Request::is('admin/manufacturers') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addmanufacturer') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editmanufacturer/*') ? 'active' : ''); ?> ">
          <a href="<?php echo e(URL::to('admin/manufacturers')); ?>">
            <i class="fa fa-industry" aria-hidden="true"></i> <span><?php echo e(trans('labels.link_manufacturer')); ?></span>
          </a>
        </li>
        
        <li class="treeview <?php echo e(Request::is('admin/categories') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addcategory') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editCategory/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/subcategories') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addsubcategory') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editsubcategory/*') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-bars" aria-hidden="true"></i>
<span><?php echo e(trans('labels.link_categories')); ?> </span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          	<li class="<?php echo e(Request::is('admin/categories') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addcategory') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editcategory/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/categories')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_main_categories')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/subcategories') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addsubcategory') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editsubcategory/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/subcategories')); ?>"><i class="fa fa-circle-o"></i><?php echo e(trans('labels.link_sub_categories')); ?></a></li>
          </ul>
        </li>
        
        <li class="treeview <?php echo e(Request::is('admin/products') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addproduct') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editattributes/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/attributes') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addattributes') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editattributes/*') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-database"></i> <span><?php echo e(trans('labels.link_products')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e(Request::is('admin/products') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addproduct') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editproduct/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/products')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_all_products')); ?></a></li>
            
            <li class="<?php echo e(Request::is('admin/attributes') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addattributes') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editattributes/*') ? 'active' : ''); ?>" ><a href="<?php echo e(URL::to('admin/attributes' )); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.products_attributes')); ?></a></li>
          </ul>
        </li>
        
        <li class="treeview <?php echo e(Request::is('admin/newscategories') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addnewscategory') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editnewscategory/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/news') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addsubnews') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editsubnews/*') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-database" aria-hidden="true"></i>
<span><?php echo e(trans('labels.link_news')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          	<li class="<?php echo e(Request::is('admin/newscategories') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addnewscategory') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editnewscategory/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/newscategories')); ?>"><i class="fa fa-circle-o"></i><?php echo e(trans('labels.link_news_categories')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/news') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addsubnews') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editsubnews/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/news')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_sub_news')); ?></a></li>
          </ul>
        </li>
        
        <li class="treeview <?php echo e(Request::is('admin/customers') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addcustomers') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editcustomers/*') ? 'active' : ''); ?>">
          <a href="<?php echo e(URL::to('admin/customers')); ?>">
            <i class="fa fa-users" aria-hidden="true"></i> <span><?php echo e(trans('labels.link_customers')); ?></span>
          </a>
        </li>
        
        
        <li class="treeview <?php echo e(Request::is('admin/countries') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addcountry') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editcountry/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/listingZones') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addZone') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editZone/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/taxclass') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addtaxclass') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editTaxClass/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/taxrates') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addtaxrate') ? 'active' : ''); ?> <?php echo e(Request::is('admin/edittaxrate/*') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-money" aria-hidden="true"></i>
<span><?php echo e(trans('labels.link_tax_location')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e(Request::is('admin/countries') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addcountry') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editcountry/*') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/countries')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_countries')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/taxclass') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addtaxclass') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editTaxClass/*') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/taxclass')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_tax_classes')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/taxrates') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addtaxrate') ? 'active' : ''); ?> <?php echo e(Request::is('admin/edittaxrate/*') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/taxrates')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_tax_rates')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/listingZones') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addZone') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editZone/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/listingZones')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_zones')); ?></a></li>
          </ul>
        </li>
        <li class="treeview <?php echo e(Request::is('admin/coupons') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editcoupons/*') ? 'active' : ''); ?>">
          <a href="<?php echo e(URL::to('admin/coupons')); ?>" ><i class="fa fa-tablet" aria-hidden="true"></i> <span><?php echo e(trans('labels.link_coupons')); ?></span></a>
        </li>
        
        <li class="treeview <?php echo e(Request::is('admin/devices') ? 'active' : ''); ?> <?php echo e(Request::is('admin/viewdevices/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/notifications') ? 'active' : ''); ?>">
          <a href="<?php echo e(URL::to('admin/devices')); ?> ">
            <i class="fa fa-bell-o" aria-hidden="true"></i>
<span><?php echo e(trans('labels.link_notifications')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e(Request::is('admin/devices') ? 'active' : ''); ?> <?php echo e(Request::is('admin/viewdevices/*') ? 'active' : ''); ?>">
          		<a href="<?php echo e(URL::to('admin/devices')); ?>"><i class="fa fa-circle-o"></i><?php echo e(trans('labels.link_devices')); ?> </a>
            </li>  
            <li class="<?php echo e(Request::is('admin/notifications') ? 'active' : ''); ?> ">
            	<a href="<?php echo e(URL::to('admin/notifications')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_send_notifications')); ?></a>
            </li>      
          </ul>
        </li>
        
        <li class="treeview <?php echo e(Request::is('admin/orders') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addOrders') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/vieworder/*') ? 'active' : ''); ?>">
          <a href="<?php echo e(URL::to('admin/orders')); ?>" ><i class="fa fa-list-ul" aria-hidden="true"></i> <span> <?php echo e(trans('labels.link_orders')); ?></span>
          </a>
        </li>
        <li class="treeview <?php echo e(Request::is('admin/shippingmethods') ? 'active' : ''); ?> <?php echo e(Request::is('admin/upsShipping') ? 'active' : ''); ?> <?php echo e(Request::is('admin/flateRate') ? 'active' : ''); ?>">
          <a href="<?php echo e(URL::to('admin/shippingmethods')); ?>"><i class="fa fa-truck" aria-hidden="true"></i> <span> <?php echo e(trans('labels.link_shipping_methods')); ?></span>
          </a>
        </li>
        
        <li class="treeview <?php echo e(Request::is('admin/paymentsetting') ? 'active' : ''); ?>">
          <a  href="<?php echo e(URL::to('admin/paymentsetting')); ?>"><i class="fa fa-credit-card" aria-hidden="true"></i> <span>
          <?php echo e(trans('labels.link_payment_methods')); ?></span>
          </a>
        </li>
        
        <li class="treeview <?php echo e(Request::is('admin/statscustomers') ? 'active' : ''); ?> <?php echo e(Request::is('admin/productsstock') ? 'active' : ''); ?> <?php echo e(Request::is('admin/statsproductspurchased') ? 'active' : ''); ?> <?php echo e(Request::is('admin/statsproductsliked') ? 'active' : ''); ?> ">
          <a href="#">
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
<span><?php echo e(trans('labels.link_reports')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e(Request::is('admin/productsstock') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/productsstock')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_products_stock')); ?></a></li>  
            <li class="<?php echo e(Request::is('admin/statscustomers') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/statscustomers')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_customer_orders_total')); ?></a></li>             
            <li class="<?php echo e(Request::is('admin/statsproductspurchased') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/statsproductspurchased')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_total_purchased')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/statsproductsliked') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/statsproductsliked')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_products_liked')); ?></a></li>
          </ul>
        </li>
        <?php if($web_setting[67]->value=='1'): ?>
        <li class="treeview <?php echo e(Request::is('admin/sliders') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addsliderimage') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editslide/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/webpages') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addwebpage') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editwebpage/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/websettings') ? 'active' : ''); ?> <?php echo e(Request::is('admin/webthemes') ? 'active' : ''); ?> <?php echo e(Request::is('admin/customstyle') ? 'active' : ''); ?> ">
          <a href="#">
            <i class="fa fa-gears" aria-hidden="true"></i>
<span> <?php echo e(trans('labels.link_site_settings')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e(Request::is('admin/sliders') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addsliderimage') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editslide/*') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/sliders')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_Sliders')); ?></a></li>
          
            <li class="<?php echo e(Request::is('admin/webpages') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addwebpage') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editwebpage/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/webpages')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.content_pages')); ?></a></li>
            
            <li class="<?php echo e(Request::is('admin/webthemes') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/webthemes')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.website_themes')); ?></a></li>
            
            <li class="<?php echo e(Request::is('admin/seo') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/seo')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.seo content')); ?></a></li>
            
            <li class="<?php echo e(Request::is('admin/customstyle') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/customstyle')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.custom_style_js')); ?></a></li>
            
            <li class="<?php echo e(Request::is('admin/websettings') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/websettings')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_setting')); ?></a></li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if($web_setting[66]->value=='1'): ?>
        <li class="treeview <?php echo e(Request::is('admin/banners') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addbanner') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editbanner/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/pages') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addpage') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editpage/*') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/appSettings') ? 'active' : ''); ?> <?php echo e(Request::is('admin/admobSettings') ? 'active' : ''); ?> <?php echo e(Request::is('admin/applabel') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addappkey') ? 'active' : ''); ?> <?php echo e(Request::is('admin/applicationapi') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-gears" aria-hidden="true"></i>
<span> <?php echo e(trans('labels.link_app_settings')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e(Request::is('admin/banners') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addbanner') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editbanner/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/banners')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_Banners')); ?></a></li>
                       
            <li class="<?php echo e(Request::is('admin/pages') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addpage') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editpage/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/pages')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.content_pages')); ?></a></li>
            
            <li class="<?php echo e(Request::is('admin/admobSettings') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/admobSettings')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_admob')); ?></a></li>
            
            <li class="android-hide <?php echo e(Request::is('admin/applabel') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addappkey') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/applabel')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.labels')); ?></a></li>
                                  
            <li class="<?php echo e(Request::is('admin/applicationapi') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/applicationapi')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.applicationApi')); ?></a></li>
            
            <li class="<?php echo e(Request::is('admin/appsettings') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/appsettings')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_setting')); ?></a></li>
            
          </ul>
        </li>
        <?php endif; ?>
        
        
        <li class="treeview <?php echo e(Request::is('admin/facebooksettings') ? 'active' : ''); ?> <?php echo e(Request::is('admin/setting') ? 'active' : ''); ?> <?php echo e(Request::is('admin/googlesettings') ? 'active' : ''); ?> <?php echo e(Request::is('admin/pushnotification') ? 'active' : ''); ?> <?php echo e(Request::is('admin/orderstatus') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addorderstatus') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editorderstatus/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/alertsetting') ? 'active' : ''); ?> <?php echo e(Request::is('admin/units') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addunit') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editunit/*') ? 'active' : ''); ?> ">
          <a href="#">
            <i class="fa fa-gears" aria-hidden="true"></i>
<span> <?php echo e(trans('labels.link_general_settings')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          	<li class="<?php echo e(Request::is('admin/units') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addunit') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editunit/*') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/units')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_units')); ?></a></li>
          	<li class="<?php echo e(Request::is('admin/orderstatus') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addorderstatus') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editorderstatus/*') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/orderstatus')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_order_status')); ?></a></li>
          	<li class="<?php echo e(Request::is('admin/facebooksettings') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/facebooksettings')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_facebook')); ?></a></li>
            
            <li class="<?php echo e(Request::is('admin/googlesettings') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/googlesettings')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_google')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/pushnotification') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/pushnotification')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_push_notification')); ?></a></li>
             <li class="<?php echo e(Request::is('admin/alertsetting') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/alertsetting')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.alertSetting')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/setting') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/setting')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_setting')); ?></a></li>
            
          </ul>
        </li>
        
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>