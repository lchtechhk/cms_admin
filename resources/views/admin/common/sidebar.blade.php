<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('').auth()->guard('admin')->user()->image}}" class="img-circle"
          alt="{{ auth()->guard('admin')->user()->first_name }} {{ auth()->guard('admin')->user()->last_name }} Image">
      </div>
      <div class="pull-left info">
        <p>{{ auth()->guard('admin')->user()->first_name }} {{ auth()->guard('admin')->user()->last_name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('labels.online') }}</a>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">{{ trans('labels.navigation') }}</li>
      <li class="treeview {{ Request::is('admin/dashboard/this_month') ? 'active' : '' }}">
        <a href="{{ URL::to('admin/dashboard/this_month')}}">
          <i class="fa fa-dashboard"></i> <span>{{ trans('labels.header_dashboard') }}</span>
        </a>
      </li>

      <li class="treeview 
        {{ Request::is('admin/languages') ? 'active' : '' }} 
        {{ Request::is('admin/addlanguages') ? 'active' : '' }} 
        {{ Request::is('admin/editlanguages/*') ? 'active' : '' }} ">
        <a href="{{ URL::to('admin/languages')}}">
          <i class="fa fa-language" aria-hidden="true"></i> <span> {{ trans('labels.languages') }} </span>
        </a>
      </li>

      {{-- <li class="treeview 
        {{ Request::is('admin/manufacturers') ? 'active' : '' }}
        {{ Request::is('admin/addmanufacturer') ? 'active' : '' }}
        {{ Request::is('admin/editmanufacturer/*') ? 'active' : '' }} ">
        <a href="{{ URL::to('admin/manufacturers')}}">
          <i class="fa fa-industry" aria-hidden="true"></i> <span>{{ trans('labels.link_manufacturer') }}</span>
        </a>
      </li> --}}

      <li class="treeview 
        {{ Request::is('admin/listingManufacturer') ? 'active' : '' }}
        {{ Request::is('admin/view_addManufacturer') ? 'active' : '' }}
        {{ Request::is('admin/view_editManufacturer/*') ? 'active' : '' }}
        {{ Request::is('admin/addManufacturer/*') ? 'active' : '' }}
        {{ Request::is('admin/updateManufacturer/*') ? 'active' : '' }}
        {{ Request::is('admin/deleteManufacturer/*') ? 'active' : '' }} ">
        <a href="{{ URL::to('admin/listingManufacturer')}}">
          <i class="fa fa-industry" aria-hidden="true"></i> <span>{{ trans('labels.link_manufacturer') }}</span>
        </a>
      </li>


      <li class="treeview 
          {{ Request::is('admin/listingCategory') ? 'active' : '' }} 
          {{ Request::is('admin/view_addCategory') ? 'active' : '' }}
          {{ Request::is('admin/view_editCategory/*') ? 'active' : '' }} 
          {{ Request::is('admin/listingSubCategory') ? 'active' : '' }} 
          {{ Request::is('admin/view_addSubCategory') ? 'active' : '' }}
          {{ Request::is('admin/view_editSubCategory/*') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-bars" aria-hidden="true"></i>
          <span>{{ trans('labels.link_categories') }} </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="
            {{ Request::is('admin/listingCategory') ? 'active' : '' }}
            {{ Request::is('admin/view_addCategory') ? 'active' : '' }} 
            {{ Request::is('admin/view_editCategory/*') ? 'active' : '' }}">
            <a href="{{ URL::to('admin/listingCategory')}}">
              <i class="fa fa-circle-o"></i>
              {{ trans('labels.link_main_categories') }}
            </a>
          </li>
          <li class="{{ Request::is('admin/listingSubCategory') ? 'active' : '' }}  
            {{ Request::is('admin/view_addSubCategory') ? 'active' : '' }}  
            {{ Request::is('admin/view_editSubCategory/*') ? 'active' : '' }}">
            <a href="{{ URL::to('admin/listingSubCategory')}}">
              <i class="fa fa-circle-o"></i>
              {{ trans('labels.link_sub_categories') }}
            </a>
          </li>
        </ul>
      </li>

      <li
        class="treeview 
        {{ Request::is('admin/listingProduct') ? 'active' : '' }} 
        {{ Request::is('admin/view_addProduct') ? 'active' : '' }} 
        {{ Request::is('admin/view_editProduct/*') ? 'active' : '' }} 
        {{ Request::is('admin/addProduct') ? 'active' : '' }} 
        {{ Request::is('admin/updateProduct/*') ? 'active' : '' }} 
        {{ Request::is('admin/deleteProduct/*') ? 'active' : '' }}  

        {{ Request::is('admin/listingProductOption') ? 'active' : '' }} 
        {{ Request::is('admin/view_addProductOption') ? 'active' : '' }} 
        {{ Request::is('admin/view_editProductOption/*') ? 'active' : '' }}
        {{ Request::is('admin/addProductOption') ? 'active' : '' }} 
        {{ Request::is('admin/updateProductOption') ? 'active' : '' }} 
        {{ Request::is('admin/deleteProductOption') ? 'active' : '' }}

        {{ Request::is('admin/listingProductOptionValue') ? 'active' : '' }} 
        {{ Request::is('admin/view_addProductOptionValue') ? 'active' : '' }} 
        {{ Request::is('admin/view_editProductOptionValue/*') ? 'active' : '' }}
        {{ Request::is('admin/addProductOptionValue') ? 'active' : '' }} 
        {{ Request::is('admin/updateProductOptionValue') ? 'active' : '' }} 
        {{ Request::is('admin/deleteProductOptionValue') ? 'active' : '' }}  

        {{ Request::is('admin/attributes') ? 'active' : '' }}  
        {{ Request::is('admin/addattributes') ? 'active' : '' }}  
        {{ Request::is('admin/editattributes/*') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-database"></i> <span>{{ trans('labels.link_products') }}</span> <i
            class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li
            class="
            {{ Request::is('admin/listingProduct') ? 'active' : '' }} 
            {{ Request::is('admin/view_addProduct') ? 'active' : '' }} 
            {{ Request::is('admin/view_editProduct/*') ? 'active' : '' }}">
            <a href="{{ URL::to('admin/listingProduct')}}">
              <i class="fa fa-circle-o"></i>
              {{ trans('labels.link_all_products') }}
            </a>
          </li>
          <li
            class="
            {{ Request::is('admin/listingProductOption') ? 'active' : '' }} 
            {{ Request::is('admin/view_addProductOption') ? 'active' : '' }} 
            {{ Request::is('admin/view_editProductOption/*') ? 'active' : '' }}
            {{ Request::is('admin/addProductOption') ? 'active' : '' }} 
            {{ Request::is('admin/updateProductOption') ? 'active' : '' }} 
            {{ Request::is('admin/deleteProductOption') ? 'active' : '' }}  ">
            <a href="{{ URL::to('admin/listingProductOption')}}">
              <i class="fa fa-circle-o"></i>
              Option
            </a>
          </li>
          <li
            class="
            {{ Request::is('admin/listingProductOptionValue') ? 'active' : '' }} 
            {{ Request::is('admin/view_addProductOptionValue') ? 'active' : '' }} 
            {{ Request::is('admin/view_editProductOptionValue/*') ? 'active' : '' }}
            {{ Request::is('admin/addProductOptionValue') ? 'active' : '' }} 
            {{ Request::is('admin/updateProductOptionValue') ? 'active' : '' }} 
            {{ Request::is('admin/deleteProductOptionValue') ? 'active' : '' }}  
            ">
            <a href="{{ URL::to('admin/listingProductOptionValue')}}">
              <i class="fa fa-circle-o"></i>
              Option Value
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview 
          {{ Request::is('admin/listingCustomer') ? 'active' : '' }}  
          {{ Request::is('admin/addCustomers') ? 'active' : '' }} 
          {{ Request::is('admin/editCustomers/*') ? 'active' : '' }}">
        <a href="{{ URL::to('admin/listingCustomer')}}">
          <i class="fa fa-users" aria-hidden="true"></i>
          <span>{{ trans('labels.link_customers') }}</span>
        </a>
      </li>
      <li class="treeview 
                      {{ Request::is('admin/listingCountry') ? 'active' : '' }} 
                      {{ Request::is('admin/view_addCountry') ? 'active' : '' }} 
                      {{ Request::is('admin/view_editCountry/*') ? 'active' : '' }} 
                      {{ Request::is('admin/addCountry') ? 'active' : '' }}   
                      {{ Request::is('admin/updateCountry/*') ? 'active' : '' }}   
                      {{ Request::is('admin/deleteCountry') ? 'active' : '' }}                    
                      {{ Request::is('admin/listingCity') ? 'active' : '' }}
                      {{ Request::is('admin/addCity') ? 'active' : '' }}
                      {{ Request::is('admin/addNewCity') ? 'active' : '' }} 
                      {{ Request::is('admin/editCity/*') ? 'active' : '' }}
                      {{ Request::is('admin/deleteCity') ? 'active' : '' }} 
                      {{ Request::is('admin/listingArea') ? 'active' : '' }}
                      {{ Request::is('admin/addArea') ? 'active' : '' }}
                      {{ Request::is('admin/addNewArea') ? 'active' : '' }} 
                      {{ Request::is('admin/editArea/*') ? 'active' : '' }}
                      {{ Request::is('admin/deleteArea') ? 'active' : '' }} 
                      {{ Request::is('admin/listingDistrict') ? 'active' : '' }}
                      {{ Request::is('admin/addDistrict') ? 'active' : '' }} 
                      {{ Request::is('admin/addNewDistrict') ? 'active' : '' }} 
                      {{ Request::is('admin/editDistrict/*') ? 'active' : '' }} 
                      {{ Request::is('admin/deleteDistrict') ? 'active' : '' }} 
                      {{ Request::is('admin/listingZone') ? 'active' : '' }} 
                      {{ Request::is('admin/addZone') ? 'active' : '' }} 
                      {{ Request::is('admin/addNewZone') ? 'active' : '' }} 
                      {{ Request::is('admin/editZone/*') ? 'active' : '' }}
                      {{ Request::is('admin/deleteZone') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-money" aria-hidden="true"></i>
          <span>{{ trans('labels.location') }}</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('admin/listingCountry') ? 'active' : '' }} 
                        {{ Request::is('admin/view_addCountry') ? 'active' : '' }} 
                        {{ Request::is('admin/view_editCountry/*') ? 'active' : '' }} 
                        {{ Request::is('admin/addCountry') ? 'active' : '' }} 
                        {{ Request::is('admin/updateCountry/*') ? 'active' : '' }}
                        {{ Request::is('admin/deleteCountry') ? 'active' : '' }} ">
            <a href="{{ URL::to('admin/listingCountry')}}">
              <i class="fa fa-circle-o"></i>
              {{ trans('labels.link_countries') }}
            </a>
          </li>
          <li class="{{ Request::is('admin/listingCity') ? 'active' : '' }} 
                       {{ Request::is('admin/addCity') ? 'active' : '' }}
                       {{ Request::is('admin/editCity?*') ? 'active' : '' }}
                       {{ Request::is('admin/deleteCity') ? 'active' : '' }}">
            <a href="{{ URL::to('admin/listingCity')}}">
              <i class="fa fa-circle-o"></i>
              {{ trans('labels.cities') }}
            </a>
          </li>
          <li class="{{ Request::is('admin/listingArea') ? 'active' : '' }} 
                       {{ Request::is('admin/addArea') ? 'active' : '' }}
                       {{ Request::is('admin/addNewArea') ? 'active' : '' }} 
                       {{ Request::is('admin/editArea/*') ? 'active' : '' }}
                       {{ Request::is('admin/deleteArea') ? 'active' : '' }}">
            <a href="{{ URL::to('admin/listingArea')}}">
              <i class="fa fa-circle-o"></i>
              {{ trans('labels.link_area') }}
            </a>
          </li>
          <li class="{{ Request::is('admin/listingDistrict') ? 'active' : '' }} 
                       {{ Request::is('admin/addDistrict') ? 'active' : '' }} 
                       {{ Request::is('admin/addNewDistrict') ? 'active' : '' }} 
                       {{ Request::is('admin/editDistrict/*') ? 'active' : '' }}
                       {{ Request::is('admin/deleteDistrict') ? 'active' : '' }} ">
            <a href="{{ URL::to('admin/listingDistrict')}}">
              <i class="fa fa-circle-o"></i>
              {{ trans('labels.link_district') }}
            </a>
          </li>
          {{-- <li class="{{ Request::is('admin/listingZone') ? 'active' : '' }} 
                      {{ Request::is('admin/addZone') ? 'active' : '' }} 
                      {{ Request::is('admin/addNewZone') ? 'active' : '' }} 
                      {{ Request::is('admin/editZone/*') ? 'active' : '' }}
                      {{ Request::is('admin/deleteZone') ? 'active' : '' }}">
            <a href="{{ URL::to('admin/listingZone')}}">
              <i class="fa fa-circle-o"></i>
              {{ trans('labels.link_zones') }}
            </a>
          </li> --}}
        </ul>
      </li>

      {{-- <li class="treeview {{ Request::is('admin/coupons') ? 'active' : '' }}
      {{ Request::is('admin/editcoupons/*') ? 'active' : '' }}">
      <a href="{{ URL::to('admin/coupons')}}"><i class="fa fa-tablet" aria-hidden="true"></i>
        <span>{{ trans('labels.link_coupons') }}</span></a>
      </li> --}}

      {{-- <li class="treeview {{ Request::is('admin/devices') ? 'active' : '' }}
      {{ Request::is('admin/viewdevices/*') ? 'active' : '' }}
      {{ Request::is('admin/notifications') ? 'active' : '' }}">
      <a href="{{ URL::to('admin/devices')}} ">
        <i class="fa fa-bell-o" aria-hidden="true"></i>
        <span>{{ trans('labels.link_notifications') }}</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li
          class="{{ Request::is('admin/devices') ? 'active' : '' }} {{ Request::is('admin/viewdevices/*') ? 'active' : '' }}">
          <a href="{{ URL::to('admin/devices')}}"><i class="fa fa-circle-o"></i>{{ trans('labels.link_devices') }} </a>
        </li>
        <li class="{{ Request::is('admin/notifications') ? 'active' : '' }} ">
          <a href="{{ URL::to('admin/notifications') }}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_send_notifications') }}</a>
        </li>
      </ul>
      </li> --}}

      <li
        class="treeview 
          {{ Request::is('admin/listingOrder') ? 'active' : '' }} 
          {{ Request::is('admin/view_addOrder') ? 'active' : '' }} 
          {{ Request::is('admin/view_editOrder/*') ? 'active' : '' }}">
        <a href="{{ URL::to('admin/listingOrder')}}">
          <i class="fa fa-list-ul" aria-hidden="true"></i> <span>
            {{ trans('labels.link_orders') }}</span>
        </a>
      </li>

      <li
        class="treeview 
          {{ Request::is('admin/listingUser') ? 'active' : '' }} 
          {{ Request::is('admin/viewUser') ? 'active' : '' }} 
          {{ Request::is('admin/viewUser/*') ? 'active' : '' }}">
        <a href="{{ URL::to('admin/listingUser')}}">
          <i class="fa fa-list-ul" aria-hidden="true"></i> <span>
            {{ trans('labels.link_user') }}</span>
        </a>
      </li>

      <li
        class="treeview 
          {{ Request::is('admin/listingCompany') ? 'active' : '' }} 
          {{ Request::is('admin/viewCompany') ? 'active' : '' }} 
          {{ Request::is('admin/viewCompany/*') ? 'active' : '' }}">
        <a href="{{ URL::to('admin/listingCompany')}}">
          <i class="fa fa-list-ul" aria-hidden="true"></i> <span>
            {{ trans('labels.link_company') }}</span>
        </a>
      </li>

      {{-- <li class="treeview {{ Request::is('admin/shippingmethods') ? 'active' : '' }}
      {{ Request::is('admin/upsShipping') ? 'active' : '' }} {{ Request::is('admin/flateRate') ? 'active' : '' }}">
      <a href="{{ URL::to('admin/shippingmethods')}}"><i class="fa fa-truck" aria-hidden="true"></i> <span>
          {{ trans('labels.link_shipping_methods') }}</span>
      </a>
      </li> --}}

      {{-- <li class="treeview {{ Request::is('admin/paymentsetting') ? 'active' : '' }}">
      <a href="{{ URL::to('admin/paymentsetting')}}"><i class="fa fa-credit-card" aria-hidden="true"></i> <span>
          {{ trans('labels.link_payment_methods') }}</span>
      </a>
      </li> --}}

      {{-- <li class="treeview {{ Request::is('admin/statscustomers') ? 'active' : '' }}
      {{ Request::is('admin/productsstock') ? 'active' : '' }}
      {{ Request::is('admin/statsproductspurchased') ? 'active' : '' }}
      {{ Request::is('admin/statsproductsliked') ? 'active' : '' }} ">
      <a href="#">
        <i class="fa fa-file-text-o" aria-hidden="true"></i>
        <span>{{ trans('labels.link_reports') }}</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li class="{{ Request::is('admin/productsstock') ? 'active' : '' }} "><a
            href="{{ URL::to('admin/productsstock')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_products_stock') }}</a></li>
        <li class="{{ Request::is('admin/statscustomers') ? 'active' : '' }} "><a
            href="{{ URL::to('admin/statscustomers')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_customer_orders_total') }}</a></li>
        <li class="{{ Request::is('admin/statsproductspurchased') ? 'active' : '' }}"><a
            href="{{ URL::to('admin/statsproductspurchased')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_total_purchased') }}</a></li>
        <li class="{{ Request::is('admin/statsproductsliked') ? 'active' : '' }}"><a
            href="{{ URL::to('admin/statsproductsliked')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_products_liked') }}</a></li>
      </ul>
      </li> --}}

      {{-- @if($web_setting[67]->value=='1')
          <li class="treeview {{ Request::is('admin/sliders') ? 'active' : '' }}
      {{ Request::is('admin/addsliderimage') ? 'active' : '' }} {{ Request::is('admin/editslide/*') ? 'active' : '' }}
      {{ Request::is('admin/webpages') ? 'active' : '' }} {{ Request::is('admin/addwebpage') ? 'active' : '' }}
      {{ Request::is('admin/editwebpage/*') ? 'active' : '' }} {{ Request::is('admin/websettings') ? 'active' : '' }}
      {{ Request::is('admin/webthemes') ? 'active' : '' }} {{ Request::is('admin/customstyle') ? 'active' : '' }} ">
      <a href="#">
        <i class="fa fa-gears" aria-hidden="true"></i>
        <span> {{ trans('labels.link_site_settings') }}</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li
          class="{{ Request::is('admin/sliders') ? 'active' : '' }} {{ Request::is('admin/addsliderimage') ? 'active' : '' }} {{ Request::is('admin/editslide/*') ? 'active' : '' }} ">
          <a href="{{ URL::to('admin/sliders')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_Sliders') }}</a>
        </li>

        <li
          class="{{ Request::is('admin/webpages') ? 'active' : '' }}  {{ Request::is('admin/addwebpage') ? 'active' : '' }}  {{ Request::is('admin/editwebpage/*') ? 'active' : '' }}">
          <a href="{{ URL::to('admin/webpages')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.content_pages') }}</a></li>

        <li class="{{ Request::is('admin/webthemes') ? 'active' : '' }} "><a href="{{ URL::to('admin/webthemes')}}"><i
              class="fa fa-circle-o"></i> {{ trans('labels.website_themes') }}</a></li>

        <li class="{{ Request::is('admin/seo') ? 'active' : '' }} "><a href="{{ URL::to('admin/seo')}}"><i
              class="fa fa-circle-o"></i> {{ trans('labels.seo content') }}</a></li>

        <li class="{{ Request::is('admin/customstyle') ? 'active' : '' }} "><a
            href="{{ URL::to('admin/customstyle')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.custom_style_js') }}</a></li>

        <li class="{{ Request::is('admin/websettings') ? 'active' : '' }}"><a
            href="{{ URL::to('admin/websettings')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_setting') }}</a></li>
      </ul>
      </li>
      @endif --}}

      {{-- @if($web_setting[66]->value=='1')
          <li class="treeview {{ Request::is('admin/banners') ? 'active' : '' }}
      {{ Request::is('admin/addbanner') ? 'active' : '' }} {{ Request::is('admin/editbanner/*') ? 'active' : '' }}
      {{ Request::is('admin/pages') ? 'active' : '' }} {{ Request::is('admin/addpage') ? 'active' : '' }}
      {{ Request::is('admin/editpage/*') ? 'active' : '' }} {{ Request::is('admin/appSettings') ? 'active' : '' }}
      {{ Request::is('admin/admobSettings') ? 'active' : '' }} {{ Request::is('admin/applabel') ? 'active' : '' }}
      {{ Request::is('admin/addappkey') ? 'active' : '' }} {{ Request::is('admin/applicationapi') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-gears" aria-hidden="true"></i>
        <span> {{ trans('labels.link_app_settings') }}</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li
          class="{{ Request::is('admin/banners') ? 'active' : '' }} {{ Request::is('admin/addbanner') ? 'active' : '' }} {{ Request::is('admin/editbanner/*') ? 'active' : '' }}">
          <a href="{{ URL::to('admin/banners')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_Banners') }}</a>
        </li>

        <li
          class="{{ Request::is('admin/pages') ? 'active' : '' }}  {{ Request::is('admin/addpage') ? 'active' : '' }}  {{ Request::is('admin/editpage/*') ? 'active' : '' }}">
          <a href="{{ URL::to('admin/pages')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.content_pages') }}</a>
        </li>

        <li class="{{ Request::is('admin/admobSettings') ? 'active' : '' }}"><a
            href="{{ URL::to('admin/admobSettings')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_admob') }}</a></li>

        <li
          class="android-hide {{ Request::is('admin/applabel') ? 'active' : '' }} {{ Request::is('admin/addappkey') ? 'active' : '' }}">
          <a href="{{ URL::to('admin/applabel')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.labels') }}</a></li>

        <li class="{{ Request::is('admin/applicationapi') ? 'active' : '' }}"><a
            href="{{ URL::to('admin/applicationapi')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.applicationApi') }}</a></li>

        <li class="{{ Request::is('admin/appsettings') ? 'active' : '' }}"><a
            href="{{ URL::to('admin/appsettings')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_setting') }}</a></li>

      </ul>
      </li>
      @endif --}}

      {{-- <li class="treeview {{ Request::is('admin/facebooksettings') ? 'active' : '' }}
      {{ Request::is('admin/setting') ? 'active' : '' }} {{ Request::is('admin/googlesettings') ? 'active' : '' }}
      {{ Request::is('admin/pushnotification') ? 'active' : '' }} {{ Request::is('admin/orderstatus') ? 'active' : '' }}
      {{ Request::is('admin/addorderstatus') ? 'active' : '' }}
      {{ Request::is('admin/editorderstatus/*') ? 'active' : '' }}
      {{ Request::is('admin/alertsetting') ? 'active' : '' }} {{ Request::is('admin/units') ? 'active' : '' }}
      {{ Request::is('admin/addunit') ? 'active' : '' }} {{ Request::is('admin/editunit/*') ? 'active' : '' }} ">
      <a href="#">
        <i class="fa fa-gears" aria-hidden="true"></i>
        <span> {{ trans('labels.link_general_settings') }}</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li
          class="{{ Request::is('admin/units') ? 'active' : '' }} {{ Request::is('admin/addunit') ? 'active' : '' }} {{ Request::is('admin/editunit/*') ? 'active' : '' }} ">
          <a href="{{ URL::to('admin/units')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_units') }}</a></li>
        <li
          class="{{ Request::is('admin/orderstatus') ? 'active' : '' }} {{ Request::is('admin/addorderstatus') ? 'active' : '' }} {{ Request::is('admin/editorderstatus/*') ? 'active' : '' }} ">
          <a href="{{ URL::to('admin/orderstatus')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_order_status') }}</a></li>
        <li class="{{ Request::is('admin/facebooksettings') ? 'active' : '' }}"><a
            href="{{ URL::to('admin/facebooksettings')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_facebook') }}</a></li>

        <li class="{{ Request::is('admin/googlesettings') ? 'active' : '' }}"><a
            href="{{ URL::to('admin/googlesettings')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_google') }}</a></li>
        <li class="{{ Request::is('admin/pushnotification') ? 'active' : '' }}"><a
            href="{{ URL::to('admin/pushnotification')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.link_push_notification') }}</a></li>
        <li class="{{ Request::is('admin/alertsetting') ? 'active' : '' }}"><a
            href="{{ URL::to('admin/alertsetting')}}"><i class="fa fa-circle-o"></i>
            {{ trans('labels.alertSetting') }}</a></li>
        <li class="{{ Request::is('admin/setting') ? 'active' : '' }}"><a href="{{ URL::to('admin/setting')}}"><i
              class="fa fa-circle-o"></i> {{ trans('labels.link_setting') }}</a></li>

      </ul>
      </li> --}}
    </ul>
  </section>
</aside>